require('dotenv').config();
const express = require('express');
const helmet = require('helmet');
const rateLimit = require('express-rate-limit');
const cors = require('cors');
const axios = require('axios');
const https = require('https');
const { glob } = require('glob');

const app = express();
const PORT = process.env.PORT || 3000;

const { deploy } = require('auth0-deploy-cli');
const yaml = require('js-yaml');
const fs = require('fs');


// ============================================================================
// Custom Error Classes
// ============================================================================

class ValidationError extends Error {
  constructor(message) {
    super(message);
    this.name = 'ValidationError';
    this.statusCode = 400;
    this.code = 'VALIDATION_ERROR';
  }
}

class SecurityError extends Error {
  constructor(message) {
    super(message);
    this.name = 'SecurityError';
    this.statusCode = 403;
    this.code = 'SECURITY_ERROR';
  }
}

class RequestError extends Error {
  constructor(message, statusCode = 502) {
    super(message);
    this.name = 'RequestError';
    this.statusCode = statusCode;
    this.code = 'REQUEST_ERROR';
  }
}

// ============================================================================
// Configuration
// ============================================================================

const ALLOWED_DOMAINS = (process.env.ALLOWED_DOMAINS || 'auth0app.com,auth.kausti.com,localhost').split(',').map(d => d.trim());
const REQUEST_TIMEOUT = parseInt(process.env.REQUEST_TIMEOUT_MS || '10000', 10);
const MAX_REDIRECTS = parseInt(process.env.MAX_REDIRECTS || '0', 10);
const RATE_LIMIT_WINDOW = parseInt(process.env.RATE_LIMIT_WINDOW_MS || '900000', 10);
const RATE_LIMIT_MAX = parseInt(process.env.RATE_LIMIT_MAX_REQUESTS || '100', 10);

// ============================================================================
// Middleware Setup
// ============================================================================

// CORS - Allow requests from different origins (for AJAX from Apache/other ports)
app.use(cors({
  origin: process.env.NODE_ENV === 'production'
    ? (origin, callback) => {
        // In production, allow specific domains
        const allowedOrigins = [
          'https://auth0app.com',
          'https://auth.kausti.com'
        ];

        // Allow Vercel preview and production deployments
        if (origin && origin.match(/^https:\/\/.*\.vercel\.app$/)) {
          callback(null, true);
        } else if (!origin || allowedOrigins.includes(origin)) {
          callback(null, true);
        } else {
          callback(new Error('Not allowed by CORS'));
        }
      }
    : true, // Allow all origins in development
  credentials: true
}));

// Security headers with CSP configured to allow external images
app.use(helmet({
  contentSecurityPolicy: {
    directives: {
      defaultSrc: ["'self'"],
      scriptSrc: ["'self'", "'unsafe-inline'", "'unsafe-eval'", "https://cdn.jsdelivr.net"],
      styleSrc: ["'self'", "'unsafe-inline'"],
      imgSrc: [
        "'self'",
        "data:",
        "blob:",
        "https:",
        "http:",
        "*.kausti.com",
        "*.storyblok.com",
        "*.researchworld.com",
        "*.jyskblueline.com",
        "*.mynewsdesk.com"
      ],
      fontSrc: ["'self'", "data:"],
      connectSrc: ["'self'", "http://localhost:*", "https:"],
      frameSrc: ["'none'"],
      objectSrc: ["'none'"],
      upgradeInsecureRequests: []
    }
  }
}));

// Parse JSON bodies with size limit
app.use(express.json({ limit: '1mb' }));

// Parse URL-encoded bodies (for legacy compatibility)
app.use(express.urlencoded({ extended: true, limit: '1mb' }));

// Rate limiting - DISABLED for development/testing
// const limiter = rateLimit({
//   windowMs: RATE_LIMIT_WINDOW,
//   max: RATE_LIMIT_MAX,
//   message: { error: 'Too many requests, please try again later.', code: 'RATE_LIMIT_EXCEEDED' },
//   standardHeaders: true,
//   legacyHeaders: false,
// });
// app.use(limiter);

// Request logging middleware
app.use((req, res, next) => {
  const timestamp = new Date().toISOString();
  console.log(`[${timestamp}] ${req.method} ${req.path}`);
  next();
});

// Block direct access to .env files via HTTP (SECURITY)
app.use((req, res, next) => {
  if (req.path.includes('/.env')) {
    console.warn(`[SECURITY] Blocked access to .env file: ${req.path}`);
    return res.status(403).json({
      error: 'Access denied',
      code: 'FORBIDDEN'
    });
  }
  next();
});

// Serve static files (HTML, CSS, JS, images, etc.)
app.use(express.static(__dirname, {
  index: 'index.html',
  extensions: ['html', 'htm'],
  dotfiles: 'allow' // Allow serving dotfiles like .env in resources/
}));

// ============================================================================
// Core Functions
// ============================================================================

/**
 * Parse cURL command string to extract URL, headers, and data
 * Matches the PHP curlToPhp() function behavior
 * @param {string} curlString - The cURL command string
 * @returns {Object} - Parsed object with location, headers, and data
 */
function parseCurlCommand(curlString) {
  const lines = curlString.split('\n');
  const parsed = {
    location: '',
    headers: [],
    data: []
  };

  let capturingData = false;
  let dataBuffer = [];
  let dataStartPattern = '';

  for (let i = 0; i < lines.length; i++) {
    const line = lines[i];
    // Remove carriage returns, newlines, double spaces, and space-backslash
    const cleanLine = line.replace(/\r/g, '').replace(/\n/g, '').replace(/  /g, '').replace(/ \\/g, '');

    // Extract --location
    if (cleanLine.includes('--location') && !capturingData) {
      const locationMatch = cleanLine.match(/--location\s+'([^']+)'/);
      if (locationMatch) {
        parsed.location = locationMatch[1];
      }
    }

    if (cleanLine.includes('--url') && !capturingData) {
      const locationMatch = cleanLine.match(/--url\s+'([^']+)'/);
      if (locationMatch) {
        parsed.location = locationMatch[1];
      }
    }

    // Extract --header
    if (cleanLine.includes('--header') && !capturingData) {
      const headerMatch = cleanLine.match(/--header\s+'([^']+)'/);
      if (headerMatch) {
        parsed.headers.push(headerMatch[1]);
      }
    }

    // Extract --data, --data-raw, --data-urlencode (handle multi-line)
    if (!capturingData && (cleanLine.includes('--data-urlencode') || cleanLine.includes('--data-raw') || cleanLine.includes('--data'))) {
      // Try to match complete data on one line first
      let dataMatch = cleanLine.match(/--data-urlencode\s+'([^']+)'/);
      if (!dataMatch) {
        dataMatch = cleanLine.match(/--data-raw\s+'([^']+)'/);
      }
      if (!dataMatch) {
        dataMatch = cleanLine.match(/--data\s+'([^']+)'/);
      }

      if (dataMatch) {
        // Single-line data - complete match found
        const dataValue = dataMatch[1].replace(/<dashdash>/g, '--');
        parsed.data.push(dataValue);
      } else {
        // Multi-line data - start capturing
        // Check which data flag was used
        if (cleanLine.includes('--data-urlencode')) {
          dataStartPattern = '--data-urlencode';
        } else if (cleanLine.includes('--data-raw')) {
          dataStartPattern = '--data-raw';
        } else {
          dataStartPattern = '--data';
        }

        // Extract the starting content after the opening quote
        const startMatch = cleanLine.match(/--data(?:-urlencode|-raw)?\s+'(.*)$/);
        if (startMatch) {
          capturingData = true;
          dataBuffer = [startMatch[1]];
        }
      }
    } else if (capturingData) {
      // Continue capturing until we find the closing quote
      if (cleanLine.endsWith("'")) {
        // Found the end - remove the trailing quote and backslash if present
        const endContent = cleanLine.replace(/'$/, '').replace(/\\$/, '');
        dataBuffer.push(endContent);

        // Join all captured lines and add to data array
        const dataValue = dataBuffer.join('\n').replace(/<dashdash>/g, '--');
        parsed.data.push(dataValue);

        // Reset capture state
        capturingData = false;
        dataBuffer = [];
        dataStartPattern = '';
      } else {
        // Still capturing - add this line to buffer
        dataBuffer.push(cleanLine.replace(/\\$/, ''));
      }
    }
  }

  // Detect JSON content-type from parsed headers
  let isJsonRequest = false;
  const contentTypeHeader = parsed.headers.find(h =>
    h.toLowerCase().startsWith('content-type:')
  );
  if (contentTypeHeader && contentTypeHeader.toLowerCase().includes('application/json')) {
    isJsonRequest = true;
  }

  // Smart data parsing based on content-type
  if (isJsonRequest && parsed.data.length > 0) {
    try {
      if (parsed.data.length === 1) {
        // Single JSON object - parse it
        parsed.data = JSON.parse(parsed.data[0]);
      } else {
        // Multiple --data flags - merge JSON objects
        const mergedData = {};
        for (const dataItem of parsed.data) {
          const parsedItem = JSON.parse(dataItem);
          Object.assign(mergedData, parsedItem);
        }
        parsed.data = mergedData;
      }
      parsed.isJsonRequest = true; // Flag for later use
    } catch (error) {
      // Malformed JSON - fallback to form-encoded
      console.warn('Failed to parse JSON data, falling back to form-encoded:', error.message);
      parsed.data = parsed.data.join('&');
      parsed.isJsonRequest = false;
    }
  } else {
    // Form-encoded data (default) - join with &
    parsed.data = parsed.data.join('&');
    parsed.isJsonRequest = false;
  }

  return parsed;
}

/**
 * Validate if a URL's domain is in the allowed list
 * @param {string} urlString - The URL to validate
 * @returns {boolean} - True if allowed
 * @throws {SecurityError} - If domain is not allowed
 */
function validateDomain(urlString) {
  let url;

  try {
    url = new URL(urlString);
  } catch (error) {
    throw new SecurityError('Invalid URL format');
  }

  // Check protocol
  if (!['http:', 'https:'].includes(url.protocol)) {
    throw new SecurityError('Only HTTP/HTTPS protocols allowed');
  }

  const hostname = url.hostname.toLowerCase();

  // Check against allowlist with subdomain matching
  const isAllowed = ALLOWED_DOMAINS.some(domain => {
    const lowerDomain = domain.toLowerCase();

    // Exact match
    if (hostname === lowerDomain) {
      return true;
    }

    // Subdomain match (e.g., dev.auth0app.com matches auth0app.com)
    if (hostname.endsWith('.' + lowerDomain)) {
      return true;
    }

    return false;
  });

  if (!isAllowed) {
    throw new SecurityError(`Domain not allowed: ${hostname}`);
  }

  // Additional SSRF protection: block private IP ranges
  // This is a basic check - for production, use a more comprehensive library
  const privateIpPatterns = [
    /^127\./,           // 127.0.0.0/8
    /^10\./,            // 10.0.0.0/8
    /^172\.(1[6-9]|2[0-9]|3[0-1])\./, // 172.16.0.0/12
    /^192\.168\./,      // 192.168.0.0/16
    /^169\.254\./,      // 169.254.0.0/16 (link-local)
  ];

  // Only check if hostname looks like an IP
  if (/^\d+\.\d+\.\d+\.\d+$/.test(hostname)) {
    for (const pattern of privateIpPatterns) {
      if (pattern.test(hostname) && hostname !== '127.0.0.1' && !ALLOWED_DOMAINS.includes('localhost')) {
        throw new SecurityError(`Private IP addresses are not allowed: ${hostname}`);
      }
    }
  }

  return true;
}

/**
 * Execute a secure HTTP request with domain validation and SSRF protection
 * @param {Object} parsedCurl - Parsed curl object with location, headers, data
 * @param {string} requestType - HTTP method (GET, POST, PUT, PATCH, DELETE)
 * @returns {Promise<Object>} - Response with status, headers, and data
 */
async function executeSecureRequest(parsedCurl, requestType = 'GET') {
  // Validate URL and domain
  let url = parsedCurl.location;

  // Replace HTML entities (matching PHP behavior)
  url = url.replace(/&amp;/g, '&');

  validateDomain(url);

  // Configure axios with security options
  const config = {
    method: requestType.toLowerCase(),
    url: url,
    maxRedirects: MAX_REDIRECTS,
    timeout: REQUEST_TIMEOUT,
    responseType: 'text', // Get raw text response (matches PHP curl_exec behavior)
    validateStatus: () => true, // Don't throw on non-2xx status codes
    httpsAgent: new https.Agent({
      rejectUnauthorized: false // Only for dev/testing - matches PHP CURLOPT_SSL_VERIFYPEER
    })
  };

  // Parse headers into axios format
  if (parsedCurl.headers && parsedCurl.headers.length > 0) {
    config.headers = {};
    parsedCurl.headers.forEach(header => {
      const colonIndex = header.indexOf(':');
      if (colonIndex > 0) {
        const key = header.substring(0, colonIndex).trim();
        const value = header.substring(colonIndex + 1).trim();

        // Sanitize headers: skip dangerous ones
        if (key.toLowerCase() !== 'host') {
          config.headers[key] = value;
        }
      }
    });
  }

  // Handle request body based on method
  const method = requestType.toUpperCase();

  if (method === 'POST' || method === 'PATCH') {
    // Handle JSON requests - explicitly stringify
    if (parsedCurl.isJsonRequest && typeof parsedCurl.data === 'object') {
      config.data = JSON.stringify(parsedCurl.data);
      if (!config.headers) config.headers = {};
      if (!config.headers['Content-Type'] && !config.headers['content-type']) {
        config.headers['Content-Type'] = 'application/json';
      }
    } else {
      // Form-encoded or already a string
      config.data = parsedCurl.data;
    }
  } else if (method === 'PUT') {
    if (parsedCurl.isJsonRequest && typeof parsedCurl.data === 'object') {
      // JSON request - explicitly stringify
      config.data = JSON.stringify(parsedCurl.data);
      if (!config.headers) config.headers = {};
      if (!config.headers['Content-Type'] && !config.headers['content-type']) {
        config.headers['Content-Type'] = 'application/json';
      }
    } else if (typeof parsedCurl.data === 'string') {
      // Form data - preserve original behavior (use first element)
      const dataArray = parsedCurl.data.split('&');
      config.data = dataArray[0] || parsedCurl.data;
    } else {
      // Unknown case - stringify if object
      config.data = typeof parsedCurl.data === 'object' ? JSON.stringify(parsedCurl.data) : parsedCurl.data;
    }
  }
  // GET and DELETE don't send body data

  // Debug logging
  console.log('=== Request Debug ===');
  console.log('Method:', method);
  console.log('URL:', url);
  console.log('Headers:', JSON.stringify(config.headers, null, 2));
  console.log('Data Type:', typeof config.data);
  console.log('Data:', config.data);
  console.log('Is JSON Request:', parsedCurl.isJsonRequest);
  console.log('===================');

  try {
    const response = await axios(config);

    // Return the raw response data (matching PHP behavior)
    return response.data;
  } catch (error) {
    if (error.code === 'ECONNABORTED') {
      throw new RequestError('Request timeout', 504);
    } else if (error.code === 'ECONNREFUSED') {
      throw new RequestError('Connection refused', 502);
    } else {
      throw new RequestError(error.message || 'Request failed', 502);
    }
  }
}

/**
 * Scan for CSS files in the highlight.js-styles directory
 * @returns {Promise<Array<string>>} - Array of CSS file paths
 */
async function scanForCss() {
  try {
    const pattern = 'resources/css/highlight.js-styles/*.css';
    const files = await glob(pattern, { cwd: __dirname });
    return files;
  } catch (error) {
    console.error('Error scanning CSS files:', error);
    return [];
  }
}

// ============================================================================
// Routes
// ============================================================================

/**
 * API information endpoint
 */
app.get('/api', (_req, res) => {
  res.json({
    name: 'Auth0 Proxy Server',
    version: '1.0.0',
    status: 'running',
    endpoints: {
      health: {
        method: 'GET',
        path: '/health',
        description: 'Health check endpoint'
      },
      proxy: {
        method: 'POST',
        path: '/api/proxy',
        description: 'Main proxy endpoint for executing cURL commands',
        body: {
          curlData: 'string (required) - cURL command string',
          requestType: 'string (optional) - HTTP method: GET, POST, PUT, PATCH, DELETE'
        },
        example: {
          curlData: "curl --location 'https://dev.auth0app.com/api/v2/users' --header 'Authorization: Bearer token'",
          requestType: 'GET'
        }
      },
      cssScanner: {
        method: 'GET',
        path: '/api/css-files?scan=true',
        description: 'Scans for CSS files in resources/css/highlight.js-styles/'
      },
      legacy: {
        testPhp: 'POST /test.php (forwards to /api/proxy)',
        cssScanner: 'GET /test.php?scanForCss (returns CSS files)'
      }
    },
    security: {
      allowedDomains: ALLOWED_DOMAINS,
      rateLimit: 'disabled',
      requestTimeout: `${REQUEST_TIMEOUT}ms`
    },
    documentation: 'See README.md for complete documentation'
  });
});

/**
 * Health check endpoint
 */
app.get('/health', (_req, res) => {
  res.json({
    status: 'ok',
    uptime: process.uptime(),
    timestamp: new Date().toISOString()
  });
});

/**
 * Environments endpoint - serves .env file content securely
 */
app.get('/api/environments', async (_req, res, next) => {
  try {
    const fs = require('fs').promises;
    const path = require('path');

    // Read the .env file from resources directory
    const envPath = path.join(__dirname, 'resources', '.env');
    const envContent = await fs.readFile(envPath, 'utf8');

    // Return as plain text (same format the frontend expects)
    res.type('text/plain').send(envContent);
  } catch (error) {
    console.error('Error reading environments file:', error);
    next(error);
  }
});

/**
 * Main proxy endpoint (matches original PHP POST endpoint)
 */
app.post('/api/proxy', async (req, res, next) => {
  try {
    const { curlData, requestType } = req.body;

    // Validate inputs
    if (!curlData || typeof curlData !== 'string' || curlData.trim() === '') {
      throw new ValidationError('curlData is required and must be a non-empty string');
    }

    if (requestType && !['GET', 'POST', 'PUT', 'PATCH', 'DELETE'].includes(requestType.toUpperCase())) {
      throw new ValidationError('requestType must be one of: GET, POST, PUT, PATCH, DELETE');
    }

    // Pre-process: Replace -- in mfa_token (matching PHP behavior)
    const processedCurlData = curlData.replace(/mfa_token=(.*)--(.*)'/gm, "mfa_token=$1<dashdash>$2'");

    // Parse curl command
    const parsedCurl = parseCurlCommand(processedCurlData);

    // Validate that we have a location
    if (!parsedCurl.location) {
      throw new ValidationError('No URL found in curl command');
    }

    // Execute request
    const method = requestType ? requestType.toUpperCase() : 'GET';
    const response = await executeSecureRequest(parsedCurl, method);

    // Return response as raw string (matching PHP echo behavior)
    // axios with responseType: 'text' returns everything as string
    res.send(response);

  } catch (error) {
    next(error);
  }
});

/**
 * CSS file scanner endpoint (matches original PHP GET endpoint)
 */
app.get('/api/css-files', async (req, res, next) => {
  try {
    const { scan } = req.query;

    if (scan === 'true') {
      const cssFiles = await scanForCss();

      // Return as JSON object (matching PHP JSON_FORCE_OBJECT)
      // Note: PHP's JSON_FORCE_OBJECT makes arrays into objects, but for an array of strings,
      // it's more natural in JSON to keep it as an array
      res.json(cssFiles);
    } else {
      res.status(400).json({ error: 'Missing scan=true query parameter' });
    }
  } catch (error) {
    next(error);
  }
});

/**
 * Legacy endpoint compatibility - forward to /api/proxy
 * This allows existing clients using test.php to work without changes
 */
app.post('/test.php', async (req, res, next) => {
  // Forward to the new API endpoint
  req.url = '/api/proxy';
  app._router.handle(req, res, next);
});

/**
 * Legacy endpoint compatibility - CSS scanner
 */
app.get('/test.php', async (req, res, next) => {
  if (req.query.scanForCss !== undefined) {
    // Directly call the CSS scanner function instead of forwarding
    try {
      const cssFiles = await scanForCss();
      res.json(cssFiles);
    } catch (error) {
      next(error);
    }
  } else {
    res.status(404).json({ error: 'Not found' });
  }
});

// This handles the "GET" variables
app.get('/auth0cli', async (req, res) => { // Added 'async' 
  const clientId = req.query['clientId']; 
  const clientSecret = req.query['clientSecret']; 
  const tenantUrl = req.query['tenantUrl']; 

  const yamlPath = req.query['yamlPath'];
  
  const config = {
  AUTH0_DOMAIN: tenantUrl,
  AUTH0_CLIENT_ID: clientId,
  AUTH0_CLIENT_SECRET: clientSecret, // Use the secret from your dashboard
  AUTH0_ALLOW_DELETE: false, // Set to true only if you want to wipe items NOT in your yaml
  AUTH0_KEYWORD_REPLACE_MAPPINGS: {
      PROGRESSIVE_PROFILING_FORM_ID: "PROGRESSIVE_PROFILING_FORM_1",
      PROGRESSIVE_PROFILING_FAVORITE_STORE_ELEMENT_ID: "PROGRESSIVE_PROFILING_FAVORITE_STORE_1",
      PROGRESSIVE_PROFILING_NEWSLETTER_PREFERENCES_ELEMENT_ID: "PROGRESSIVE_PROFILING_NEWSLETTER_PREFERENCES_1"  
    }
  };


  if (!yamlPath) {
    return res.status(400).send("Missing yamlPath parameter.");
  }

  try {
    const fullPath = `./resources/auth0-cli/cli-commands/${yamlPath}`;
    
    // Check if file even exists first
    if (!fs.existsSync(fullPath)) {
      return res.status(404).send(`File not found: ${yamlPath}`);
    }

    const yamlToImport = fs.readFileSync(fullPath, 'utf8');
    
    if (isYaml(yamlToImport)) {
      console.log("🚀 Valid YAML detected. Starting import...");
      
      // Wait for the import to finish
      await importConfig(yamlPath); 
      
      res.send(`✅ Successfully imported: ${yamlPath}`);
    } else {
      res.status(400).send(`❌ Boop! The file ${yamlPath} is not valid YAML.`);
    }
  } catch (error) {
    console.error(error);
    res.status(500).send(`🔥 Server Error: ${error.message}`);
  }
});

function isYaml(str) {
  try {
    // Attempt to load the string
    const doc = yaml.load(str);
    
    // Check if it's an object or array (YAML usually isn't just a plain string or number)
    return (typeof doc === 'object' && doc !== null);
  } catch (e) {
    // If it throws an error, it's definitely not valid YAML
    return false;
  }
}

async function importConfig(yamlPath) {

  try {
    
    console.log('./cli-commands/'+yamlPath)
    await deploy({
      input_file: './cli-commands/'+yamlPath, // 
      config: config,
    });

    console.log('✅ Import successful! Your tenant has been updated.');
  } catch (err) {
    console.error('❌ Import failed:', err);
  }
}

// ============================================================================
// Error Handling Middleware
// ============================================================================

/**
 * Global error handler
 */
app.use((err, req, res, next) => {
  const timestamp = new Date().toISOString();

  // Log error
  console.error(`[${timestamp}] Error:`, {
    name: err.name,
    message: err.message,
    code: err.code,
    path: req.path,
    method: req.method
  });

  // Determine status code
  const statusCode = err.statusCode || 500;
  const errorCode = err.code || 'INTERNAL_ERROR';

  // Send error response
  res.status(statusCode).json({
    error: err.message || 'Internal server error',
    code: errorCode,
    timestamp: timestamp
  });
});

/**
 * 404 handler
 */
app.use((req, res) => {
  res.status(404).json({
    error: 'Not found',
    code: 'NOT_FOUND',
    path: req.path
  });
});

// ============================================================================
// Server Startup (Only for local development, not Vercel)
// ============================================================================

// Check if running in Vercel serverless environment
const isVercel = process.env.VERCEL === '1';

if (!isVercel) {
  // Local development - start the server
  const server = app.listen(PORT, () => {
    console.log('='.repeat(60));
    console.log(`Auth0 API Playground & Proxy Server`);
    console.log('='.repeat(60));
    console.log(`Status: Running`);
    console.log(`Port: ${PORT}`);
    console.log(`Environment: ${process.env.NODE_ENV || 'development'}`);
    console.log(`Allowed Domains: ${ALLOWED_DOMAINS.join(', ')}`);
    console.log(`Request Timeout: ${REQUEST_TIMEOUT}ms`);
    console.log(`Rate Limit: disabled`);
    console.log('='.repeat(60));
    console.log(`Web Interface: http://localhost:${PORT}/`);
    console.log('='.repeat(60));
    console.log(`Endpoints:`);
    console.log(`  - GET  / (Auth0 API Playground UI)`);
    console.log(`  - GET  /api (API information)`);
    console.log(`  - POST /api/proxy (main proxy endpoint)`);
    console.log(`  - GET  /api/css-files?scan=true (CSS scanner)`);
    console.log(`  - GET  /health (health check)`);
    console.log(`  - POST /test.php (legacy compatibility)`);
    console.log('='.repeat(60));
  });

  // ============================================================================
  // Graceful Shutdown (Local only)
  // ============================================================================

  process.on('SIGTERM', () => {
    console.log('SIGTERM signal received: closing HTTP server');
    server.close(() => {
      console.log('HTTP server closed');
      process.exit(0);
    });
  });

  process.on('SIGINT', () => {
    console.log('\nSIGINT signal received: closing HTTP server');
    server.close(() => {
      console.log('HTTP server closed');
      process.exit(0);
    });
  });
}

// ============================================================================
// Exports
// ============================================================================

// Export app as default for Vercel serverless
module.exports = app;

// Also export named exports for testing
module.exports.parseCurlCommand = parseCurlCommand;
module.exports.validateDomain = validateDomain;
module.exports.executeSecureRequest = executeSecureRequest;
module.exports.scanForCss = scanForCss;

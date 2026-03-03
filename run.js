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
  origin: true, // Allow all origins in development
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

  for (const line of lines) {
    // Remove carriage returns, newlines, double spaces, and space-backslash
    const cleanLine = line.replace(/\r/g, '').replace(/\n/g, '').replace(/  /g, '').replace(/ \\/g, '');

    // Extract --location
    if (cleanLine.includes('--location')) {
      const locationMatch = cleanLine.match(/--location\s+'([^']+)'/);
      if (locationMatch) {
        parsed.location = locationMatch[1];
      }
    }

    // Extract --header
    if (cleanLine.includes('--header')) {
      const headerMatch = cleanLine.match(/--header\s+'([^']+)'/);
      if (headerMatch) {
        parsed.headers.push(headerMatch[1]);
      }
    }

    // Extract --data, --data-raw, --data-urlencode
    if (cleanLine.includes('--data-urlencode') || cleanLine.includes('--data-raw') || cleanLine.includes('--data')) {
      let dataMatch = cleanLine.match(/--data-urlencode\s+'([^']+)'/);
      if (!dataMatch) {
        dataMatch = cleanLine.match(/--data-raw\s+'([^']+)'/);
      }
      if (!dataMatch) {
        dataMatch = cleanLine.match(/--data\s+'([^']+)'/);
      }
      if (dataMatch) {
        // Restore -- that was replaced with <dashdash>
        const dataValue = dataMatch[1].replace(/<dashdash>/g, '--');
        parsed.data.push(dataValue);
      }
    }
  }

  // Join data array with & (like PHP implode)
  parsed.data = parsed.data.join('&');

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
    config.data = parsedCurl.data;
  } else if (method === 'PUT') {
    // Preserve PHP behavior: PUT uses data[0] (first data element)
    // In our case, data is already a string, so we use it directly
    // But to match PHP's weird behavior, we'd need to split and use first element
    // Since data is joined with &, let's split and use first element
    const dataArray = parsedCurl.data.split('&');
    config.data = dataArray[0] || parsedCurl.data;
  }
  // GET and DELETE don't send body data

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
// Server Startup
// ============================================================================

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
// Graceful Shutdown
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

// Export for testing
module.exports = { app, parseCurlCommand, validateDomain, executeSecureRequest, scanForCss };

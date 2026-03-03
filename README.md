# Auth0 Proxy Server

A secure Node.js Express server that acts as a proxy for Auth0 API requests with SSRF protection, rate limiting, and enhanced security features.

## Overview

This server replaces the original `test.php` script with a modern Node.js implementation that includes:

- **SSRF Protection**: Multi-layer domain validation to prevent Server-Side Request Forgery attacks
- **Rate Limiting**: Prevents abuse with configurable request limits
- **Security Headers**: Helmet.js integration for common vulnerability protection
- **Multiple HTTP Methods**: Support for GET, POST, PUT, PATCH, DELETE
- **Request Timeouts**: Prevents hanging requests
- **Comprehensive Logging**: Request and error logging for debugging
- **Health Monitoring**: Health check endpoint for uptime monitoring

## Installation

1. **Install dependencies**:
   ```bash
   npm install
   ```

2. **Configure environment** (optional):
   ```bash
   cp .env.example .env
   # Edit .env with your settings
   ```

3. **Start the server**:
   ```bash
   npm start
   ```

   Or for development with auto-reload:
   ```bash
   npm run dev
   ```

The server will start on port 3000 by default (configurable via `PORT` environment variable).

## Configuration

Edit `.env` file to customize settings:

```env
PORT=3000
ALLOWED_DOMAINS=auth0app.com,auth.kausti.com,localhost
RATE_LIMIT_WINDOW_MS=900000
RATE_LIMIT_MAX_REQUESTS=100
REQUEST_TIMEOUT_MS=10000
```

### Allowed Domains

The `ALLOWED_DOMAINS` configuration supports:
- **Exact matches**: `auth.kausti.com`
- **Wildcard subdomains**: `auth0app.com` matches `*.auth0app.com`
- **Localhost**: Explicitly allow `localhost` for local development

## API Endpoints

### POST /api/proxy

Main proxy endpoint for executing HTTP requests through the server.

**Request Body**:
```json
{
  "curlData": "curl --location 'https://dev.auth0app.com/api/v2/users' --header 'Authorization: Bearer token'",
  "requestType": "GET"
}
```

**Parameters**:
- `curlData` (required): cURL command string
- `requestType` (optional): HTTP method - GET, POST, PUT, PATCH, DELETE (defaults to GET)

**Example**:
```bash
curl -X POST http://localhost:3000/api/proxy \
  -H "Content-Type: application/json" \
  -d '{
    "curlData": "curl --location '\''https://dev.auth0app.com/api/v2/users'\'' --header '\''Authorization: Bearer token'\''",
    "requestType": "GET"
  }'
```

### GET /api/css-files

Scans for CSS files in the `resources/css/highlight.js-styles/` directory.

**Query Parameters**:
- `scan=true` (required)

**Example**:
```bash
curl "http://localhost:3000/api/css-files?scan=true"
```

**Response**:
```json
[
  "resources/css/highlight.js-styles/default.css",
  "resources/css/highlight.js-styles/github.css"
]
```

### GET /health

Health check endpoint for monitoring.

**Example**:
```bash
curl http://localhost:3000/health
```

**Response**:
```json
{
  "status": "ok",
  "uptime": 123.456,
  "timestamp": "2026-03-03T12:00:00.000Z"
}
```

### Legacy Compatibility

The server maintains compatibility with the original `test.php` endpoints:

- `POST /test.php` → forwards to `/api/proxy`
- `GET /test.php?scanForCss` → forwards to `/api/css-files?scan=true`

## Security Features

### Domain Validation

The server validates all proxy requests against an allowlist of domains:

1. **Protocol Check**: Only HTTP and HTTPS protocols are allowed
2. **Domain Allowlist**: Requests must match configured allowed domains
3. **Subdomain Support**: Wildcard matching for subdomains (e.g., `*.auth0app.com`)
4. **Private IP Protection**: Blocks private IP ranges to prevent SSRF attacks

**Blocked by default**:
- Private IP ranges (10.x.x.x, 172.16.x.x, 192.168.x.x, 169.254.x.x)
- Non-HTTP/HTTPS protocols (file://, ftp://, etc.)
- Domains not in the allowlist

### SSRF Protection

Multiple layers of protection against Server-Side Request Forgery:
- Domain allowlist enforcement
- No HTTP redirects (maxRedirects: 0)
- Private IP range blocking
- URL parsing with native URL API (no legacy vulnerabilities)

### Rate Limiting

Default configuration:
- **100 requests per 15 minutes** per IP address
- Returns `429 Too Many Requests` when limit exceeded
- Configurable via environment variables

### Security Headers

Helmet.js automatically adds security headers:
- X-Content-Type-Options
- X-Frame-Options
- X-XSS-Protection
- And more

## Error Handling

All errors return consistent JSON format:

```json
{
  "error": "Domain not allowed: malicious.com",
  "code": "SECURITY_ERROR",
  "timestamp": "2026-03-03T12:00:00.000Z"
}
```

**Error Types**:
- `400` - Validation errors (invalid input)
- `403` - Security errors (domain not allowed)
- `404` - Not found
- `429` - Rate limit exceeded
- `502` - Proxy request failed
- `504` - Request timeout

## Special Behavior

### mfa_token Handling

The server preserves special handling for `mfa_token` parameters containing `--`:
- Pre-processing: `mfa_token=abc--def` → `mfa_token=abc<dashdash>def`
- Post-processing: Restored to `mfa_token=abc--def` in the request data

### PUT Request Data

Following the original PHP behavior, PUT requests use the first data element:
```javascript
// If data is "key1=val1&key2=val2", PUT uses only "key1=val1"
```

## Development

### Running in Development Mode

```bash
npm run dev
```

Uses `nodemon` for automatic restart on file changes.

### Project Structure

```
auth0/
├── run.js              # Main Express server
├── package.json        # Dependencies and scripts
├── .env                # Environment configuration (not in git)
├── .env.example        # Environment template
├── .gitignore          # Git ignore rules
└── README.md           # This file
```

## Testing

### Manual Testing

Test the server with curl commands:

```bash
# Health check
curl http://localhost:3000/health

# Proxy request
curl -X POST http://localhost:3000/api/proxy \
  -H "Content-Type: application/json" \
  -d '{
    "curlData": "curl --location '\''https://dev.auth0app.com/api/v2/users'\'' --header '\''Authorization: Bearer token'\''",
    "requestType": "GET"
  }'

# CSS scanner
curl "http://localhost:3000/api/css-files?scan=true"

# Test domain validation (should fail)
curl -X POST http://localhost:3000/api/proxy \
  -H "Content-Type: application/json" \
  -d '{
    "curlData": "curl --location '\''https://malicious.com/api'\''",
    "requestType": "GET"
  }'
```

## Logging

The server logs:
- Request method, path, and timestamp
- Errors with full context
- Startup configuration

Example log output:
```
[2026-03-03T12:00:00.000Z] POST /api/proxy
[2026-03-03T12:00:01.000Z] Error: { name: 'SecurityError', message: 'Domain not allowed: malicious.com', code: 'SECURITY_ERROR', path: '/api/proxy', method: 'POST' }
```

## Graceful Shutdown

The server handles shutdown signals gracefully:
- `SIGTERM`: Kubernetes/Docker shutdown
- `SIGINT`: Ctrl+C in terminal

## Migration from test.php

The Node.js server maintains compatibility with the original PHP script:

1. **Same functionality**: All features from `test.php` are preserved
2. **Legacy endpoints**: `/test.php` endpoints still work
3. **Request format**: Same JSON request/response format
4. **Special handling**: `mfa_token` with `--` works the same way

**No client changes required** if using legacy endpoints.

## Improvements Over PHP Version

### Security
- Multi-layer SSRF protection
- Rate limiting to prevent abuse
- Security headers via Helmet.js
- No redirect following (prevents bypass)
- Private IP blocking

### Code Quality
- Modern async/await syntax
- Modular structure
- Comprehensive error handling
- Consistent error responses
- JSDoc documentation

### Performance
- Connection pooling (axios)
- Request timeouts (10s default)
- Graceful shutdown
- Efficient logging

### Developer Experience
- Health check endpoint
- Environment-based configuration
- npm scripts for easy management
- Clear error messages
- Auto-reload in development

## Troubleshooting

### Port Already in Use

Change the port in `.env`:
```env
PORT=3001
```

### Domain Not Allowed Error

Add the domain to `ALLOWED_DOMAINS` in `.env`:
```env
ALLOWED_DOMAINS=auth0app.com,auth.kausti.com,localhost,yourdomain.com
```

### Request Timeout

Increase timeout in `.env`:
```env
REQUEST_TIMEOUT_MS=30000
```

### Rate Limit Exceeded

Adjust rate limiting in `.env`:
```env
RATE_LIMIT_WINDOW_MS=900000
RATE_LIMIT_MAX_REQUESTS=200
```

## License

ISC

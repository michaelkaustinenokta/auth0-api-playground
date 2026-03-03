# Node.js Migration Complete

## Summary

The Auth0 API Playground has been successfully migrated from PHP to Node.js. The application now runs entirely on the Node.js server without any dependency on XAMPP or PHP.

## What Changed

### Files Modified:
- **index.html** (new) - Created from index.php, removed PHP authentication wrapper
- **run.js** - Added static file serving with support for dotfiles
- **resources/.env** - Updated paths from `/auth0/` to `/` and URLs to `http://localhost:3000`
- **resources/js/common.js** - Updated logout redirect from `/auth0` to `/`

### Key Updates:
1. **Static File Serving**: Node.js now serves all static assets (HTML, CSS, JS, images)
2. **Dotfile Support**: `.env` files are now accessible (required for environment configurations)
3. **Path Corrections**: All `/auth0/` prefixes removed, URLs updated to port 3000
4. **Single Server**: Everything runs on port 3000 (no need for separate PHP server)

## How to Use

### Start the Server:
```bash
npm start
```

### Access the Application:
Open your browser to: **http://localhost:3000/**

### Available Endpoints:
- `GET  /` - Auth0 API Playground UI (main interface)
- `GET  /api` - API information (JSON)
- `POST /api/proxy` - Main proxy endpoint for Auth0 API calls
- `GET  /api/css-files?scan=true` - CSS theme scanner
- `GET  /health` - Health check
- `POST /test.php` - Legacy compatibility endpoint

## Design & Functionality

✅ **Design Preserved** - All visual styling, colors, and layout remain unchanged  
✅ **Functionality Preserved** - All features work identically to the PHP version:
  - Environment switcher with 13 pre-configured environments
  - Wallpaper backgrounds for each environment
  - All API call templates and workflows
  - Token display and JWT decoding
  - User profile view
  - Settings configuration

## Benefits

1. **No PHP Dependency** - No need to run XAMPP or Apache
2. **Single Command** - Just `npm start` to run everything
3. **Modern Stack** - Pure Node.js/Express architecture
4. **Same Experience** - Identical UI and functionality
5. **Port 3000** - Consistent development environment

## Technical Details

- **Server**: Express.js with static file serving
- **Port**: 3000 (configurable via PORT environment variable)
- **Static Assets**: Served from project root with dotfile support
- **API Proxy**: Handles Auth0 API requests with SSRF protection
- **Rate Limiting**: 100 requests per 15 minutes
- **Security**: Helmet.js, CORS, domain allowlist


# CLI-Only Vercel Deployment Guide

## Overview
Complete guide for deploying and managing the Auth0 project on Vercel using **only command-line tools** (no browser required for ongoing operations).

## Current Status
- **Logged in as**: `mkausti`
- **Project**: `auth0` (in `mkaustis-projects` team)
- **Production URL**: https://auth0-lagom.vercel.app
- **GitHub Repo**: https://github.com/michaelkaustinenokta/auth0-api-playground.git
- **Vercel CLI Version**: 50.19.1

## Prerequisites
- Vercel CLI installed: `npm install -g vercel`
- Git repository initialized
- Node.js >=14.0.0

---

## Part 1: Initial Authentication (One-Time Setup)

### Method 1: Email Token Authentication (100% CLI)
```bash
# Request authentication token via email
vercel login --email your-email@example.com

# Vercel will send you a verification link via email
# Click the link in your email to verify
# CLI will automatically detect verification and complete login
```

### Method 2: Device Flow (Uses Browser Once)
```bash
# Start device flow authentication
vercel login

# CLI displays a URL and code
# Visit the URL in a browser (one-time only)
# Enter the code shown in CLI
# After this initial setup, all operations are CLI-only
```

### Verify Authentication
```bash
# Check who is logged in
vercel whoami

# Expected output: mkausti
```

---

## Part 2: Project Configuration

### Link Project to Vercel (One-Time Setup)
```bash
# Link the current directory to existing Vercel project
vercel link

# Vercel will prompt:
# - Set up and deploy: N (we just want to link)
# - Link to existing project: Y
# - Project name: auth0
# - Team: mkaustis-projects
```

### Project Settings (View Only)
```bash
# View project details
vercel inspect https://auth0-lagom.vercel.app

# List all deployments
vercel ls

# Get deployment logs
vercel logs https://auth0-lagom.vercel.app
```

---

## Part 3: Environment Variables Management (CLI-Only)

### Current Environment Variables
- `ALLOWED_DOMAINS` - Comma-separated list of allowed API domains
- `NODE_ENV` - Node environment (production/development)

### Add New Environment Variable
```bash
# Interactive mode (prompts for value)
vercel env add VARIABLE_NAME

# Non-interactive mode (provide value inline)
echo "variable-value" | vercel env add VARIABLE_NAME

# Specify environments
vercel env add VARIABLE_NAME production
vercel env add VARIABLE_NAME preview
vercel env add VARIABLE_NAME development
```

### List Environment Variables
```bash
# View all environment variables
vercel env ls

# Note: Values are encrypted and not shown in CLI
```

### Remove Environment Variable
```bash
# Remove from specific environment
vercel env rm VARIABLE_NAME production

# Remove from all environments
vercel env rm VARIABLE_NAME
```

### Pull Environment Variables Locally
```bash
# Download env vars to .env.local file
vercel env pull

# This creates/updates .env.local with decrypted values
# Useful for local development
```

---

## Part 4: Deployment Commands

### Deploy to Production
```bash
# Deploy to production (with confirmation)
vercel --prod

# Output:
# - Deployment URL (e.g., https://auth0-xyz.vercel.app)
# - Production alias (e.g., https://auth0-lagom.vercel.app)
# - Build logs
# - Status: Ready
```

### Deploy to Preview (Non-Production)
```bash
# Deploy to preview environment
vercel

# Creates a preview deployment with unique URL
# Does NOT affect production
```

### Deploy Specific Branch
```bash
# Ensure you're on the correct branch
git checkout feature-branch

# Deploy the current branch
vercel --prod

# Or deploy to preview
vercel
```

### Skip Build Cache
```bash
# Force fresh build (ignore cache)
vercel --prod --force

# Useful when dependencies change
```

---

## Part 5: Deployment Management

### View Deployment Details
```bash
# Inspect specific deployment
vercel inspect <deployment-url>

# Example:
vercel inspect https://auth0-dk9e74y93-mkaustis-projects.vercel.app
```

### View Deployment Logs
```bash
# View logs for specific deployment
vercel logs <deployment-url>

# View logs for production
vercel logs https://auth0-lagom.vercel.app

# Follow logs in real-time
vercel logs <deployment-url> --follow

# View last N lines
vercel logs <deployment-url> --limit 100
```

### Redeploy Previous Deployment
```bash
# Redeploy a specific deployment
vercel redeploy <deployment-url> --prod

# Useful for rolling back to a previous version
```

### Remove/Delete Deployments
```bash
# Remove a specific deployment
vercel rm <deployment-url>

# Remove with confirmation skip
vercel rm <deployment-url> --yes

# Note: Cannot remove production deployment
# Must promote different deployment first
```

---

## Part 6: Domain Management (CLI-Only)

### List Domains
```bash
# View all domains for the project
vercel domains ls
```

### Add Custom Domain
```bash
# Add a custom domain
vercel domains add example.com

# Add subdomain
vercel domains add auth0.example.com

# Vercel will provide DNS configuration instructions
```

### Remove Domain
```bash
# Remove a domain
vercel domains rm example.com
```

---

## Part 7: Automation & CI/CD

### Automated Deployment Script
Create a deployment script for fully automated deployments:

**File**: `scripts/deploy.sh`
```bash
#!/bin/bash

# Exit on error
set -e

echo "Starting deployment..."

# Pull latest code
git pull origin main

# Install dependencies
npm install

# Deploy to production
vercel --prod --yes

echo "Deployment complete!"
```

### Make Script Executable
```bash
chmod +x scripts/deploy.sh
```

### Run Automated Deployment
```bash
./scripts/deploy.sh
```

### GitHub Actions Integration (Optional)
Create `.github/workflows/deploy.yml`:
```yaml
name: Deploy to Vercel
on:
  push:
    branches: [main]

jobs:
  deploy:
    runs-on: ubuntu-latest
    steps:
      - uses: actions/checkout@v2
      - name: Deploy to Vercel
        env:
          VERCEL_TOKEN: ${{ secrets.VERCEL_TOKEN }}
        run: |
          npm install -g vercel
          vercel --prod --token $VERCEL_TOKEN --yes
```

---

## Part 8: Monitoring & Troubleshooting

### Check Deployment Status
```bash
# List recent deployments with status
vercel ls

# Check if deployment is ready
vercel inspect <deployment-url> | grep -i "status"
```

### View Build Logs
```bash
# View complete build logs
vercel logs <deployment-url> --all

# Filter logs by type
vercel logs <deployment-url> --type build
```

### Test Deployment
```bash
# Test API endpoint
curl https://auth0-lagom.vercel.app/health

# Test specific deployment
curl https://auth0-xyz.vercel.app/api
```

### Common Issues & Solutions

**Issue 1: Build Fails**
```bash
# Check build logs
vercel logs <deployment-url> --type build

# Clear cache and redeploy
vercel --prod --force
```

**Issue 2: Environment Variables Not Working**
```bash
# Verify env vars are set
vercel env ls

# Pull env vars locally to verify values
vercel env pull

# Redeploy after adding env vars
vercel --prod
```

**Issue 3: Domain Not Resolving**
```bash
# Check domain configuration
vercel domains ls

# Verify DNS records
dig auth0-lagom.vercel.app
```

---

## Part 9: Project-Specific Configuration

### Current Project Structure
```
/Applications/XAMPP/xamppfiles/htdocs/auth0/
├── api/
│   ├── index.js          # Main Express server
│   └── .env              # Backend environment config
├── resources/
│   ├── js/common.js      # Frontend JavaScript
│   ├── css/common.css    # Styling
│   └── .env              # Frontend environment data
├── vercel.json           # Vercel configuration
├── package.json          # Node dependencies
└── .vercelignore         # Files to exclude from deployment
```

### Critical Files

**vercel.json** (Routing Configuration):
```json
{
  "functions": {
    "api/**/*.js": {
      "includeFiles": "resources/**"
    }
  },
  "rewrites": [
    { "source": "/api/:path*", "destination": "/api" },
    { "source": "/health", "destination": "/api" },
    { "source": "/test.php", "destination": "/api" },
    { "source": "/(.*)", "destination": "/api" }
  ]
}
```

**.vercelignore** (Excluded Files):
```
/.env
.env.*
!api/.env
resources/.env
*.log
.DS_Store
.vscode/
.idea/
node_modules/
```

### Build Script
From `package.json`:
```json
"scripts": {
  "vercel-build": "echo 'No build step needed'"
}
```

---

## Part 10: Complete Workflow Example

### Scenario: Deploy New Changes to Production

```bash
# 1. Make code changes
vim api/index.js

# 2. Test locally
cd api && npm start
# Test at http://localhost:3000

# 3. Commit changes
git add .
git commit -m "Add new feature"

# 4. Push to GitHub
git push origin main

# 5. Deploy to production
vercel --prod

# 6. Verify deployment
curl https://auth0-lagom.vercel.app/health

# 7. View logs if needed
vercel logs https://auth0-lagom.vercel.app
```

### Scenario: Add New Environment Variable

```bash
# 1. Add environment variable
echo "new-value" | vercel env add NEW_VARIABLE production

# 2. Verify it was added
vercel env ls

# 3. Redeploy to apply changes
vercel --prod

# 4. Test the new variable is working
curl https://auth0-lagom.vercel.app/api
```

### Scenario: Rollback to Previous Deployment

```bash
# 1. List recent deployments
vercel ls

# 2. Find the working deployment URL
# Example: https://auth0-6ga3zyl9l-mkaustis-projects.vercel.app

# 3. Redeploy that version to production
vercel redeploy https://auth0-6ga3zyl9l-mkaustis-projects.vercel.app --prod

# 4. Verify rollback succeeded
curl https://auth0-lagom.vercel.app/health
```

---

## Part 11: CLI Reference

### Essential Commands
```bash
# Authentication
vercel login                          # Login to Vercel
vercel logout                         # Logout from Vercel
vercel whoami                         # Show current user

# Project Management
vercel link                           # Link project to Vercel
vercel unlink                         # Unlink project

# Deployment
vercel                                # Deploy to preview
vercel --prod                         # Deploy to production
vercel --force                        # Deploy with fresh build
vercel --yes                          # Skip confirmation prompts

# Environment Variables
vercel env ls                         # List environment variables
vercel env add NAME                   # Add environment variable
vercel env rm NAME                    # Remove environment variable
vercel env pull                       # Download env vars locally

# Monitoring
vercel ls                             # List deployments
vercel inspect <url>                  # View deployment details
vercel logs <url>                     # View deployment logs
vercel logs <url> --follow            # Follow logs in real-time

# Management
vercel redeploy <url> --prod          # Redeploy specific version
vercel rm <url>                       # Remove deployment
vercel domains ls                     # List domains
```

### Flags & Options
```bash
--prod              # Deploy to production
--yes               # Skip confirmation prompts
--force             # Force new build (ignore cache)
--token <token>     # Use specific auth token
--scope <team>      # Deploy to specific team/user
--follow            # Follow logs in real-time
--all               # Show all logs (not just recent)
--limit <n>         # Limit log output to N lines
```

---

## Part 12: Advanced Configuration

### Custom Deployment Regions
```bash
# Deploy to specific regions (in vercel.json)
{
  "regions": ["iad1", "sfo1"]
}
```

### Custom Build Command
```bash
# Override build command
vercel --build-env NODE_ENV=production

# Or in vercel.json:
{
  "build": {
    "env": {
      "NODE_ENV": "production"
    }
  }
}
```

### Deployment Protection
```bash
# Add deployment protection password
vercel --env VERCEL_PASSWORD=secret123
```

---

## Verification Steps

After following this guide, verify everything works:

1. **Authentication**:
   ```bash
   vercel whoami
   # Should show: mkausti
   ```

2. **Project Link**:
   ```bash
   vercel ls
   # Should show auth0 deployments
   ```

3. **Environment Variables**:
   ```bash
   vercel env ls
   # Should show: ALLOWED_DOMAINS, NODE_ENV
   ```

4. **Deployment**:
   ```bash
   vercel --prod
   # Should deploy successfully
   ```

5. **Application Health**:
   ```bash
   curl https://auth0-lagom.vercel.app/health
   # Should return: {"status":"ok",...}
   ```

6. **Dynamic Redirect URI**:
   ```bash
   curl https://auth0-lagom.vercel.app/api/config
   # Should return config with __DETECT__ marker
   ```

---

## Summary

This guide provides a **100% CLI-based workflow** for:
- ✅ Authentication (email token or device flow)
- ✅ Project linking and configuration
- ✅ Environment variable management
- ✅ Production deployments
- ✅ Monitoring and logs
- ✅ Rollbacks and troubleshooting
- ✅ Domain management
- ✅ Automation scripts

**No browser required** for day-to-day operations after initial authentication.

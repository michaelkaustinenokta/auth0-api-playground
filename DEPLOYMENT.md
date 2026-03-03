# Vercel Deployment Guide

This guide walks you through deploying the Auth0 API Playground to Vercel.

## What Has Been Configured

The application has been prepared for Vercel deployment with the following changes:

### Security Enhancements

1. **`.env` File Protection**: Added middleware to block HTTP access to `resources/.env` (returns 403 Forbidden)
2. **CORS Configuration**: Updated to restrict origins in production while allowing:
   - `https://auth0app.com`
   - `https://auth.kausti.com`
   - All Vercel deployments (`*.vercel.app`)
3. **Static File Serving**: Configured to serve from project root with .env protection

### New Files Created

- **`vercel.json`**: Vercel configuration for serverless deployment
- **`.vercelignore`**: Files to exclude from deployment (logs, IDE files, etc.)
- **`DEPLOYMENT.md`**: This deployment guide

### Modified Files

- **`run.js`**:
  - Added .env protection middleware (line 132-142)
  - Updated CORS for production (line 59-79)
- **`package.json`**: Added `vercel-build` script

## Prerequisites

Before deploying, ensure you have:

1. **Vercel Account**: Sign up at https://vercel.com
2. **Node.js**: Version 14 or higher
3. **Git**: Changes should be committed

## Step 1: Install Vercel CLI

```bash
npm install -g vercel
```

Verify installation:
```bash
vercel --version
```

## Step 2: Login to Vercel

```bash
vercel login
```

This will open your browser for authentication.

## Step 3: Test Locally with Vercel

Before deploying to production, test locally:

```bash
vercel dev
```

### Local Testing Checklist

- [ ] Visit http://localhost:3000
- [ ] Main UI loads correctly
- [ ] Environment dropdown shows all 13 environments
- [ ] Try accessing http://localhost:3000/resources/.env - should return 403 Forbidden
- [ ] Check browser console for errors
- [ ] Test environment switching

## Step 4: Deploy to Production

Deploy to Vercel:

```bash
vercel --prod
```

You'll be prompted for:
- **Set up and deploy**: Select `Y`
- **Which scope**: Choose your account/team
- **Link to existing project**: Select `N` (first deployment)
- **Project name**: Accept default or choose a name (e.g., `auth0-playground`)
- **Directory**: Accept `.` (current directory)
- **Override settings**: Select `N`

Vercel will:
1. Upload your project files
2. Install dependencies
3. Deploy the serverless function
4. Provide a deployment URL (e.g., `https://auth0-playground.vercel.app`)

**Important**: Note down the deployment URL for the next step.

## Step 5: Configure Environment Variables

After deployment, add environment variables in Vercel Dashboard:

1. Visit https://vercel.com/dashboard
2. Select your project (e.g., `auth0-playground`)
3. Go to **Settings** → **Environment Variables**
4. Add the following variables:

| Variable Name | Value | Environment |
|--------------|-------|-------------|
| `NODE_ENV` | `production` | Production |
| `ALLOWED_DOMAINS` | `auth0app.com,auth.kausti.com,localhost,*.vercel.app` | Production |

**Optional variables** (use defaults if not set):
- `REQUEST_TIMEOUT_MS`: `10000` (10 seconds)
- `MAX_REDIRECTS`: `0` (disable redirects)

## Step 6: Redeploy with Environment Variables

After adding environment variables, redeploy:

```bash
vercel --prod
```

This ensures the environment variables are applied.

## Step 7: Update Auth0 Configuration

Add your Vercel URL to Auth0 application settings:

1. Go to Auth0 Dashboard
2. Navigate to Applications → Your Application
3. Update the following fields with your Vercel URL:

**Allowed Callback URLs**: Add
```
https://your-project.vercel.app/
```

**Allowed Logout URLs**: Add
```
https://your-project.vercel.app/
```

**Allowed Web Origins**: Add
```
https://your-project.vercel.app
```

**Allowed Origins (CORS)**: Add
```
https://your-project.vercel.app
```

## Verification Checklist

After deployment, verify all functionality:

### Basic Functionality
- [ ] Visit deployment URL - main UI loads
- [ ] All CSS/JS/images load correctly
- [ ] No console errors in browser
- [ ] Environment wallpapers load

### Security
- [ ] Access `https://your-domain.vercel.app/resources/.env` returns 403 Forbidden
- [ ] Check CORS headers in Network tab
- [ ] CSP headers allow required resources

### Application Features
- [ ] Environment dropdown shows 13 environments
- [ ] Switching environments works
- [ ] Environment-specific wallpapers load
- [ ] Settings panel opens

### API Testing
- [ ] `/health` endpoint returns status
- [ ] `/api` endpoint returns info
- [ ] Select environment and test Auth0 login flow
- [ ] Make API proxy request through `/api/proxy`

## Important Notes

### .env File Access

The `resources/.env` file is included in the deployment (needed for environment configs) but protected from HTTP access. Direct browser access returns 403 Forbidden.

### CORS in Production

In production, CORS is restricted to:
- `https://auth0app.com`
- `https://auth.kausti.com`
- All Vercel deployments (`*.vercel.app`)

### Rate Limiting

Rate limiting remains disabled as configured. To enable in the future, uncomment lines 114-122 in `run.js`.

## Troubleshooting

### Deployment Fails

**Check Vercel function logs**:
1. Go to Vercel Dashboard → Your Project
2. Click **Deployments** → Latest deployment
3. Check **Functions** tab for errors

**Common issues**:
- Missing dependencies: Run `npm install` locally first
- Node version: Ensure Node.js ≥14
- Build errors: Check `vercel build` output

### 403 Forbidden on All Routes

**Issue**: CORS blocking requests

**Solution**:
1. Check `NODE_ENV` is set to `production` in Vercel
2. Verify `ALLOWED_DOMAINS` includes your domain
3. Check browser console for CORS errors

### Environment Dropdown Empty

**Issue**: `resources/.env` not loading

**Solution**:
1. Verify file is deployed (check Vercel source)
2. Check browser Network tab for load errors
3. Ensure CSP allows the resource

### API Proxy Errors

**Issue**: Domain validation failing

**Solution**:
1. Verify `ALLOWED_DOMAINS` environment variable
2. Check Auth0 domains match allowed list
3. Review function logs for specific errors

## Rollback Procedure

If deployment has critical issues:

### Option 1: Rollback to Previous Deployment

1. Go to Vercel Dashboard → Your Project
2. Click **Deployments**
3. Find previous working deployment
4. Click **⋯** (three dots) → **Promote to Production**

### Option 2: Deploy from Git

If changes were committed:

```bash
git revert HEAD
vercel --prod
```

### Option 3: Local Development

Keep local version running during transition:

```bash
npm start
```

Access at `http://localhost:3000`

## Continuous Deployment

### Automatic Deployment with Git

To enable automatic deployments:

1. In Vercel Dashboard → Your Project → **Settings** → **Git**
2. Connect your Git repository (GitHub, GitLab, Bitbucket)
3. Configure:
   - **Production Branch**: `main` (or your default branch)
   - **Preview Branches**: Enable for pull requests

Now every push to `main` automatically deploys to production.

### Manual Deployment

Continue using CLI:
```bash
vercel --prod
```

## Monitoring

### View Logs

**Real-time logs**:
```bash
vercel logs --follow
```

**Recent logs**:
```bash
vercel logs
```

**Dashboard**: Visit Vercel Dashboard → Your Project → **Logs**

### Analytics

- View usage statistics in Vercel Dashboard → Your Project → **Analytics**
- Monitor function execution time, errors, and bandwidth

## Domain Configuration (Optional)

To use a custom domain:

1. Go to Vercel Dashboard → Your Project → **Settings** → **Domains**
2. Add your domain (e.g., `auth0-playground.yourdomain.com`)
3. Configure DNS records as instructed by Vercel
4. Update `ALLOWED_DOMAINS` environment variable to include new domain
5. Update Auth0 redirect URLs with new domain

## Support

If you encounter issues:

1. Check Vercel documentation: https://vercel.com/docs
2. Review function logs in dashboard
3. Test locally with `vercel dev`
4. Check Auth0 application configuration

## Summary

Your Auth0 API Playground is now production-ready with:

- ✅ Secure .env file protection
- ✅ Production CORS configuration
- ✅ Vercel serverless deployment
- ✅ Environment-based configuration
- ✅ Health monitoring endpoints
- ✅ Full Auth0 API proxy functionality

The application maintains all 13 environment configurations and provides a secure, scalable deployment on Vercel's edge network.

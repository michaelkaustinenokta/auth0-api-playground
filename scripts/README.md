# Deployment Scripts

This directory contains automation scripts for the Auth0 project deployment.

## Available Scripts

### deploy.sh

Automated deployment script for Vercel production deployments.

**Usage:**
```bash
./scripts/deploy.sh
```

**What it does:**
1. Pulls the latest code from the main branch
2. Installs/updates npm dependencies
3. Deploys to Vercel production with automatic confirmation

**Prerequisites:**
- Vercel CLI installed: `npm install -g vercel`
- Authenticated with Vercel: `vercel login`
- Project linked to Vercel: `vercel link`
- Git repository configured with remote origin

**Notes:**
- The script will exit immediately if any command fails (`set -e`)
- Make sure you have committed and pushed all changes before running
- The script uses `--yes` flag to skip confirmation prompts

## Manual Deployment

If you prefer to deploy manually without the script:

```bash
# Deploy to production
vercel --prod

# Deploy to preview
vercel
```

## CI/CD with GitHub Actions

For automated deployments on every push to main, see `.github/workflows/deploy.yml`.

You'll need to add a `VERCEL_TOKEN` secret to your GitHub repository:

1. Generate a token at: https://vercel.com/account/tokens
2. Add it to GitHub: Settings → Secrets and variables → Actions → New repository secret
3. Name: `VERCEL_TOKEN`
4. Value: Your Vercel token

## Troubleshooting

If the deployment script fails:

1. Check you're authenticated: `vercel whoami`
2. Check project is linked: `vercel ls`
3. Pull latest changes manually: `git pull origin main`
4. Try deploying manually: `vercel --prod`
5. Check Vercel logs: `vercel logs https://auth0-lagom.vercel.app`

For more detailed information, see the [VERCEL_CLI_GUIDE.md](../VERCEL_CLI_GUIDE.md).

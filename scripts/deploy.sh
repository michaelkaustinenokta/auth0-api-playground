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

#!/bin/bash

echo "🚀 Starting Laravel Deployment..."

# Step 1: Clear caches
echo "🧹 Clearing caches..."
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Step 2: Migrate database
echo "🛠️ Running migrations..."
php artisan migrate --force

# Step 3: Rebuild config and optimize
echo "⚡ Optimizing config..."
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize

# Step 4: Success message
echo "✅ Deployment completed successfully!"

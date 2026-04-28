#!/bin/bash
set -e

# Create SQLite database on the persistent volume if it doesn't exist
if [ ! -f /data/database.sqlite ]; then
    touch /data/database.sqlite
    echo "Created new SQLite database"
fi

# Symlink the database to where Laravel expects it
ln -sf /data/database.sqlite /app/database/database.sqlite

# Ensure correct permissions
chown -R www-data:www-data /data
chown -R www-data:www-data /app/storage /app/bootstrap/cache

# Cache config and routes for production
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run migrations
php artisan migrate --force

echo "Starting Apache..."
exec apache2-foreground

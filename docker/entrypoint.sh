#!/bin/bash
set -e

echo "=== MoveWell Startup ==="

# Create data directory if not exists
mkdir -p /data/storage/app/public

# Create SQLite database if not exists
if [ ! -f /data/database.sqlite ]; then
    echo "Creating fresh SQLite database..."
    touch /data/database.sqlite

    # Import SQLite data from converted SQL dump
    if [ -f /var/www/html/database/movewell_sqlite.sql ]; then
        echo "Importing data from movewell_sqlite.sql..."
        sqlite3 /data/database.sqlite < /var/www/html/database/movewell_sqlite.sql
        echo "Data imported successfully."
    else
        # Fallback: run migrations and seed
        php artisan migrate --force
        php artisan db:seed --force
    fi

    echo "Database created and seeded."
else
    echo "Database exists, running pending migrations..."
    php artisan migrate --force
fi

# Link persistent storage for uploads
if [ -d /data/storage/app/public ]; then
    rm -rf /var/www/html/storage/app/public
    ln -sf /data/storage/app/public /var/www/html/storage/app/public
fi

# Create storage symlink (public/storage -> storage/app/public)
php artisan storage:link --force 2>/dev/null || true

# Cache config and routes for production
if [ "$APP_ENV" = "production" ]; then
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
    echo "Production caches warmed."
fi

# Fix permissions
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /data

# Update Apache port to match $PORT
sed -i "s/\${PORT}/$PORT/g" /etc/apache2/ports.conf
sed -i "s/\${PORT}/$PORT/g" /etc/apache2/sites-available/000-default.conf

echo "=== Starting Apache on port $PORT ==="
exec apache2-foreground

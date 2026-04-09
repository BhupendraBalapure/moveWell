# ============================================
# Stage 1: Build frontend assets
# ============================================
FROM node:20-alpine AS frontend

WORKDIR /app

COPY package.json ./
RUN npm install

COPY vite.config.js ./
COPY resources/ ./resources/

RUN npm run build

# ============================================
# Stage 2: PHP + Apache runtime
# ============================================
FROM php:8.4-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    dumb-init \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libsqlite3-dev \
    zip \
    unzip \
    sqlite3 \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        pdo_sqlite \
        mbstring \
        xml \
        bcmath \
        gd \
        fileinfo \
        zip \
        pcntl \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set Apache to listen on $PORT (Render sets this, default 10000)
COPY docker/ports.conf /etc/apache2/ports.conf
COPY docker/000-default.conf /etc/apache2/sites-available/000-default.conf

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy application code
COPY . .

# Copy built frontend assets from stage 1
COPY --from=frontend /app/public/build ./public/build

# Install PHP dependencies (production only)
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Create necessary directories
RUN mkdir -p storage/logs \
    storage/framework/cache/data \
    storage/framework/sessions \
    storage/framework/views \
    storage/framework/testing \
    bootstrap/cache \
    /data/storage/app/public

# Set permissions
RUN chown -R www-data:www-data /var/www/html /data \
    && chmod -R 775 storage bootstrap/cache /data

# Copy and set entrypoint
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Default PORT for Render
ENV PORT=10000

EXPOSE ${PORT}

ENTRYPOINT ["dumb-init", "--rewrite", "28:0", "--", "entrypoint.sh"]

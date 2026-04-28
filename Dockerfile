FROM php:8.2-apache

# Enable mod_rewrite for Laravel routing
RUN a2enmod rewrite

# Install dependencies
RUN apt-get update && apt-get install -y \
    git unzip libsqlite3-dev libzip-dev zip nodejs npm \
    && docker-php-ext-install pdo pdo_sqlite zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copy composer files first for better caching
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Copy package files and build frontend
COPY package.json package-lock.json* ./
RUN npm install

# Copy the rest of the application
COPY . .

# Run composer scripts (post-install)
RUN composer dump-autoload --optimize

# Build frontend assets
RUN npm run build

# Create directories for SQLite and storage
RUN mkdir -p /data \
    && mkdir -p storage/framework/{sessions,views,cache} \
    && mkdir -p storage/logs \
    && mkdir -p bootstrap/cache

# Configure Apache VirtualHost
RUN echo '<VirtualHost *:8080>\n\
    DocumentRoot /app/public\n\
    <Directory /app/public>\n\
        AllowOverride All\n\
        Require all granted\n\
    </Directory>\n\
</VirtualHost>' > /etc/apache2/sites-available/000-default.conf

# Set Apache to listen on port 8080
RUN sed -i 's/Listen 80/Listen 8080/' /etc/apache2/ports.conf

# Copy startup script
COPY docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# Ensure Apache can read/write app files
RUN chown -R www-data:www-data /app /data

EXPOSE 8080

ENTRYPOINT ["docker-entrypoint.sh"]

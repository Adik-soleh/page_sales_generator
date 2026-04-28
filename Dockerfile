FROM php:8.4-apache

# Enable mod_rewrite for Laravel routing
RUN a2enmod rewrite

# Install dependencies
RUN apt-get update && apt-get install -y \
    git unzip libsqlite3-dev libzip-dev zip nodejs npm \
    && docker-php-ext-install pdo pdo_sqlite zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN composer install --no-dev --optimize-autoloader

# Build frontend assets
RUN npm install && npm run build

# Create SQLite database directory
RUN mkdir -p database && touch database/database.sqlite

# Configure Apache VirtualHost to serve from /app/public on port 8080
RUN echo '<VirtualHost *:8080>\n\
    DocumentRoot /app/public\n\
    <Directory /app/public>\n\
        AllowOverride All\n\
        Require all granted\n\
    </Directory>\n\
</VirtualHost>' > /etc/apache2/sites-available/000-default.conf

# Set Apache to listen on port 8080
RUN sed -i 's/Listen 80/Listen 8080/' /etc/apache2/ports.conf

# Ensure Apache can read the app files
RUN chown -R www-data:www-data /app

EXPOSE 8080

CMD php artisan migrate --force && apache2-foreground

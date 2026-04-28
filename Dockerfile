FROM php:8.2-cli

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

# Create SQLite database and run migrations
RUN touch database/database.sqlite \
    && php artisan migrate --force

# Expose port
EXPOSE 10000

CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=10000

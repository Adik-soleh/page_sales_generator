FROM php:8.4-cli

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

CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=${PORT:-8000}

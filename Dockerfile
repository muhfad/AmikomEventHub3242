FROM dunglas/frankenphp:1.5-php8.4

# Install system packages
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    curl \
    gnupg

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install NodeJS 22
RUN curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y nodejs

# Install PHP Extensions
RUN install-php-extensions \
    pdo_mysql \
    mbstring \
    bcmath \
    gd \
    zip \
    intl \
    exif

WORKDIR /app

COPY . .

# Install Composer dependencies
RUN composer install --no-dev --optimize-autoloader

# Install Node dependencies
RUN npm install

# Build Vite
RUN npm run build

# Cache Laravel
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

EXPOSE 80

CMD ["frankenphp", "run"]
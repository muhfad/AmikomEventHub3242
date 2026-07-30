FROM dunglas/frankenphp:1.5-php8.4

# Install system packages
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Install Node.js 22
RUN curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y nodejs

# Install PHP extensions
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

# Install dependency
RUN composer install --no-dev --optimize-autoloader

# Build frontend
RUN npm install
RUN npm run build

# Permission
RUN chmod -R 775 storage bootstrap/cache

EXPOSE 8080

ENV SERVER_NAME=:8080

CMD ["frankenphp","php-server","-r","public/","--listen",":8080"]
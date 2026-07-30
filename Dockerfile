FROM dunglas/frankenphp:1.5-php8.4

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

RUN composer install --no-dev --optimize-autoloader

RUN npm install
RUN npm run build

RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

CMD ["frankenphp","run","--config","/etc/caddy/Caddyfile"]
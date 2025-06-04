FROM php:8.2-fpm AS php

RUN usermod -u 1000 www-data

RUN apt-get update && apt-get install -y unzip libzip-dev libpq-dev libcurl4-gnutls-dev nginx libonig-dev

RUN docker-php-ext-install mysqli pdo pdo_mysql bcmath curl opcache mbstring zip

WORKDIR /var/www

COPY --chown=www-data . .

COPY ./docker/php/php.ini /usr/local/etc/php/php.ini

COPY ./docker/php/php-fpm.conf /usr/local/etc/php-fpm.d/www.conf

COPY ./docker/nginx/nginx.conf /etc/nginx/nginx.conf

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# RUN php artisan cache:clear
# RUN php artisan config:clear
# RUN php artisan route:clear

RUN chown -R www-data:www-data storage bootstrap/cache
RUN chmod -R 755 /var/www/storage
RUN chmod -R 755 /var/www/bootstrap/cache

ENTRYPOINT [ "docker/entrypoint.sh" ]
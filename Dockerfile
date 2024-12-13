# Base image PHP với FPM (FastCGI Process Manager)
FROM php:8.2-fpm

# Cài đặt các dependencies
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    unzip \
    && docker-php-ext-install pdo pdo_mysql zip

# Cài Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Đặt thư mục làm việc trong container
WORKDIR /var/www

# Sao chép mã nguồn vào container
COPY . /var/www

# Cấp quyền truy cập cho web server
RUN chown -R www-data:www-data /var/www

FROM php:8.4-apache

RUN apt-get update && apt-get install -y \
        libjpeg-dev \
        libpng-dev \
        libfreetype6-dev \
        libzip-dev \
        unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        gd \
        exif \
        pdo_mysql \
        mysqli \
        zip

RUN a2enmod rewrite

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

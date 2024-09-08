ARG PHP_VERSION=8.3

FROM php:${PHP_VERSION}-fpm

LABEL maintainer="MKuchirov <mkuchirov@gmail.com>"

RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    zip \
    && docker-php-ext-configure zip \
    && docker-php-ext-install pdo pdo_pgsql zip;

ADD ./web /var/www/html
RUN chown -R www-data:www-data /var/www/html;
RUN if [ -d "/var/www/html/storage" ]; then \
        chmod -R 755 /var/www/html/storage \
    else \
        echo "Storage catalog was not found"; \
    fi

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

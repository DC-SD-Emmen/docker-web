FROM php:8.5-fpm

# Handig script om PHP-extensies te installeren (incl. systeemafhankelijkheden)
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

# pdo_sqlite, sqlite3, mbstring, curl, openssl en opcache zitten al standaard in het image
RUN install-php-extensions \
        mysqli \
        pdo_mysql \
        gd \
        intl \
        zip \
        bcmath \
        exif \
        xdebug \
        @composer

COPY php.ini /usr/local/etc/php/conf.d/zz-custom.ini

WORKDIR /app

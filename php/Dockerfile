FROM php:7.4-fpm

WORKDIR /srv

COPY src /srv

FROM php:fpm-alpine

RUN docker-php-ext-install pdo_mysql

CMD ["php-fpm"]


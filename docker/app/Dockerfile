FROM php:7.4.3-fpm-alpine

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /tmp

RUN curl -o /usr/local/bin/composer -L https://github.com/composer/composer/releases/download/1.8.6/composer.phar \
    && chmod +x /usr/local/bin/composer;

WORKDIR /var/www/html

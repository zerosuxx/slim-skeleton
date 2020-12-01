FROM php:8.0.0-fpm-alpine

ARG COMPOSER_VERSION=2.0.7

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /tmp

# install command line tools
RUN apk add --update --no-cache \
    bash \
    make \
    git

RUN rm -rf /tmp/* /var/cache/apk/*

RUN docker-php-ext-install opcache

RUN curl -o /usr/local/bin/composer -L https://github.com/composer/composer/releases/download/${COMPOSER_VERSION}/composer.phar \
    && chmod +x /usr/local/bin/composer

WORKDIR /var/www/html

FROM php:7.4.16-fpm-alpine

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /tmp
ARG COMPOSER_VERSION=2.0.11

RUN curl -o /usr/local/bin/composer -L https://github.com/composer/composer/releases/download/${COMPOSER_VERSION}/composer.phar \
    && chmod +x /usr/local/bin/composer;

RUN adduser -D -h /app app

USER app
WORKDIR /app

WORKDIR /var/www/html

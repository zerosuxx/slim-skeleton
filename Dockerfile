FROM php:7.3-alpine

RUN curl -o /usr/local/bin/composer -L https://github.com/composer/composer/releases/download/1.8.6/composer.phar \
    && chmod +x /usr/local/bin/composer;

WORKDIR /app

CMD ["php", "-S", "0.0.0.0:8080", "/app/public/index.php"]

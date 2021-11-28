FROM php:8.0-fpm-alpine

RUN apk update && apk upgrade
RUN apk add php8-zip composer

# Install memcached extension
ENV MEMCACHED_DEPS zlib-dev libmemcached-dev cyrus-sasl-dev
RUN apk add --no-cache --update libmemcached-libs zlib
RUN set -xe \
    && apk add --no-cache --update --virtual .phpize-deps $PHPIZE_DEPS \
    && apk add --no-cache --update --virtual .memcached-deps $MEMCACHED_DEPS \
    && pecl install memcached

RUN echo "extension=memcached.so" > /usr/local/etc/php/conf.d/20_memcached.ini
RUN rm -rf /usr/share/php8
RUN rm -rf /tmp/*
RUN apk del .memcached-deps .phpize-deps

# Install redis extension
RUN apk add --no-cache pcre-dev $PHPIZE_DEPS \
        && pecl install redis \
        && docker-php-ext-enable redis.so





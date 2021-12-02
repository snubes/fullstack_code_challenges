FROM php:8.1

RUN apt-get update && apt-get install -y libmemcached-dev zlib1g-dev
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install memcached extension
RUN pecl install memcached
RUN docker-php-ext-enable memcached

# Install redis extension
RUN pecl install redis
RUN docker-php-ext-enable redis.so
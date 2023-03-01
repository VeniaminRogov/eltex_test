FROM php:8.1-fpm-alpine

RUN apk add acl autoconf g++ make

# Install PDO driver for MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./docker/development/php-fpm/etc/docker-entrypoint.sh /usr/local/bin/docker-entrypoint
RUN chmod +x /usr/local/bin/docker-entrypoint

WORKDIR /var/www/application/symfony

ENTRYPOINT ["docker-entrypoint"]
CMD ["php-fpm"]

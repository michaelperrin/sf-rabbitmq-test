FROM php:7.0-fpm
MAINTAINER Michaël Perrin <mperrin@greenflex.com>

RUN apt-get update \
    && apt-get install -y \
        git \
        unzip

# Necessary for RabbitMQ library
RUN docker-php-ext-install \
        bcmath \
        mbstring \
        sockets \
    && docker-php-ext-enable \
        bcmath \
        mbstring \
        sockets

# Composer
RUN php -r "readfile('https://getcomposer.org/installer');" > composer-setup.php
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

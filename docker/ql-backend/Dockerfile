FROM php:7.1-apache

COPY php.ini /usr/local/etc/php/

RUN apt-get update \
  && apt-get install -y \
    autoconf \
    pkg-config \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libxml2-dev \
    git \
  && docker-php-ext-install \
    pdo_mysql \
    mysqli \
    mbstring \
    gd \
    iconv \
    mcrypt \
    zip \
    xml \
    hash \
    json \
    soap \
    sockets


# mongodb
RUN apt-get install -y libssl-dev

# installing cron
RUN apt-get update && apt-get install -y cron

RUN apt-get update && apt-get install -y vim

# setup Composer
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

RUN a2enmod rewrite

FROM php:7.4-apache as apache


RUN apt-get update && apt-get install -y \
  		libmagickwand-dev --no-install-recommends \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libcurl3-dev \
        curl \
    && pecl install imagick \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-enable imagick \
    && docker-php-ext-install curl

RUN a2enmod rewrite

RUN chown -hR root:root /var/www/html

USER root
RUN echo "root ALL=NOPASSWD: ALL" >> /etc/sudoers

EXPOSE 8081
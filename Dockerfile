FROM php:7.4.6-apache-buster as base

ARG COMPOSER_VERSION=1.8.4
ENV COMPOSER_HOME=/application/.composer
RUN curl -sS https://getcomposer.org/installer | php -- --version=${COMPOSER_VERSION} --install-dir=/usr/local/bin --filename=composer

RUN apt-get update -y \
    && apt-get install -y --no-install-recommends \
        wget \
        git \
        zip \
        unzip \
        libxml2-dev \
        libicu-dev \
        openssl \
        libonig-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install mbstring\
        opcache \
        bcmath \
        pdo \
        mysqli \
        pdo_mysql \
        intl \
        fileinfo \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html
COPY . /var/www/html
COPY apache-conf.conf /etc/apache2/sites-available/000-default.conf
RUN composer install
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html/storage
RUN a2enmod rewrite
RUN rm /bin/sh && ln -s /bin/bash /bin/sh
CMD sed -i "s/80/$PORT/g" /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf && docker-php-entrypoint apache2-foreground

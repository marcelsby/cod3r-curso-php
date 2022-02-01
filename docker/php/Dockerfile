FROM php:8.1.2-apache

RUN a2enmod rewrite

RUN apt update

RUN apt install -y locales libicu-dev

RUN mkdir /var/www/src

RUN sed -i '/pt_BR.UTF-8/s/^# //g' /etc/locale.gen && \
    locale-gen

RUN docker-php-ext-configure intl

RUN docker-php-ext-install mysqli pdo_mysql intl

ENV LC_ALL pt_BR.UTF-8

ENV LANG pt_BR.UTF-8

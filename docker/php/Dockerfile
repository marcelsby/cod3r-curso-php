FROM php:8.0.12-apache

RUN a2enmod rewrite

RUN apt update

RUN apt install -y locales

RUN mkdir /var/www/src

RUN docker-php-ext-install mysqli pdo_mysql

RUN sed -i '/pt_BR.UTF-8/s/^# //g' /etc/locale.gen && \
    locale-gen

ENV LC_ALL pt_BR.UTF-8

ENV LANG pt_BR.UTF-8

FROM php:8.0.12-apache

RUN apt update

RUN apt install -y locales 

RUN sed -i '/pt_BR.UTF-8/s/^# //g' /etc/locale.gen && \
    locale-gen

ENV LC_ALL pt_BR.UTF-8

ENV LANG pt_BR.UTF-8

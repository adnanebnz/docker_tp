FROM php:7.4-apache

RUN docker-php-ext-install pdo_mysql

RUN a2enmod rewrite

COPY src/ /var/www/html/

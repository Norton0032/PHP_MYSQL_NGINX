FROM php:7.4-apache
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN docker-php-ext-install mysqli pdo pdo_mysql
EXPOSE 80
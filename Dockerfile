FROM php:8.2-apache
RUN apt-get update && apt-get install -y libpng-dev libonig-dev libxml2-dev zip unzip && docker-php-ext-install pdo_mysql mysqli
RUN a2enmod rewrite
WORKDIR /var/www/html
COPY . /var/www/html/
EXPOSE 80
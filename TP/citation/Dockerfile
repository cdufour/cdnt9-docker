FROM php:7.4.14-apache

# ajout de PDO (client mysql)
RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /var/www/html

COPY ./app ./

#CMD ["apache2-foreground"]
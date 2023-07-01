FROM php:8.2-apache

EXPOSE 80

RUN docker-php-ext-install mysqli

COPY . /var/www/html/

RUN php migrate.php

CMD ["apache2-foreground"]
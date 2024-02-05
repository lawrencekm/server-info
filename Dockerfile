FROM php:8.2-apache
COPY . /var/www/html/
CMD [ "php", "./index.php" ]
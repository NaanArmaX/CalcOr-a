FROM php:8.2-apache

# Copia o frontend (HTML, CSS, JS) para o diretório público do Apache
COPY Frontend/ /var/www/html/

# Copia o backend PHP para a pasta /api para acessar via URL /api/
COPY Backend/ /var/www/html/api/

RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN echo "DirectoryIndex index.html index.php" > /etc/apache2/conf-available/docker-php.conf
RUN a2enconf docker-php

EXPOSE 80

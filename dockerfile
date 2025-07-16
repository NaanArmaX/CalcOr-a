FROM php:8.2-apache

# Copia apenas o conteúdo da pasta back (onde está o index.php) para o Apache
COPY back/ /var/www/html/

RUN docker-php-ext-install mysqli pdo pdo_mysql

# Garante que o Apache reconheça index.php como página inicial
RUN echo "DirectoryIndex index.php index.html" > /etc/apache2/conf-available/docker-php.conf
RUN a2enconf docker-php

EXPOSE 80

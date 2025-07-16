FROM php:8.2-apache

# Copia o frontend (HTML) para a raiz pública
COPY front/ /var/www/html/

# Copia o backend (PHP) para uma subpasta acessível, como /api
COPY back/ /var/www/html/api/

RUN docker-php-ext-install mysqli pdo pdo_mysql

# Garante que index.html carregue
RUN echo "DirectoryIndex index.html index.php" > /etc/apache2/conf-available/docker-php.conf
RUN a2enconf docker-php

EXPOSE 80

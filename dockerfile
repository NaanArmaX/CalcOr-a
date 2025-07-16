FROM php:8.2-apache

# Copia os arquivos do seu projeto para o diretório público do Apache
COPY . /var/www/html/
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Expõe a porta padrão
EXPOSE 80

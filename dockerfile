FROM php:8.2-apache

# Copia o frontend (HTML, CSS, JS) para o diretório público do Apache
COPY Frontend/ /var/www/html/

# Copia o backend PHP para a pasta /api para acessar via URL /api/
COPY Backend/ /var/www/html/api/

# Instala extensões necessárias para MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Define index.html ou index.php como arquivos padrão do Apache
RUN echo "DirectoryIndex index.html index.php" >> /etc/apache2/apache2.conf

# Evita aviso de ServerName nos logs
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

EXPOSE 80

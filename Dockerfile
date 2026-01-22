# Imagem PHP com Apache
FROM php:8.2-apache

# Instalar extensões do Laravel
RUN apt-get update && apt-get install -y \
    libonig-dev \
    libzip-dev \
    unzip \
    git \
    && docker-php-ext-install pdo_mysql mbstring zip

# Habilitar mod_rewrite do Apache
RUN a2enmod rewrite

# Definir diretório de trabalho
WORKDIR /var/www/html

# Copiar todo o projeto para dentro do container
COPY . .

# Dar permissão às pastas storage e bootstrap/cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expor porta padrão
EXPOSE 8080

# Comando para rodar o Apache
CMD ["apache2-foreground"]

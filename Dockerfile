# Utilizando PHP 8.2 con Apache como base
FROM php:8.2-apache

# Instalación de dependencias necesarias únicamente para el driver de MySQL
RUN apt-get update && apt-get install -y \
    && docker-php-ext-install pdo_mysql

# Habilitar mod_rewrite para Apache
RUN a2enmod rewrite
FROM php:apache

# Instalar las dependencias necesarias para la extensión de MySQL
RUN apt-get update && apt-get install -y \
    libmariadb-dev \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

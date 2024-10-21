# Usa una imagen oficial de PHP con Alpine como base
FROM php:8.3-cli-alpine

# Actualización básica e instalación de dependencias
RUN apk update && \
    apk add --no-cache \
    dcron openssl bash curl git icu-dev libzip-dev zlib-dev libpng-dev

# Instala el instalador de extensiones PHP
RUN curl -sSLf \
        -o /usr/local/bin/install-php-extensions \
        https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions && \
    chmod +x /usr/local/bin/install-php-extensions

# Instalación de extensiones PHP
RUN install-php-extensions mongodb
RUN install-php-extensions gettext iconv intl tidy zip sockets
RUN install-php-extensions pgsql mysqli
RUN install-php-extensions pdo_mysql pdo_pgsql
RUN install-php-extensions xdebug
RUN install-php-extensions redis
RUN install-php-extensions @composer

# Exponer el puerto 80
EXPOSE 80

# Copiar archivo de configuración php.ini
COPY php.ini /usr/local/etc/php/

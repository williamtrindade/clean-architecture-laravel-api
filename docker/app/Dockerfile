# Usa uma imagem PHP-FPM como base
FROM php:8.2-fpm-alpine

# Instala as dependências do sistema
RUN apk update

RUN apk add \
    --no-cache \
    git \
    unzip \
    libxml2-dev \
    oniguruma-dev \
    libpq \
    libpq-dev \
    linux-headers

# Instala as extensões do PHP
RUN docker-php-ext-install  \
    pdo \
    pdo_pgsql \
    exif \
    mbstring \
    bcmath \
    opcache

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Define o diretório de trabalho
WORKDIR /var/www/html

# Expor a porta do PHP-FPM
EXPOSE 9000

# Comando padrão para iniciar o PHP-FPM
CMD ["php-fpm"]

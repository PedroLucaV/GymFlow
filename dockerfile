# Usa a imagem oficial do PHP 8.2 com FPM
FROM php:8.2-fpm

# Define o diretório de trabalho
WORKDIR /var/www

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    zip \
    unzip

# Limpa o cache do apt
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Instala extensões PHP necessárias
RUN docker-php-ext-install pdo pdo_pgsql pgsql mbstring exif pcntl bcmath gd

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Define o usuário e grupo com mesmo ID do host
ARG UID=1000
ARG GID=1000

RUN usermod -u $UID www-data && groupmod -g $GID www-data

# Copia os arquivos do projeto
COPY . /var/www

# Instala dependências do Composer
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Define permissões
RUN chown -R www-data:www-data /var/www

# Expõe a porta 9000 para o PHP-FPM
EXPOSE 9000

# Comando para iniciar o PHP-FPM
CMD ["php-fpm"]
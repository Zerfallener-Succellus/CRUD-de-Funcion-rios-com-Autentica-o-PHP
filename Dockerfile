# --- Estágio 1: Build do Front-end (Node.js) ---
# Usamos uma imagem Node como um "construtor" temporário
FROM node:18 as node_builder

WORKDIR /app

# Copia os arquivos de dependência e instala
COPY package.json package-lock.json ./
RUN npm install

# Copia o restante dos arquivos do projeto
COPY . .

# Compila os assets para produção
RUN npm run build


# --- Estágio 2: Build da Aplicação Final (PHP) ---
# Começamos de novo com a imagem do PHP
FROM php:8.1-fpm

# Instala extensões PHP comuns para Laravel (mesmo de antes)
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libonig-dev \
    libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copia as dependências do PHP (sem precisar rodar composer install aqui)
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
COPY . .
RUN composer install --no-dev --optimize-autoloader

# --- A MÁGICA ACONTECE AQUI ---
# Copia APENAS os assets compilados do estágio 'node_builder'
COPY --from=node_builder /app/public/build /var/www/html/public/build

# Ajusta permissões das pastas do Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]

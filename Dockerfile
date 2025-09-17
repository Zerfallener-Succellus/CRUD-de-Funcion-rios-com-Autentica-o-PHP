# --- Estágio 1: Build do Front-end (Node.js) ---
# Usamos uma imagem Node como um "construtor" temporário. O alias 'node_builder' é a chave.
FROM node:18 as node_builder

WORKDIR /app

# 1. Copia PRIMEIRO apenas os arquivos de manifesto.
#    Isso aproveita o cache do Docker. O 'npm install' só roda de novo se estes arquivos mudarem.
COPY package.json package-lock.json ./

# 2. Instala as dependências
RUN npm install

# 3. Copia o restante dos arquivos do código-fonte.
#    (Lembre-se da dica do .dockerignore para otimizar isso)
COPY . .

# 4. Compila os assets para produção.
RUN npm run build


# --- Estágio 2: Build da Aplicação Final (PHP) ---
# Começamos com a imagem limpa do PHP-FPM.
FROM php:8.1-fpm

# Define o WORKDIR logo no início.
WORKDIR /var/www/html

# Instala dependências do sistema e extensões PHP em um único RUN para otimizar as layers.
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
    # Instala as extensões do PHP
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip \
    # Limpa o cache do apt para reduzir o tamanho da imagem.
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Instala o Composer a partir da imagem oficial, é a forma mais segura e recomendada.
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# [OTIMIZAÇÃO] Copia PRIMEIRO os arquivos do Composer para cache.
COPY composer.json composer.lock ./

# ETAPA 1: Instala as dependências SEM EXECUTAR SCRIPTS para evitar o erro do 'artisan'.
RUN composer install --no-interaction --no-dev --optimize-autoloader --no-scripts

# ETAPA 2: AGORA copia o restante do código da aplicação (incluindo o arquivo 'artisan').
COPY . .

# ETAPA 3: Executa a geração do autoloader e os scripts do Laravel, agora que o código existe.
RUN composer dump-autoload --optimize --no-dev

# Copia APENAS os assets compilados do estágio 'node_builder'.
COPY --from=node_builder /app/public/build /var/www/html/public/build

# Ajusta permissões das pastas do Laravel em uma única camada.
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache && \
    chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Expondo a porta padrão do PHP-FPM.
EXPOSE 9000

# Comando padrão para iniciar o serviço.
CMD ["php-fpm"]
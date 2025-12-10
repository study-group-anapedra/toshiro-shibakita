<<<<<<< HEAD
FROM nginx
COPY nginx.conf /etc/nginx/nginx.conf
=======
# Dockerfile CORRIGIDO
FROM php:8.2-apache

# Instala as bibliotecas de sistema (libpq-dev)
# e as extensões PHP 'pgsql' (para pg_connect) e 'pdo_pgsql'
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install pgsql pdo_pgsql
>>>>>>> 834e4dc (feat: Configuração final do ambiente Docker Compose. Correção do Load Balancing Nginx, inclusão da extensão PHP pgsql e ajuste da sintaxe da query no index.php.)

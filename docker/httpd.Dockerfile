FROM php:8.2-apache

# Copia VirtualHost do Apache
COPY httpd/miniframework.conf /etc/apache2/sites-available/miniframework.conf

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Instala dependências e extensões PHP corretamente
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    unzip \
    libxml2-dev \
    libcurl4-openssl-dev \
    libonig-dev \
    && docker-php-ext-install -j$(nproc) \
    pdo \
    pdo_pgsql \
    pdo_mysql \
    mbstring \
    curl \
    xml \
    zip \
    && a2enmod rewrite \
    && a2ensite miniframework.conf \
    && a2dissite 000-default.conf \
    && rm -rf /var/lib/apt/lists/*

# Porta HTTP
EXPOSE 80

CMD ["apache2ctl", "-D", "FOREGROUND"]
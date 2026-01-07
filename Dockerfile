FROM php:8.2-apache

# 1. Install dependencies sistem
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo_mysql gd

# 2. Aktifkan Apache Rewrite untuk Laravel
RUN a2enmod rewrite

# 3. Set working directory
WORKDIR /var/www/html

# 4. Copy semua file proyek
COPY . .

# 5. Install Composer secara otomatis
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader

# 6. Atur izin folder (Penting agar tidak error 500)
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 7. Arahkan Apache ke folder public Laravel
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

EXPOSE 80
# Gunakan image PHP 8.2 dengan Apache
FROM php:8.2-apache

# 1. Install extension yang dibutuhkan Laravel & MySQL
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo_mysql gd

# 2. Aktifkan Apache Rewrite (Wajib untuk Laravel)
RUN a2enmod rewrite

# 3. Set lokasi project
WORKDIR /var/www/html

# 4. Copy semua file project kamu
COPY . .

# 5. Install Composer dan jalankan install
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader --no-scripts

# 6. Beri izin akses ke folder storage (PENTING)
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# 7. Arahkan Apache ke folder /public
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

EXPOSE 80
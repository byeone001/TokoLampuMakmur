# 1. Gunakan PHP 8.4 agar cocok dengan Symfony 8.0 & Carbon 3.11
FROM php:8.4-apache

# 2. Install dependencies sistem & ekstensi PHP yang diminta (termasuk libzip)
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo_mysql gd zip

# 3. Aktifkan Apache Rewrite
RUN a2enmod rewrite

# 4. Set working directory
WORKDIR /var/www/html

# 5. Copy semua file proyek
COPY . .

# 6. Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# 7. Jalankan Composer Install dengan mengabaikan pengecekan platform agar lebih aman
RUN composer install --no-dev --optimize-autoloader --no-scripts --ignore-platform-reqs

# 8. Atur izin folder agar tidak error permission
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# 9. Arahkan Apache ke folder public
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

EXPOSE 80
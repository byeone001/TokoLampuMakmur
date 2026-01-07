FROM php:8.2-apache
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip unzipper
RUN docker-php-ext-install pdo_mysql gd
COPY . /var/www/html
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN cd /var/www/html && composer install --no-dev
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf
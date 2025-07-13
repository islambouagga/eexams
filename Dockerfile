FROM php:7.1-apache

# Enable required Apache modules
RUN a2enmod rewrite

# Install PHP extensions
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git curl \
    && docker-php-ext-install pdo pdo_mysql mbstring zip

# Set working directory
WORKDIR /var/www

# Copy project
COPY . /var/www

# Point Apache to the Laravel public directory
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/public|' /etc/apache2/sites-available/000-default.conf

# Give permissions
RUN chown -R www-data:www-data /var/www

EXPOSE 80

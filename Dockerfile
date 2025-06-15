# Use the official PHP 8.1 image with Apache
FROM php:8.1-apache

# Install system dependencies and required PHP extensions
RUN apt-get update && apt-get install -y \
    libicu-dev \
    libzip-dev \
    zip \
    curl \
    && docker-php-ext-install -j$(nproc) intl pdo pdo_mysql zip curl

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set the working directory
WORKDIR /var/www/html

# Copy application source code
COPY . .

# Install Composer dependencies
RUN composer install --no-dev --optimize-autoloader

# Set permissions for the writable directory
RUN chown -R www-data:www-data /var/www/html/writable

# Configure Apache to serve from the "public" directory and on port 8080
COPY docker/000-default.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite
RUN sed -i 's/80/8080/g' /etc/apache2/ports.conf

# Expose port 8080 to Cloud Run
EXPOSE 8080

# Start Apache
CMD ["apache2-foreground"]
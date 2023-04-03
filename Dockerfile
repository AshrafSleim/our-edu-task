# Use the official PHP 8.2-fpm base image with Nginx
FROM php:8.2-fpm

# Install Nginx and other dependencies
RUN apt-get update && apt-get install -y \
    nginx \
    libzip-dev \
    zip \
    unzip

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Copy the Laravel application code to the container
COPY . /var/www/html

# Install Laravel dependencies
RUN composer install --no-interaction

# Set the correct permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Remove the default Nginx configuration file
RUN rm  -rf /etc/nginx/conf.d/default.conf

# Copy the Nginx configuration file
COPY nginx.conf /etc/nginx/conf.d

# Expose port 80
EXPOSE 80

# Start Nginx and PHP-FPM
CMD service nginx start && php-fpm
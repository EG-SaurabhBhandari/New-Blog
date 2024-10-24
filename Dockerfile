# Use the official PHP image with the necessary extensions
FROM php:8.2.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    git \
    && docker-php-ext-install zip

# Set the working directory
WORKDIR /var/www

# Copy the existing application directory
COPY . .

# Expose the port for PHP-FPM
EXPOSE 9000

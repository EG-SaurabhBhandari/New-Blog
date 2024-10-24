# Step 1: Use an official PHP image as the base image
FROM php:8.2-fpm

# Step 2: Set the working directory inside the container
WORKDIR /var/www

# Step 3: Install system dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

# Step 4: Install PHP extensions needed by Laravel
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install gd

# Step 5: Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Step 6: Copy the current directory contents into the container
COPY . /var/www

# Step 7: Change permissions for the 'storage' and 'bootstrap/cache' directories
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Step 8: Expose port 9000 and start PHP-FPM
EXPOSE 9000
CMD ["php-fpm"]

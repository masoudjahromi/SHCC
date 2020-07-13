FROM php:7.2-fpm

RUN apt-get update && \
    apt-get install -y --no-install-recommends \
        libmemcached-dev \
        libz-dev \
        libpq-dev \
        libjpeg-dev \
        libpng-dev \
        libfreetype6-dev \
        libssl-dev \
        libmcrypt-dev \
        libmagickwand-dev \
        libxml2-dev

# Install soap extention
RUN docker-php-ext-install soap

#####################################
# GD:
#####################################

# Install the PHP gd library
RUN docker-php-ext-install gd && \
    docker-php-ext-configure gd \
        --with-jpeg-dir=/usr/lib \
        --with-freetype-dir=/usr/include/freetype2 && \
    docker-php-ext-install gd

# Install the PHP exif extention
RUN docker-php-ext-install exif

# Install the PHP mcrypt extention
RUN pecl install mcrypt-1.0.1
RUN docker-php-ext-enable mcrypt

# Install the PHP pcntl extention
RUN docker-php-ext-install pcntl

# Install the PHP zip extention
RUN docker-php-ext-install zip

# Install the PHP pdo_mysql extention
RUN docker-php-ext-install pdo_mysql

# Install the PHP bcmath extension
RUN docker-php-ext-install bcmath

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app
COPY . /app
RUN composer install

RUN chown -R www-data:www-data /app

RUN chown -R 775 /app/storage

RUN cp .env.example .env
RUN php artisan key:generate
RUN php artisan config:clear
RUN php artisan cache:clear

CMD php artisan serve --host=0.0.0.0 --port=8080
EXPOSE 8080

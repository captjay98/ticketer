FROM dunglas/frankenphp


RUN apt-get update && apt-get install -y git nodejs npm

RUN install-php-extensions pdo pdo_pgsql pgsql zip exif pcntl gd imagick sockets

WORKDIR /go/src/app/dist/app

COPY . .

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


RUN composer install --no-interaction --optimize-autoloader --no-dev && composer clear-cache
RUN npm install && npm run build && npm cache clean --force
RUN composer dump-autoload --optimize

RUN php artisan cache:clear && php artisan route:cache

ENTRYPOINT ["php", "artisan", "octane:frankenphp"]










































# FROM php:8.2-fpm
# RUN echo "RUNNING!!!!"
# ARG USERNAME=www-data

# WORKDIR /var/www/html/project

# RUN apt-get clean
# RUN apt-get update && \
#     apt-get install -y git libzip-dev unzip nodejs npm libpq-dev && \
#     rm -rf /var/lib/apt/lists/*
# RUN docker-php-ext-install pdo pdo_pgsql pgsql zip exif pcntl


# USER $USERNAME
# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
#     composer install --no-interaction --optimize-autoloader && \
#     composer clear-cache

# RUN npm install && npm run build && npm cache clean --force
# RUN composer dump-autoload --optimize

# USER root

# RUN chown -R ${USERNAME}:${USERNAME} /var/www/html
# COPY --chown=${USERNAME}:${USERNAME} . .
# RUN ln -s /var/www/html/project/storage/app/public /var/www/html/project/public/storage


# RUN php artisan cache:clear
# RUN php artisan config:clear
# RUN php artisan route:clear
# RUN php artisan route:list











# COPY --chown=${USERNAME}:${USERNAME} .env.production .env
# RUN apt-get clean
# RUN apt-get update && \
#     apt-get install -y git libzip-dev unzip nodejs npm libpq-dev && \
#     rm -rf /var/lib/apt/lists/*
# RUN docker-php-ext-install pdo pdo_pgsql pgsql zip exif pcntl

# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
#     composer install --no-interaction --optimize-autoloader && \
#     composer clear-cache

# RUN npm cache clean --force
# USER $USERNAME
# RUN npm install && npm run build && npm cache clean --force
# RUN composer dump-autoload --optimize


# RUN php artisan cache:clear
# RUN php artisan config:clear
# RUN php artisan route:clear
# RUN php artisan route:list


# EXPOSE 80


# CMD [ "/entrypoint.sh" ]


# RUN chmod -R 775 /var/www/html/public/storage/
# RUN chmod -R 775 /var/www/html/ticketer/bootstrap/cache/

# COPY --chown=${USERNAME}:${USERNAME} ./.env.production /var/www/html/project


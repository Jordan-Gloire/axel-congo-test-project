FROM php:8.2-apache

# Définir le répertoire de travail
WORKDIR /var/www/html

# Copie du projet
COPY . /var/www/html

# Droits (à faire après la copie)
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Active mod_rewrite (inutile de le faire deux fois)
RUN a2enmod rewrite

# Installe les extensions PHP nécessaires
RUN docker-php-ext-install pdo pdo_mysql


# Apache conf
COPY ./apache.conf /etc/apache2/sites-available/000-default.conf

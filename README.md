# Laravel + Docker Setup Guide

## ✨ Description

Ce projet utilise Laravel dans un conteneur Docker avec MySQL et phpMyAdmin. Il est destiné à un environnement de développement local.

---

## 📁 Structure Docker

```yaml
docker-compose.yml
Dockerfile
apache.conf
.env
```

---

## 📦 Services Docker

### app (Laravel + Apache)

* Dockerfile personnalisé
* Ports : `8001:80`
* Volume monté pour voir les modifications en direct

### db (MySQL)

* Image : `mysql:8.0`
* Ports : `3307:3306`
* Variables d'environnement configurées
* Volume persisté : `db_data`

### phpmyadmin

* Interface web pour MySQL
* Accessible via `localhost:8080`

---

## ⚙️ Dockerfile (extrait)

```dockerfile
FROM php:8.2-apache

WORKDIR /var/www/html
COPY . /var/www/html

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN a2enmod rewrite
RUN docker-php-ext-install pdo pdo_mysql

COPY ./apache.conf /etc/apache2/sites-available/000-default.conf
```

---

## ✉️ .env (extrait)

```env
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=demo
DB_USERNAME=user
DB_PASSWORD=password
SESSION_DRIVER=file
```

> **Attention** : DB\_HOST doit être le nom du service `db`, pas `127.0.0.1`

---

## ⚖️ Permissions Laravel

> Laravel exige que certains dossiers soient accessibles en écriture.

```bash
chmod -R 777 storage bootstrap/cache
```

> ❌ Pas sécurisé en production — ✅ valable en local

Dockerfile corrige ça avec :

```dockerfile
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
```

---

## 📈 Migrations

Pour créer les tables :

```bash
php artisan migrate
```

Pour les réinitialiser (avec seeders) :

```bash
php artisan migrate:fresh --seed
```

---

## ✔️ Bonnes pratiques

* Ne jamais utiliser `127.0.0.1` pour DB dans Docker, toujours le nom du service (`db`)
* Faire un `php artisan config:clear` après modification de `.env`
* Utiliser `SESSION_DRIVER=file` en développement pour éviter les problèmes de session
* Utiliser phpMyAdmin via `localhost:8080` pour vérifier les tables

---

## 🎉 App Fonctionnelle

* Laravel fonctionne sur `http://localhost:8001`
* phpMyAdmin sur `http://localhost:8080`
* CRUD 100% opérationnel
* Base de données persistée via `volumes`

---

## 📊 Astuce finale

Pour accéder à MySQL depuis un outil externe :

* Host : `127.0.0.1`
* Port : `3307`
* User : `user`
* Password : `password`
* Database : `demo`

---

Félicitations pour ton setup ! 🌟

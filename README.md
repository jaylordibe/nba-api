# THE NBA API #

This README would normally document whatever steps are necessary to get your application up and running.

### What is this repository for? ###

* Quick summary
    * This repository is the NBA API.
* Version
    * v1.0

### How do I get set up? ###

* Create `.env` file in project root directory

* Copy the content from `.env.example` to `.env` and change the database configuration for your local dev environment

* Create database
```
CREATE DATABASE nba_development CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
```

* Run the application
```
php artisan serve
```

* Dependencies
    * [PHP 8](https://www.php.net)
    * [MySQL 8](https://dev.mysql.com/downloads/mysql/8.0.html)

* How to run tests
```
php artisan test
```
### Contribution guidelines ###

* Writing tests
* Code review
* Other guidelines

### Who do I talk to? ###

* Repo owner or admin
* Other community or team contact

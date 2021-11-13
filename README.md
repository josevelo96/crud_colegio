
# CRUD Colegio

## Environment

PHP version 7.4 <br>
Database Manager: MySQL 5.7+

## Run the following commands to install dependencies

```
composer install
```

## Configure the database

Create a new database in your MySQL server <br> 
_(Character set **utfmb4** collate **utf8mb4_unicode_ci**)_

Change the values of the following variables in your **.env** file
```
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```


## Run migrations and seeders

Create database structure/tables
```
php artisan migrate
```

Fill the tables with mock data
```
php artisan db:seed
```
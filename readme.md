# IREMA

##Incident Record Manager

This is a little incident tracking application.
It is designed to be easy to use and track all necessary information about the all workflow and solution for each incident.
The code has been developed using laravel 5 and Doctrine 2 for Laravel.
The objective is to cover all steps to track any issues and incidents from the different applications and help the production
support team to keep a track of the resolution.
In future versions of the application, it is intended to use the tracked information from previous incidents to provide automatic resolution information.

###Installation and configuration

1. Run 
```
git clone https://github.com/GustavoZ77/IREMA.git
```
2. Move to IREMA folder
3. Run
```
php composer.phar install
```
4. Generate proxy object running
```
php artisan doctrine:generate:proxies
```
5. Connect to your mariadb database and create an empty database
```
create database [DATABASE_NAME];
```
6. Create the tables needed by the application with the following command
```
cat app/script/script.sql | mariadb -u [USER_NAME] -p [DATABASE_NAME]
```

###References:
https://laravel.com/docs/5.1
http://www.laraveldoctrine.org/


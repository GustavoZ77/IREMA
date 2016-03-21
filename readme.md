# IREMA

##Incident Record Manager

This is a little incident tracking application.
It is designed to be easy to use and track all necessary information about the all workflow and solution for each incident.
The code has been developed using laravel 5 and Doctrine 2 for Laravel.
The objective is to cover all steps to track any issues and incidents from the different applications and help the production
support team to keep a track of the resolution.
In future versions of the application, it is intended to use the tracked information from previous incidents to provide automatic resolution information.

###Installation and configuration

1. Run `git clone https://github.com/GustavoZ77/IREMA.git`
2. Move to IREMA folder `cd IREMA`
3. Run `php composer.phar install`
4. Connect to your mariadb database and create an empty database `create database [DATABASE_NAME];`
5. Configure your database connection, set database user name, password and database name in the file `config/database.php`
6. Generate proxy object running `php artisan doctrine:generate:proxies`
7. Create the tables needed by the application with the following command `cat app/script/script.sql | mysql -u [USER_NAME] -p [DATABASE_NAME]`
8. Edit the file `config/app.php` replace the value of the element `key` with a random string 32 characters long
8. Run `php -S localhost:8000 -t public` to test the application
    * Default user
        admin@admin.com
    * Default password
        1234

###References:
* https://laravel.com/docs/5.1
* http://www.laraveldoctrine.org/


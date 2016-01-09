# IREMA
Incident Record Manager

Is an little application to register a incidents and issues in another applications.
is oriented for to be easy and give all necessary information about the all workflow and solution for each incident.
has been developed using laravel 5 and Doctrine 2 for Laravel.
The objective is reach to cover all steps for attend any issues and incidents into the differentes applications and help to the production
support team for register and monitoring resolution into the application.
in the next versions the application will use the generated information for provide automatic resolutions.

Installation and configuration

a) Preparing the environment

1- Install laravel version https://laravel.com/docs/5.1
2- Execute composer update
3- Create a new laravel project for IREMA   
4- git clone https://github.com/GustavoZ77/IREMA.git temp
5- replace the composer.json for of the into temp
6- execute composer install and composer update comand
7- please move config/app.php to config directory and replace config/app.php

c) Copying the last files

1- please move all files into temp/app and .git to IREMA directory
2- please move all resources directory and replace into IREMA directory
3- please move assests directory to public directory 

b) Conecting to database

1- please move config/auth.php to config directory and replace config.php
2- generate proxy object php artisan doctrine:generate:proxies
3- into script folder is the db script, please import into your mysql db

references:
https://laravel.com/docs/5.1
http://www.laraveldoctrine.org/
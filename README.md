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

.- Install laravel version https://laravel.com/docs/master
.- Create a new laravel project for IREMA   
.- git clone https://github.com/GustavoZ77/IREMA.git temp
.- replace the composer.json for of the into temp
.- execute composer install and composer update comand
.- please move app.php to config directory and replace app.php

c) Copying the last files
.- please move all files into temp/app and .git to IREMA directory
.- please move all resources directory and replace into IREMA directory
.- please move assests directory to public directory 

b) Conecting to database
.- please move auth.php to config directory and replace config.php
.- generate proxy object php artisan doctrine:generate:proxies
.- into script folder is the db script, please import into your mysql db
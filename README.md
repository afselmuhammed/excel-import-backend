<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

CSV Import Project using Laravel
This project demonstrates how to import CSV files into a Laravel application using Laravel's built-in functionalities and a sample implementation.

**Steps fro setup project** 

Navigate to Project Directory:

bash
Copy code
cd csv-import-laravel
Install Composer Dependencies:

**composer install**

Set Up Environment Variables:

**Rename .env.example to .env.**

Configure your database settings in the .env file.

Generate Application Key:
**php artisan key:generate**


Run Migrations:
**php artisan migrate**

Start Development Server:
**php artisan serve**

Usage
Upload CSV File:

Navigate to the application registration page and register as an user.
Login as user 
Use the file upload button to select and upload a CSV file.
Import Data:

Once the file is uploaded, the application will validate and import the CSV data into the database.
Check the import status and any errors encountered during the process.
Example CSV File Format added with file


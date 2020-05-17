<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

# Laravel Sample

This is a sample laravel project for learning.
Laravel Framework : version 6.18.10

## Getting Started
---

## Installation

 Please check the Laravel installation guide for server requirements before start.[Laravel documentation](https://laravel.com/docs)

Clone repository
>> git clone https://github.com/zarniwin/laravelsample.git

Install all the dependencies using composer
>> composer install

Install all the dependencies using node
>> npm install
>> npm run dev

Copy the example env file and make the required configuration changes in the .env file
>> cp .env.example .env

Generate a new application key
>> php artisan key:generate

Run the database migrations

>> php artisan migrate

Start The local development server
>> php artisan serve

## Database Seeding

There are some seeder files for learning.This can help you to quickly start to test this sample project.

Run the database seeder
>> php artisan db:seed

*Note* It's recommended to have a clean database before seeding. You can refresh your migrations at any point to clean the database by running the following command

>> php artisan migrate:refresh

---

# Code Overview

## Dependencies

   - Spatie - For roles permissions


## Main Featues

   1.Routing
   2.Middleware
   3.Role & Permission
   4.Migrations
   5.Seeding
   6.CRUD

## Environment variables
   - .env - Environment variables can be set in this file

*Note* You can quickly set the database information and other variables in this file and have the application fully working.For this project set page_limit eg.page_limit=20 for pagination in .env file

---

## Testing the Project

Run the laravel development server
>> php artisan serve

You can now access the server at http://localhost:8000

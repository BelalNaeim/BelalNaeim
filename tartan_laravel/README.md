<p align="center"><a href="https://tartan.om/" target="_blank"><img src="https://tartan.om/img/logo.png" width="400"></a></p>

Backend Made by [AQuadic](https://aquadic.com)

----------

# Getting started

## Important Links

- [AQuadic](https://aquadic.com)
- [Live Site](https://tartan.om/)

## Script Requirement

This script assumes you have the requirement as the following:

- PHP Version: `^8.0`
- working mailing service with unlimited mails. so we can use it in verify mails and forget passwords.
- MySQL 5.7 or higher is required
- check spatie media library [requirements.](https://spatie.be/docs/laravel-medialibrary/v9/requirements)
- Queue pipeline like redis or stick with `sync`

## Installation

Please check the official laravel installation guide for server requirements before you
start. [Official Documentation](https://laravel.com/docs/8.x/installation#installation)

Clone the repository

    git clone https://github.com/AQuadic/tartan_laravel.git

Switch to the repo folder

    cd tartan_laravel

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate:fresh

Link storage media to public folder, this is needed for spatie laravel package.

    php artisan storage:link

Start the local development server for local development

    php artisan serve

You can now access the server at http://localhost:8000

Run the database seeder, and you're done.

    php artisan db:seed

## Environment variables

- `.env` - Environment variables can be set in this file

- `APP_NAME` - this should be Sonpola or the app name, we use this in emails and others.
- `APP_ENV` - 'production' or else testing endpoints will still accessible.
- `APP_DEBUG` - 'false' or else testing endpoints will still accessible.
- `APP_URL` - your backend app url, need for generating links and internal usage.
- `LOG_CHANNEL` - I prefer it to be daily, but you can stick with 'stack' for single file.
- `DB_CONNECTION` - this should be mysql only
- `DB_HOST`, to `DB_PASSWORD` setup those.
- `MAIL_MAILER` to `MAIL_FROM_NAME` - those are your email provider credentials.
- `FIREBASE_CREDENTIALS` - path to firebase.json file,

----------

## Made with ♥ By

<p align="center"><a href="https://AQuadic.com" target="_blank"><img src="https://AQuadic.com/img/logo.svg" width="200"></a></p>

# Shkolo dashboard

 Customizable web dashboard

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Installing

- Rename `.env.example` to `.env` and set your database connection and details.
- `composer install`
- `php artisan key:generate`
- `php artisan jwt:secret`
- `php artisan migrate`
- `npm install`
- `npm run dev`
- `php artisan serve`

## Built With

* [Laravel 8.x](https://laravel.com/docs/8.x) - The web framework used
* [Composer](https://getcomposer.org/) - Dependency Manager for PHP
* [npm](https://www.npmjs.com/) - JavaScript package manager

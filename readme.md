## About project

- Laravel Version: 5.1.46 (LTS)
- PHP Version: 7.4.14
- Composer version 2.2.9

## Description

Web-application that generates short url using str_random() function and saves it in DB. This functionality is implemented in specified service called UrlService that uses Adapter pattern to build and return custom set of data that will be saved in DB.

## Installation

- get the latest version from git repo
- create .env file to describe connection to DB
- in project directory `composer install`
- `php artisan key:generate`
- `php artisan migrate`
- `php artisan serve`

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)

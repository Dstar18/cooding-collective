<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Technical Test Backend Engineer
Technical Test Backend Engineer Laravel, Use PHP Laravel to make the employee attendance web application and use postgreSQL to make the database.

Project Demo: <a href="http://publichost.my.id:8123"></a>

Feature:
- Basic Auth Login API and encrypt like base64
- Login and logout User
- Employee (Read, Create, Update (active/inactive))
- User update (active/inactive)

## Instalation
```sh
git clone https://github.com/Dstar18/cooding-collective.git
```
```sh
cd cooding-collective
```
```sh
composer install
```
```sh
php artisan key:generate
```
```sh
cp .env-example .env
```
```sh
php artisan migrate
```
```sh
php artisan db:seed
```

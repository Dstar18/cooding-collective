<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Technical Test Backend Engineer
Technical Test Backend Engineer Laravel, Use PHP Laravel to make the employee attendance web application and use postgreSQL to make the database.

Project Demo: http://publichost.my.id:8123

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

## Endpoint For Demo
- Auth Login with account employee
- Login and logout user with account employee

Example account employee:
```sh
username/email : Jokoterdepan@gmail.com
password : changeme
```
**#Create Token CSRF**
- Method: GET
- URL: http://publichost.my.id:8123/token-csrf

Authentication:
- Type: Basic Auth
- Login: Not Required

Body:
```sh
No body required for this request
```

**#Login User**
- Method: POST
- URL: http://publichost.my.id:8123/auth

Authentication:
- Type: Basic Auth
- Login: Not Required

Body:
```sh
{
    "_token" : {input_token},
    "email" : "Jokoterdepan@gmail.com",
    "password" : "changeme"
}
```

**#Logout User**
- Method: GET
- URL: http://publichost.my.id:8123/logout

Authentication:
- Type: Basic Auth
- Login: Not Required

Body:
```sh
No body required for this request
```

**#Employee / {id}**
- Method: GET
- URL: http://publichost.my.id:8123/employee
- URL: http://publichost.my.id:8123/employee/{id}

Authentication:
- Type: Basic Auth
- Login: Required

Body:
```sh
No body required for this request
```

**#Employee Create**
- Method: POST
- URL: http://publichost.my.id:8123/employee/store

Authentication:
- Type: Basic Auth
- Login: Required

Body:
```sh
{
    "_token" : {input_token},
    "name": "Fitrii",
    "dob": "2000-10-10",
    "city": "Jogja",
    "email": "fitri11@gmail.com",
    "password" : "changeme",
    "created_at": "2024-12-17 12:32:26"
}
```

**#Employee Update**
- Method: POST
- URL: http://publichost.my.id:8123/employee/update/{id}

Authentication:
- Type: Basic Auth
- Login: Required

Body:
```sh
{
    "_token" : {input_token},
    "name": "Fitrii 123",
    "dob": "2000-10-10",
    "city": "Sleman",
    "email": "fitri11@gmail.com",
    "updated_at": "2024-12-120 12:32:26",
    "status": "active"
}
```

**#User Update**
- Method: POST
- URL: http://publichost.my.id:8123/user-account/update/{id}

Authentication:
- Type: Basic Auth
- Login: Required

Body:
```sh
{
    "_token" : {input_token},
    "status": "inactive"
} 
```

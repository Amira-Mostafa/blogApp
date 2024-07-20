# blogApp

simple blog application built using php/laravel and Javascript along side a simple UI using Html/Css/bootstrap

## Table of Contents

- [Requirements](#requirements)
- [Setup Instructions](#setup-instructions)
- [Running the Application](#running-the-application)
- [Database Setup](#database-setup)
- [Testing](#testing)
- [Contributing](#contributing)
- [License](#license)

## Requirements

- PHP 7.4 or higher
- Composer
- MySQL or MariaDB
- Node.js and NPM (for frontend assets)

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Setup Instructions

Follow these steps to set up and configure the application.

1. Clone the Repository

```bash
git clone https://github.com/Amira-Mostafa/blogApp.git
```

2. Install PHP Dependencies

```bash
composer install
```

3. Install Node.js Dependencies

```bash
npm install
```

3. Create and Configure the .env File

Copy the .env.example file to .env:

```bash
cp .env.example .env
```

Open the .env file and configure the database and other environment variables.

5. Generate the Application Key

```bash
php artisan key:generate
```

## Running the Application

1. Run Migrations

```bash
Copy code
php artisan migrate
```

2. Seed the Database

```bash
php artisan db:seed
```

3. Compile Frontend Assets

```bash
npm run dev
```
4. Start the Development Server

The application will be available at http://localhost:8000.

```bash
php artisan serve
```

## Database Setup

1. Create a Database

Create a new database in your MySQL or MariaDB server.

2. Configure .env

Update your .env file with the database credentials:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog_application 
DB_USERNAME=root
DB_PASSWORD=
```

and application name


```bash
APP_NAME=blogApp
```

3. Run Migrations and Seeders


```bash
php artisan migrate
php artisan db:seed
```


## Testing
To run tests :

```bash
php artisan test
```

## Contributing
Fork the repository.
Create a feature branch (git checkout -b feature/your-feature).
Commit your changes (git commit -am 'Add new feature').
Push to the branch (git push origin feature/your-feature).
Create a new Pull Request.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.





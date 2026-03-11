EasyColoc

EasyColoc is a web application for managing shared expenses between roommates.
It is inspired by Tricount and allows users to track expenses, split costs, and calculate balances between participants in a shared housing environment.

The application simplifies expense tracking by automatically calculating who owes money to whom.

Features

Create shared expense groups

Add participants to groups

Record expenses

Split expenses between selected participants

Automatic balance calculation

View simplified debts between roommates

Responsive interface

Screenshots
Dashboard

Displays the list of expenses and current balances.

Add Expense

Form used to create a new expense and assign participants.

Balance Summary

Shows simplified debts between participants.

Tech Stack

Backend

PHP

Laravel

Frontend

Blade Templates

Laravel Mix / Vite

Bootstrap or Tailwind CSS

Database

MySQL or PostgreSQL

Architecture

EasyColoc follows a standard Laravel MVC architecture.

Client (Browser)
      |
      | HTTP Request
      v
Laravel Routes
      |
Controllers
      |
Models (Eloquent ORM)
      |
Database

Explanation

Routes define the endpoints of the application.

Controllers contain the business logic.

Models interact with the database using Laravel's Eloquent ORM.

Views (Blade templates) render the user interface.

Project Structure

Typical Laravel project structure used by EasyColoc.

easycoloc
|
├── app
│   ├── Http
│   │   ├── Controllers
│   │   └── Middleware
│   ├── Models
│
├── bootstrap
│
├── config
│
├── database
│   ├── migrations
│   └── seeders
│
├── public
│
├── resources
│   ├── views
│   ├── css
│   └── js
│
├── routes
│   └── web.php
│
├── storage
│
├── tests
│
└── README.md

Important directories

app/Models contains database models such as User, Group, and Expense.

app/Http/Controllers contains controllers that manage application logic.

database/migrations contains database schema definitions.

resources/views contains Blade templates.

routes/web.php defines web routes.

Installation
1 Clone the repository
git clone https://github.com/yourusername/easycoloc.git

Explanation

git clone downloads the entire repository from GitHub to your local machine.

The project will be placed inside a folder named easycoloc.

2 Move into the project directory
cd easycoloc

Explanation

cd means change directory.

This command moves the terminal into the project folder so all following commands run inside it.

3 Install PHP dependencies
composer install

Explanation

composer is the dependency manager used by PHP and Laravel.

install reads the composer.json file and downloads all required packages into the vendor/ directory.

4 Install JavaScript dependencies
npm install

Explanation

npm is the Node.js package manager.

install reads the package.json file and downloads frontend dependencies used for assets and compilation.

5 Create environment configuration
cp .env.example .env

Explanation

.env.example is a template configuration file.

cp copies it into .env, which stores environment variables such as database credentials.

6 Generate application key
php artisan key:generate

Explanation

php artisan runs Laravel's command-line tool.

key:generate creates a unique encryption key and stores it in .env.

Laravel uses this key to encrypt sessions, cookies, and other sensitive data.

7 Configure database

Edit .env and change the database settings:

DB_DATABASE=easycoloc
DB_USERNAME=root
DB_PASSWORD=password

Explanation

These variables tell Laravel how to connect to the database.

8 Run database migrations
php artisan migrate

Explanation

migrate executes all migration files in database/migrations.

Each migration describes a database table structure.

Laravel

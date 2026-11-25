# Pickleball Equipment Inventory Management System

A Laravel 12 MVC application for managing pickleball equipment inventory. The system covers login, equipment CRUD, filtered reports, and PDF/Excel exports. Rentals, sales, court reservations, and player transactions are outside the project scope.

## Requirements
- PHP 8.2 or newer
- Composer 2
- MySQL/MariaDB (XAMPP is supported)
- PHP extensions required by Laravel, including `pdo_mysql`, `mbstring`, `openssl`, `tokenizer`, `xml`, `ctype`, `curl`, `fileinfo`, and `bcmath`

## Installation on Windows / XAMPP
1. Extract the project folder into `C:\xampp\htdocs\pickleball-inventory`.
2. Open Command Prompt and run:

```bat
cd C:\xampp\htdocs\pickleball-inventory
composer install
copy .env.example .env
```

3. Start Apache and MySQL from XAMPP. Open phpMyAdmin and create a database named `pickleball_inventory` using `utf8mb4_unicode_ci`.
4. Open `.env` and confirm the database settings:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pickleball_inventory
DB_USERNAME=root
DB_PASSWORD=
```

5. Run the following commands:

```bat
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

6. Visit `http://127.0.0.1:8000` and sign in.

## Demo administrator account
- Username: `admin`
- Email: `admin@example.com`
- Password: `password`

Change the demo password before deploying or sharing the system. The demo seeder creates one administrator and eight equipment records across paddles, balls, nets, and accessories. Running the seeder again updates the demo records instead of duplicating them.

## Features
- Login using either username or email; logout; authenticated routes.
- Equipment create, view, edit, and delete.
- Fields: equipment name, category, unit price, description, and availability status.
- Server-side validation; non-negative numeric prices; category and status restrictions.
- Each equipment record is linked to the authenticated user. User ID is assigned server-side, not accepted from the form.
- Reports for available and unavailable equipment, category inventory, and equipment price list.
- Combined category and availability filters, plus reset filters.
- PDF and Excel exports preserve the selected filters.
- Empty-state message when no records match.

## Run tests

```bat
php artisan test
```

## GitHub submission
Do not commit `.env`, `vendor/`, or `node_modules/`. The `.env.example`, source code, migrations, seeders, and this README should be committed. Add your own repository URL and screenshots to your submission document after pushing the project.

## Common commands

```bat
php artisan migrate:fresh --seed
php artisan route:list
php artisan optimize:clear
```

`migrate:fresh --seed` deletes existing tables and data before rebuilding; use it only on a development database.

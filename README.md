# Mini CRM Xperts

Mini CRM Xperts is a lightweight admin panel for managing companies and their employees. It focuses on the essentials: authentication, company records, employee records, and a simple API endpoint to retrieve a company with its staff.

## Tech Stack

-   Laravel 12 (PHP)
-   Blade templates + Tailwind CSS (Breeze starter kit)
-   MySQL (or any Laravel-supported database)
-   Vite for assets

## Features (Quick Overview)

-   Admin login with seeded default user
-   Companies CRUD (name, email, logo, website)
-   Employees CRUD (first name, last name, company, email, phone)
-   Logo upload stored in `storage/app/public`
-   Pagination (10 per page)
-   API endpoint for a company with employees and `employee_count`

## Setup

1. Install dependencies

```bash
composer install
npm install
```

2. Environment setup

```bash
cp .env.example .env
php artisan key:generate
```

3. Configure database

-   Update `.env` with your DB credentials

4. Run migrations and seed the admin user

```bash
php artisan migrate --seed
```

Default admin user:

-   Email: `admin@admin.com`
-   Password: `password`

5. Storage symlink for logos

```bash
php artisan storage:link
```

6. Run the app (vite & laravel)

```bash
npm run dev
php artisan serve
```

## API

-   `GET /api/companies/{company_id}`
    -   Returns a company with its employees and `employee_count`
    -   Example path in local: http://127.0.0.1:8000/api/companies/1

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

Screenshot
<img width="1797" height="1129" alt="List of Company Screen with Pagination" src="https://github.com/user-attachments/assets/370b0e4b-43e1-4e9c-bbd9-8bca65d433eb" />
<img width="1797" height="1129" alt="Create new Company Screen " src="https://github.com/user-attachments/assets/92db4f52-b4c4-43fd-889a-5f1ca43c38dd" />
<img width="1797" height="1129" alt="View Company Detail Screen" src="https://github.com/user-attachments/assets/a4b54086-d924-4c0e-bd6e-db9bdb895b4c" />
<img width="1797" height="1129" alt="Company Update details form Screen" src="https://github.com/user-attachments/assets/77a07813-f220-4a5d-b127-fed8912b10f5" />
<img width="1797" height="1129" alt="Company Delete Confirmation Screen" src="https://github.com/user-attachments/assets/1b6540e3-cfa2-4902-afec-6c65f6bcc21b" />

<img width="1797" height="1129" alt="List of Employee with Pagination Screen" src="https://github.com/user-attachments/assets/0a3ab571-ffe9-4ed4-a5ea-6ce26a9bca44" />
<img width="1797" height="1129" alt="Create new Employee Screen" src="https://github.com/user-attachments/assets/6b07101c-beab-4c70-944b-55c516c62339" />
<img width="1797" height="1129" alt="View Employee Screen" src="https://github.com/user-attachments/assets/45d049bb-2c96-47b7-83a7-39f21ad84c41" />
<img width="1797" height="1129" alt="Employee Update detail form Screen" src="https://github.com/user-attachments/assets/78ddc4a5-a9f5-45a3-b125-b922a87ed9e1" />
<img width="1797" height="1129" alt="Employee Delete Confirmation Screen" src="https://github.com/user-attachments/assets/7719bcc4-2391-4ae1-a78f-bd38cd4b62fd" />

<img width="1797" height="1129" alt="API Endpoint Test" src="https://github.com/user-attachments/assets/686d91f1-e277-4c01-a379-e634a3217246" />


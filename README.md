<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
    </a>
</p>

# 🚗 Car Management System

This is a **Car Management System** built using **Laravel**, **Blade**, and **Bootstrap**. It allows users to **create, read, update, and delete (CRUD)** car records efficiently. The project includes a user-friendly interface with real-time validation.

## ✨ Features
- 📝 **CRUD operations** for managing cars.
- 🎨 **Blade templates** for frontend views.
- 🎨 **Bootstrap** for a clean and responsive UI.
- 🛡 **Validation** for form inputs.
- 🔍 **Database migrations** for structured data management.

---

## 📌 Installation Guide

### 1️⃣ Clone this repository
```sh
git clone https://github.com/yourusername/car-management.git
cd car-management

2️⃣ Install Dependencies

composer install
npm install && npm run build

3️⃣ Configure .env File

Copy the .env.example file and set up your database connection:

cp .env.example .env

Edit the .env file with your database details:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cars_db
DB_USERNAME=root
DB_PASSWORD=yourpassword

For PostgreSQL, use:

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=cars_db
DB_USERNAME=postgres
DB_PASSWORD=yourpassword

4️⃣ Run Migrations

php artisan migrate

5️⃣ Start the Development Server

php artisan serve

Now open your browser and visit:
➡ http://127.0.0.1:8000/cars
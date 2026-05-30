# Laravel & Inertia.js (Vue 3 + TypeScript) Product CRUD

A modern, streamlined Product CRUD (Create, Read, Update, Delete) application built with **Laravel**, **Inertia.js**, **Vue 3**, **TypeScript**, and **Tailwind CSS**.

This repository is pre-configured with a database migration, Model, Controller, and frontend views (powered by Inertia.js) to manage a catalog of products.

---

## 🛠️ Tech Stack & Features

- **Backend**: Laravel (with PHP 8.2+)
- **Frontend**: Vue 3 (Composition API, `<script setup>`), Inertia.js, TypeScript, Tailwind CSS
- **Database**: MySQL (configured in `.env`)
- **Key Features**:
  - 📋 Responsive Product list table with sleek tailwind styling.
  - ➕ Elegant Form to add new products.
  - ✏️ Edit and Update existing products (stubs ready).
  - ❌ Delete products with interactive controls (stubs ready).

---

## 🗄️ Database Schema

The `products` table schema is defined in the database migration file:
`database/migrations/2026_05_27_084537_create_products_table.php`

| Field | Type | Description |
| :--- | :--- | :--- |
| `id` | `BigInteger (PK)` | Auto-incrementing unique identifier |
| `name` | `String` | The name of the product |
| `color` | `String` | The color variant of the product |
| `category` | `String` | The category group (e.g. Electronics, Clothing) |
| `price` | `Integer` | The product price (represented as an integer, e.g. in cents or dollars) |
| `created_at` | `Timestamp` | Record creation date & time |
| `updated_at` | `Timestamp` | Record modification date & time |

---

## 🚀 Getting Started

Follow these steps to set up and run the application locally on your machine.

### 1. Prerequisites
Ensure you have the following installed on your system:
- **PHP** (>= 8.2)
- **Composer**
- **Node.js & npm**
- **MySQL / MariaDB**

### 2. Installation
Clone or navigate to the project directory and install the dependencies:

```bash
# Install PHP dependencies
composer install

# Install Frontend dependencies
npm install
```

### 3. Environment Configuration
Copy the `.env.example` file to `.env`:

```bash
copy .env.example .env
```

Open `.env` and configure your database settings. The default configuration uses MySQL:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_crud
DB_USERNAME=root
DB_PASSWORD=root
```
*(Make sure to create a database named `laravel_crud` in your MySQL server before proceeding).*

Generate the application security key:
```bash
php artisan key:generate
```

### 4. Database Migrations
Run the migrations to create the `products`, `users`, and other default tables:

```bash
php artisan migrate
```

### 5. Running the Application
Start the Laravel development server and Vite hot-reloading server in separate terminals:

**Terminal 1 (Laravel Backend):**
```bash
php artisan serve
```
*(By default, this will run at `http://127.0.0.1:8000`)*

**Terminal 2 (Vite Frontend compilation):**
```bash
npm run dev
```

---

## 📂 Project Architecture & Key Files

This project integrates Inertia.js seamlessly between Laravel routes and Vue components:

```text
laravel-crud/
├── app/
│   ├── Http/Controllers/
│   │   └── ProductController.php  <-- Product CRUD handlers & Inertia responses
│   └── Models/
│       └── Product.php            <-- Product Model with mass-assignment protection disabled ($guarded = [])
├── database/
│   └── migrations/
│       └── 2026_05_27_084537_create_products_table.php <-- Products database schema
├── resources/
│   └── js/
│       ├── pages/
│       │   ├── Welcome.vue        <-- Listing view & actions table
│       │   └── AddProduct.vue     <-- Add product form page
│       └── app.ts                 <-- Inertia bootstrapper with Vue & TypeScript
└── routes/
    └── web.php                    <-- Web routes mapping URLs to Controllers
```

---

## 🛣️ Routing Table

The following routes are registered in `routes/web.php` to handle the Product CRUD lifecycle:

| Method | URI | Controller / Action | Description | View / Response |
| :--- | :--- | :--- | :--- | :--- |
| **GET** | `/` | `ProductController@show` | View list of all products | `Welcome.vue` |
| **GET** | `/add/product` | *Closure* | Render the Add Product form | `AddProduct.vue` |
| **POST** | `/product` | `ProductController@store` | Store a newly created product | Redirect or JSON response |
| **GET** | `/product/{product}/edit` | `ProductController@edit` | Edit form for a product | `EditProduct.vue` *(Pending)* |
| **PUT/PATCH** | `/product/{product}` | `ProductController@update` | Update a specific product | Redirect / Back |
| **DELETE** | `/product/{product}` | `ProductController@destroy` | Delete a specific product | Redirect / Back |
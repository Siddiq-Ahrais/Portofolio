# 🚀 Portfolio Website

A modern, hybrid portfolio website built with **Laravel 12** backend and **Blade + TailwindCSS** frontend, featuring authentication via Laravel Breeze and interactive elements powered by **Alpine.js**.

---

## ✨ Features

- **Hybrid Architecture** — Laravel 12 backend with Blade templating and Alpine.js interactivity
- **Authentication System** — Full auth flow (login, register, password reset, profile management) via Laravel Breeze
- **Responsive Design** — TailwindCSS-powered responsive layouts
- **Admin Dashboard** — Protected dashboard for authenticated users
- **Vite Asset Bundling** — Lightning-fast HMR during development
- **MySQL Database** — Robust relational database for content management

---

## 🛠️ Tech Stack

| Layer        | Technology                     |
| ------------ | ------------------------------ |
| **Backend**  | Laravel 12 (PHP 8.2+)         |
| **Frontend** | Blade + TailwindCSS 3 + Alpine.js |
| **Database** | MySQL 8.x                      |
| **Bundler**  | Vite 7                         |
| **Auth**     | Laravel Breeze                 |
| **Testing**  | Pest PHP                       |

---

## 📋 Prerequisites

Before getting started, make sure you have the following installed:

- **PHP** >= 8.2
- **Composer** >= 2.x
- **Node.js** >= 18.x & **npm**
- **MySQL** >= 8.x (via [Laragon](https://laragon.org/), [XAMPP](https://www.apachefriends.org/), or standalone)

---

## ⚡ Getting Started

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/portofolio.git
cd portofolio
```

### 2. Install Dependencies

```bash
composer install
npm install
```

### 3. Environment Setup

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configure Database

Open `.env` and set your MySQL credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portofolio
DB_USERNAME=root
DB_PASSWORD=
```

Then create the database:

```sql
CREATE DATABASE portofolio CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 5. Run Migrations

```bash
php artisan migrate
```

### 6. Start Development Servers

**Option A** — Run all services together (recommended):

```bash
composer dev
```

This starts the Laravel server, queue worker, log viewer (Pail), and Vite simultaneously.

**Option B** — Run individually in separate terminals:

```bash
# Terminal 1 — Laravel backend
php artisan serve

# Terminal 2 — Vite frontend
npm run dev
```

The application will be available at **http://localhost:8000**.

---

## 📁 Project Structure

```
portofolio/
├── app/
│   ├── Http/
│   │   ├── Controllers/     # Route controllers (ProfileController, etc.)
│   │   └── Requests/        # Form request validation
│   ├── Models/              # Eloquent models (User)
│   ├── Providers/           # Service providers
│   └── View/                # View composers & components
├── config/                  # Application configuration
├── database/
│   ├── factories/           # Model factories for testing
│   ├── migrations/          # Database schema migrations
│   └── seeders/             # Database seeders
├── public/                  # Public assets & entry point
├── resources/
│   ├── css/                 # Stylesheets (app.css)
│   ├── js/                  # JavaScript (app.js + Alpine.js)
│   └── views/               # Blade templates
│       ├── auth/            # Authentication views
│       ├── components/      # Reusable Blade components
│       ├── layouts/         # Layout templates
│       ├── profile/         # Profile management views
│       ├── dashboard.blade.php
│       └── welcome.blade.php
├── routes/
│   ├── web.php              # Web routes
│   ├── auth.php             # Authentication routes
│   └── console.php          # Artisan commands
├── tests/                   # Pest PHP tests
├── composer.json            # PHP dependencies
├── package.json             # Node.js dependencies
├── tailwind.config.js       # TailwindCSS configuration
└── vite.config.js           # Vite bundler configuration
```

---

## 🧪 Testing

```bash
# Run the test suite
composer test

# Or directly with Artisan
php artisan test
```

---

## 🔧 Useful Commands

| Command                         | Description                        |
| ------------------------------- | ---------------------------------- |
| `php artisan serve`             | Start the development server       |
| `npm run dev`                   | Start Vite dev server with HMR     |
| `npm run build`                 | Build production assets            |
| `composer dev`                  | Start all services concurrently    |
| `php artisan migrate`           | Run database migrations            |
| `php artisan migrate:fresh`     | Drop all tables & re-migrate       |
| `php artisan db:seed`           | Seed the database                  |
| `php artisan config:clear`      | Clear configuration cache          |
| `php artisan cache:clear`       | Clear application cache            |
| `php artisan route:list`        | List all registered routes         |

---

## 🏗️ Building for Production

```bash
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

---

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

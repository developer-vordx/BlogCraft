# 🏗️ Laravel Multi-Tenant Blog Platform

This is a Laravel-based multi-tenant blog platform that supports:

- 🌐 Subdomain-based tenant identification
- 👥 User registration, login, and session handling
- 🏷️ Category creation per tenant
- 📝 Post creation and viewing per tenant
- ✅ Feature and unit testing with dedicated test database

---

## 🚀 Features

- Multi-tenancy via **subdomain-based isolation** using Spatie’s package
- Full user authentication flow
- Scoped data (users, categories, posts) to each tenant
- Separate databases for production and test environments
- HTTP-based authentication and protected route tests

---

## 🤩 Technology Stack

- Laravel 10+
- Spatie Laravel Multitenancy
- MySQL (for both production and testing)
- PHPUnit for testing
- Faker for generating dummy data

---

## ⚙️ Local Setup Instructions

### 1. **Clone the repository**

```bash
git clone https://github.com/yourusername/laravel-multitenant-blog.git
cd laravel-multitenant-blog
```

### 2. **Install Dependencies**

```bash
composer install
npm install && npm run dev
```

### 3. **Environment Configuration**

#### ✅ Main `.env`

```bash
cp .env.example .env
```

Update the `.env`:

```env
APP_NAME=LaravelTenantApp
APP_ENV=local
APP_KEY=base64:GENERATED_LATER
APP_URL=http://tenant1.app.test:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_main_database
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=array
CACHE_DRIVER=array
```

Then generate key:

```bash
php artisan key:generate
```

### 4. **Tenant Domain Mapping (Local)**

Edit your `/etc/hosts` file (Linux/macOS) or `C:\Windows\System32\drivers\etc\hosts` (Windows):

```text
127.0.0.1 tenant1.app.test
127.0.0.1 tenant2.app.test
```

---

### 5. **Run Migrations & Seeders**

```bash
php artisan migrate
```

(Optional: create some initial tenants and users manually)

---

## 🗪 Testing Setup

Laravel uses a **dedicated **`` environment for running tests.

### 1. Create `.env.testing`

```bash
cp .env .env.testing
```

Update the `.env.testing` like this:

```env
APP_ENV=testing
APP_KEY=base64:GENERATE_THIS
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_test_database
DB_USERNAME=root
DB_PASSWORD=

CACHE_DRIVER=array
SESSION_DRIVER=array
QUEUE_CONNECTION=sync
```

Create the test DB manually in MySQL (or via migration):

```sql
CREATE DATABASE your_test_database;
```

### 2. Generate Test Key

```bash
php artisan key:generate --env=testing
```

### 3. Run Tests

```bash
php artisan test
```

OR run a specific test class:

```bash
php artisan test --filter=UserPostFlowTest
```

✅ The system will now:

- Use `.env.testing` for the test database
- Spin up tenants and users in tests dynamically
- Create categories and posts in test DB
- Assert post visibility via authenticated user routes

---

## 🔮 Test Flow: `UserPostFlowTest`

This test covers:

1. Creating a tenant dynamically
2. Registering a user with complete profile data
3. Logging in the user via `/login`
4. Creating a category for the tenant
5. Creating a post under that category
6. Asserting that the user can view their post via `/my/posts`

Uses:

- `actingAs($user)`
- Dynamic tenant subdomain injection via `withServerVariables(['HTTP_HOST' => ...])`

---

## 🧠 Important Notes

- Ensure **tenant subdomains** are correctly configured in your local environment.
- In tests, the `IdentifyTenant` middleware expects the subdomain like `tenant1.app.test`.
- The login logic is handled via a `LoginService` and custom controller.

---

## 📁 Directory Structure Highlights

```
app/
├── Http/
│   ├── Middleware/IdentifyTenant.php     # Handles tenant resolution via subdomain
│
tests/
├── Feature/
│   └── UserPostFlowTest.php              # Main integration test for full user-post flow
```

---

## 📞 Support or Questions?

If you face any issue running tests or setting up the environment, feel free to open an issue or message the maintainer.


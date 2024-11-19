# TOURS WEB

This web application allows users to browse and book activities, manage reservations, make payments, and handle user roles and permissions. The application is powered by Laravel and includes features for seeding the database with initial data.

---

## Features

- **Activities Management**
  - View a list of available activities.
  - Create, Update Activties.

- **Booking Management**
  - View a list of available bookings.
  - Reserve, Confirm Booking.

- **Payment Integration**
  - Payments are made upon confirmation of a booking.

- **User Management**
  - Role-based access control using [Spatie Laravel Permission](https://spatie.be/docs/laravel-permission).
  - Super Administrator User role pre-configured.

- **Database Seeding**
  - Pre-populated data for admin user, permissions, and admin role.

---

## Requirements

- **PHP**: >= 8.0.2
- **Database**: MySQL or compatible
- **Laravel**: ^9.19

---

## Installation

1. Clone the Repository
   ```bash
    git clone https://github.com/eingurat504/tours-web.git
    cd tours-web

2. Install Dependencies
    ```bash
    composer install

3. Environment Configuration
   
   Copy the .env.example file and update the environment variables as needed:
   ```bash
    cp .env.example .env

4. Set Up Your Environment
   
   Update your .env file with the following configurations:
   ```bash
    APP_NAME="Tours Web"
    APP_ENV=local
    APP_KEY=
    APP_DEBUG=true
    APP_URL=http://localhost

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password

5. Generate Application Key
   
   Run the following command to generate the application key:
   ```bash
    php artisan key:generate


6. Run Database Migrations and Seeders
   
   Run migrations to set up the database schema and seeders to populate the initial data:

   ```bash
    php artisan migrate --seed


7. Serve the Application
   
   Start the development server:
   ```bash
    php artisan serve

## Usage

Access the Application
Once the server is running, you can access the application at:
    http://localhost:8000

## Default Admin Credentials
The seeding process will create a default Super Administrator user. Use the following credentials to log in:
```bash
Email: superadmin@admin.com
Password: 12345678




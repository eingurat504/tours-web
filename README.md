# TOURS WEB

This web application allows users to browse and book activities, manage reservations, make payments, and handle user roles and permissions. The application is powered by Laravel and includes features for seeding the database with initial data.

---

## Features

- **Activities Management**
  - View a list of available activities.
  - Create, Update Activties.

- **Payment Integration**
  - Payments are made upon confirmation of a booking.
  - Secure payment processing.

- **User Management**
  - Role-based access control using [Spatie Laravel Permission](https://spatie.be/docs/laravel-permission).
  - Admin, Manager, and User roles pre-configured.

- **Database Seeding**
  - Pre-populated data for activities, users, and roles.

---

## Requirements

- **PHP**: >= 8.0.2
- **Database**: MySQL or compatible
- **Laravel**: ^9.19

---

## Installation

### 1. Clone the Repository
```bash
git clone https://github.com/eingurat504/tours-web.git
cd tours-web


### 2. Install Dependencies
```bash
composer install



### 3. Environment Configuration
Copy the .env.example file and update the environment variables as needed:
```bash
cp .env.example .env



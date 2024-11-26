
# Truck Ordering System Backend

This is a comprehensive backend application for a Truck Ordering System built with Laravel. It features a secure API using Laravel Passport for user authentication and an admin dashboard to manage orders and users.

## Demo

[Demo Video](https://drive.google.com/file/d/1x0e_xezE2RNCysMG0wb7pEwlTtX-dauZ/view?usp=drive_link)


## Features

### 1. Laravel Passport with API
This project uses Laravel Passport to secure API endpoints with token-based authentication.

#### API Endpoints
| HTTP Method | Endpoint            | Description                   |
|-------------|---------------------|-------------------------------|
| POST        | `/api/login`        | User login                    |
| POST        | `/api/register`     | User registration             |
| GET         | `/api/user`         | Retrieve authenticated user   |
| GET         | `/api/orders`       | Retrieve user orders          |
| POST        | `/api/orders`       | Create a new order            |
| GET         | `/api/orders/{id}`  | Retrieve a specific order     |
| PUT         | `/api/orders/{id}`  | Update an existing order      |
| DELETE      | `/api/orders/{id}`  | Delete an order               |
| GET         | `/api/test`         | Test the API status           |

### 2. Admin Dashboard
A robust admin dashboard is implemented with Filament PHP for managing:
- **Orders**: View, filter, sort, search, and update order statuses.
- **Users**: Manage user details, along with View, filter, sort, search, and update.
- **Database Notifications**: Admins receive notifications for new orders.

### 3. Models
#### Entity-Relationship Diagram (ERD)
```plaintext
User ---< Order
Admin
```

- **Admin**: For managing the system via the dashboard.
- **User**: Registered users of the system who can place orders.
- **Order**: Contains order details with relationships to users.

### 4. How to Run
#### Prerequisites
- PHP >= 8.0
- Composer
- Laravel 11.x
- Node.js & npm
- Any Sql type of db e.g Mysql/PostgreSQL/SQLite or other supported databases

#### Steps
1. Clone the repository:
   ```bash
   git clone https://github.com/your-username/truck-ordering-system.git
   cd truck-ordering-system
   ```
2. Install dependencies:
   ```bash
   composer install
   npm install
   ```
3. Set up the environment:
   ```bash
   cp .env.example .env
   ```
   Update `.env` with your database credentials and other settings.

4. Run migrations and seed Passport clients:
   ```bash
   php artisan migrate --seed
   php artisan passport:install
   ```
5. Serve the application:
   ```bash
   php artisan serve
   ```

6. Test the API using tools like Postman or cURL.

### 5. Unit Tests
Unit tests are included for key functionalities, ensuring robust and reliable behavior.
Run tests with:
```bash
php artisan test
```

### 6. Project Highlights
- **Secure API**: Implemented using Laravel Passport with token-based authentication.
- **Admin Dashboard**: Interactive, feature-rich dashboard for managing users and orders.
- **Real-Time Notifications**: Admins are notified of new orders dynamically.
- **Well-Defined Relationships**: Users and orders are connected with clear relationships.
- **Comprehensive Unit Tests**: Ensures code quality and reliability.

Feel free to fork and contribute to this project!

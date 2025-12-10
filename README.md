# Dynamic Task Widget

A full-stack Laravel application featuring a task management widget with real-time AJAX interactions.

## Features

-   ✅ User authentication (Laravel Breeze)
-   ✅ Create tasks without page reload
-   ✅ Toggle task completion status
-   ✅ Real-time UI updates
-   ✅ Responsive design (Tailwind CSS)
-   ✅ RESTful API
-   ✅ Secure CSRF protection

## Tech Stack

-   **Backend**: Laravel 12.x,
-   **Frontend**: Blade Templates, Vanilla JavaScript
-   **Database**: SQLite (or MySQL)
-   **Authentication**: Laravel Breeze

## Installation

### Prerequisites

-   PHP 8.2 or higher
-   Composer
-   Node.js & NPM
-   SQLite or MySQL

### Setup Steps

1. **Clone the repository**

```bash
   https://github.com/MohamedSalamaMousa/Dynamic-Task-Widget-.git
   cd Dynamic-Task-Widget
```

2. **Install dependencies**

```bash
   composer install
   npm install
```

3. **Environment setup**

```bash
   cp .env.example .env
   php artisan key:generate
```

4. **Database setup**

    For SQLite:

```bash
   touch database/database.sqlite
```

Update `.env`:

```
   DB_CONNECTION=sqlite
```

5. **Run migrations**

```bash
   php artisan migrate
```

6. **Build assets**

```bash
   npm run build
```

7. **Start the server**

```bash
   php artisan serve
```

8. **Access the application**
    - URL: http://127.0.0.1:8000
    - Register a new account
    - Navigate to Dashboard

## API Endpoints

| Method | Endpoint      | Description            |
| ------ | ------------- | ---------------------- |
| GET    | `/tasks`      | Fetch all user tasks   |
| POST   | `/tasks`      | Create a new task      |
| PUT    | `/tasks/{id}` | Toggle task completion |

## Demo Video

Watch the full demonstration on YouTube:

[![Watch Demo Video](https://img.youtube.com/vi/grDDILXix0M/0.jpg)](https://youtu.be/grDDILXix0M)

> Click the image to watch the video.

## Project Structure

```
app/
├── Http/Controllers/
│   └── TaskController.php    # Task CRUD operations
├── Models/
│   ├── Task.php              # Task model
│   └── User.php              # User model with tasks relationship
database/
└── migrations/
    └── xxxx_create_tasks_table.php
resources/
└── views/
    └── dashboard.blade.php   # Main task widget UI
routes/
└── web.php                   # Application routes
```

## Testing

### Manual Testing Checklist

-   [x] User registration and login
-   [x] Tasks load on page load (AJAX GET)
-   [x] Add task without page reload (AJAX POST)
-   [x] Toggle task completion (AJAX PUT)
-   [x] Visual feedback (line-through, grey text)
-   [x] Only user's tasks are visible
-   [x] Input validation works

### Browser DevTools Testing

1. Open DevTools (F12) → Network tab
2. Add a task → Verify POST request to `/tasks`
3. Toggle checkbox → Verify PUT request to `/tasks/{id}`
4. All requests should return 200/201 status

## Features Demonstrated

1. **Database Layer**

    - Migration with proper foreign keys
    - Eloquent relationships (User hasMany Tasks)

2. **Backend API**

    - RESTful controller methods
    - Authentication middleware
    - Request validation
    - JSON responses

3. **Frontend**

    - AJAX GET for loading tasks
    - AJAX POST for creating tasks
    - AJAX PUT for updating tasks
    - Dynamic UI updates
    - No page reloads

4. **Security**
    - CSRF protection
    - User authorization
    - SQL injection prevention (Eloquent ORM)
    - XSS prevention (HTML escaping)

## License

Open-source. Free to use for learning purposes.

## Author

[Your Name]

## Acknowledgments

Built as part of a technical assessment to demonstrate full-stack Laravel development skills.



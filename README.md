## Laravel 11 Task CRUD API Application

This is a Laravel 11 application that provides a CRUD Restful and resourceful API for managing tasks. The application follows the Repository Design Pattern for better separation of concerns and scalability. It also implements modern PHP features such as constructor promotion for dependency injection.


## Features

- **Task Management**: Create, Read, Update, Delete (CRUD) operations for tasks.
- **Repository Design Pattern**: Separation of business logic and data layer for easier maintenance and scaling.
- **PHP 8.2**: Takes advantage of the latest PHP 8.2 features, including constructor promotion.

## Requirements

- **PHP**: ^8.2
- **Laravel Framework**: ^11.9
- **Laravel Sanctum**: ^4.0 for authentication
- **Laravel Tinker**: ^2.9 for debugging and interacting with the application.

1. Clone the repository:
   ```bash
   git clone https://github.com/muzamelHS/TMA-Laravel.git
   ```

2. Navigate to the project directory:
   ```bash
   cd TMA-laravel
   ```

3. Install dependencies:
   ```bash
   composer install
   npm install
   ```

4. Copy the environment configuration file:
   ```bash
   cp .env.example .env
   ```

5. Generate the application key:
   ```bash
   php artisan key:generate
   ```

6. Run the migrations to create the database tables:
   ```bash
   php artisan migrate
   ```

7. Start the local development server:
   ```bash
   php artisan serve
   ```

## Packages Used

```json
{
    "require": {
        "php": "^8.2",
        "laravel/framework": "^11.9",
        "laravel/sanctum": "^4.0",
        "laravel/tinker": "^2.9"
    },
    "require-dev": {
        "fakerphp/faker": "^1.23",
        "laravel/pint": "^1.13",
        "laravel/sail": "^1.26",
        "mockery/mockery": "^1.6",
        "nunomaduro/collision": "^8.0",
        "phpunit/phpunit": "^11.0.1"
    }
}
```

## Project Structure

The project structure follows the standard Laravel directory organization. Key folders and their purposes:

- `app/Enums`: Contains enumerations used across the application (e.g., Task Status).
- `app/Http/Controllers`: Handles the API endpoints for Task CRUD operations.
- `app/Http/Requests`: Contains form request classes for validating API requests (e.g., StoreTaskRequest, UpdateTaskRequest).
- `app/Models`: Holds the Eloquent models.
- `app/Providers`: Custom service providers.
- `app/Repositories`: Contains repository classes that handle the business logic and interaction with the database.
- `routes/`: Defines the API routes.

## CRUD Endpoints

1. **List All Tasks**
   - **Method:** `GET`
   - **Endpoint:** `/api/tasks`
   - **Description:** Retrieves a list of all tasks.

2. **Get a Single Task**
   - **Method:** `GET`
   - **Endpoint:** `/api/tasks/{id}`
   - **Description:** Retrieves a specific task by its ID.

3. **Create a New Task**
   - **Method:** `POST`
   - **Endpoint:** `/api/tasks`
   - **Description:** Creates a new task.
   - **Body:**
     ```json
     {
         "title": "Task Title",
         "description": "Task Description",
         "due_date": "YYYY-MM-DD",
         "status": "pending"
     }
     ```

4. **Update a Task**
   - **Method:** `PUT`
   - **Endpoint:** `/api/tasks/{id}`
   - **Description:** Updates an existing task by its ID.
   - **Body:**
     ```json
     {
         "title": "Updated Task Title",
         "description": "Updated Task Description",
         "due_date": "YYYY-MM-DD",
         "status": "completed"
     }
     ```

5. **Delete a Task**
   - **Method:** `DELETE`
   - **Endpoint:** `/api/tasks/{id}`
   - **Description:** Deletes a specific task by its ID.

## Repository Design Pattern

- **Repositories**: The business logic and database interactions are handled in repository classes under the `app/Repositories` directory. 

  Example: `TaskRepository.php` handles operations related to the Task model.

- **Dependency Injection (DI)**: Laravel's constructor property promotion is used to automatically inject dependencies such as repositories into controllers.

  Example:
  ```php
  class TaskController extends Controller
  {
      public function __construct(
          private TaskRepository $taskRepository
      ) {}

      public function index()
      {
          return $this->taskRepository->getAllTasks();
      }
  }
  ```

## Development Tools
   - **Laravel Pint:** `For automatic code formatting.`

## Conclusion
This API follows RESTful principles and uses Laravel's Eloquent ORM for database interactions. It includes Laravel 11 Task CRUD application demonstrates a modern approach to application design, leveraging Laravel’s features along with the Repository pattern to ensure maintainability and scalability
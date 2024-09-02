# Task_Management_System
[![PHP](https://img.shields.io/badge/PHP-%23777BB4.svg)](https://www.php.net/) 
[![Laravel](https://img.shields.io/badge/Laravel-%23FF2D20.svg)](https://laravel.com/) 
[![Lumen](https://img.shields.io/badge/Lumen-%23FF2D20.svg)](https://lumen.laravel.com/) 
[![Postgres](https://img.shields.io/badge/Postgres-%23316192.svg)](https://www.postgresql.org/) 
[![Postman](https://img.shields.io/badge/Postman-%23FF6C37.svg)](https://www.postman.com/) 
[![ThunderClient](https://img.shields.io/badge/ThunderClient-%23000000.svg)](https://www.thunderclient.io/)

This project is a simple RESTful API built with Lumen that allows users to manage tasks. It provides basic CRUD (Create, Read, Update, Delete) operations for tasks and includes additional features such as task filtering, pagination, and search functionality.


## Table of Contents

* Installation
* Configuration
* Database
* API Endpoints
    * Create a Task
    * Get All Tasks
    * Get a Specific Task
    * Update a Task
    * Delete a Task
* Validation
* Bonus Features
    * Task Filtering
    * Pagination
    * Search
* License

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).

## Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/CindyMisoi/Task_Management_System.git
   cd lumen-task-api

2. **Install dependencies:**
   ```bash
    composer install

3. **Set up the evironment variables:**
   ```bash
   cp .env.example .env

4. **Run migrations:**
   ```bash
    php artisan migrate

5. **Run the development server:**
   ```bash
    php -S localhost:3000 -t public
    Your API will be accessible at `http://localhost:3000`.


## Configuration

Ensure that your `.env` file is properly configured for your PostgreSQL database by adding the following settings:

```bash
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=task_management
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

## Database
The tasks table schema includes the following fields:

* id: Primary key, auto-incrementing.
* title: Required, unique, string.
* description: Optional, text.
* status: Enum with default value "pending".
* due_date: Date, must be a future date.
* created_at: Timestamp, automatically managed by Eloquent.
* updated_at: Timestamp, automatically managed by Eloquent.

To create this table, a migration is included. Run it with:
    ```bash
    php artisan migrate


## API Endpoints
1. **Create a Task:**
   * Method: `POST`
   * Endpoint: `/tasks`
   * Request Body:
     ```json
     {
       "title": "New Task Title",
       "description": "New Task Description",
       "status": "completed",
       "due_date": "2024-12-31"
     }
     ```
   * Response:
     * `201 Created`:Returns the created task.


2. **Get all tasks:**
    * Method: GET
    * Endpoint: /tasks
    * Response:
        * `200 OK`: Returns a list of tasks.

3. **Get a specific task:**
    * Method: GET
    * Endpoint: /tasks/{id}
    * Response:
        * `200 OK`: Returns the task with the specified ID.
        * `404 Not Found`: If the task does not exist.

4. **Update a Task:**
   * Method: `PUT`
   * Endpoint: `/tasks/{id}`
   * Request Body:
     ```json
     {
       "title": "Updated Task Title",
       "description": "Updated Task Description",
       "status": "completed",
       "due_date": "2024-12-31"
     }
     ```
   * Response:
     * `200 OK`: Returns the updated task.
     * `404 Not Found`: If the task does not exist.


5. **Delete a task:**
    * Method: DELETE
    * Endpoint: /tasks/{id}
    * Response:
        * `204 No Content`: If the deletion was successful.
        * `404 Not Found`: If the task does not exist.


## Validation
All incoming requests are validated to ensure required fields are provided and data types are correct. Validation rules include:

* title: Required, string.    
* description: Optional, string.
* status: Required, string, must be either "pending" or "completed".
* due_date: Required, date, must be a future date.

If validation fails, the API returns a 422 Unprocessable Content response with detailed error messages.


## Bonus Features
1. **Task Filtering:**
Tasks can be filtered by status and due_date.

Filter by status:
* Endpoint: /tasks?status=pending

Filter by due_date:
* Endpoint: /tasks?due_date=2024-12-31

2. **Pagination:**
Pagination is available on the task listing endpoint. By default, it returns 10 tasks per page. You can specify the page number using the page query parameter.
* Endpoint: /tasks?page=2

3. **Search:**
You can search for tasks by their title.
* Endpoint: /tasks?search=Task+Title


## Contributing

Thank you for considering contributing to Task Management Project! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## License

The Project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

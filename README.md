Laravel-Challenge-Project
============

[](https://laravel.com)

[](https://php.net)

Overview
--------

This project is a Laravel-based application designed to manage integrations with different marketplaces. It includes user authentication via Laravel Passport, and API endpoints for registering users, managing integrations, and running associated commands. The project also contains comprehensive unit and API tests.


Prerequisites
-------------

Before you begin, ensure you have met the following requirements:

-   **PHP 8.0 or higher**
-   **Composer**
-   **Laravel 11.x**
-   **MySQL or any other supported database**

Installation
------------

Follow these steps to set up the project locally:

1.  **Clone the Repository:**

    ```bash
    git clone git@github.com:MenarSelamet/laravel-challenge-project.git  
    cd laravel-challenge-project
    ```` 

3.  **Install Dependencies:**

    Install the PHP dependencies using Composer:

    ```bash
    composer install
    ````

5.  **Environment Setup:**

    -   Copy the `.env.example` file to `.env`:

        ```bash
        cp .env.example .env
        ````

    -   Generate an application key:

        ```bash
        php artisan key:generate
        ````

Configuration
-------------

1.  **Database Configuration:**

    -   Open the `.env` file and set your database connection details:

        ```bash
        DB_CONNECTION=mysql  
        DB_HOST=127.0.0.1  
        DB_PORT=3306  
        DB_DATABASE=your_database_name  
        DB_USERNAME=your_username  
        DB_PASSWORD=your_password
        ````  

Database Migration
------------------

Run the following command to migrate your database schema:

```bash
php artisan migrate
````

Passport Installation
---------------------

Install and configure Laravel Passport for API authentication:

1.  **Install Passport:**

    ```bash
    php artisan passport:install
    ````

3.  **Define an `api` authentication guard:**

    Define an `api` authentication guard and set the `driver` option to `passport`:

    ```bash
    'guards' => [
    'web' => [
        'driver' => 'session',
        'provider' => 'users',
        ],
    'api' => [
        'driver' => 'passport',
        'provider' => 'users',
        ],
    ],
    ````



Running the Application
-----------------------

To start the Laravel development server, run:

```bash
php artisan serve
````

The application will be available at `http://127.0.0.1:8000`.

Testing
-------

### Running Tests

You can run the tests using PHPUnit:

```bash
php artisan test
````

### Test Scenarios Covered

-   **API Tests:**
    -   Registration validation (e.g., invalid email, missing name)
-   **Unit Tests:**
     -   Integration management (create, update, delete)


API Endpoints
-------------

Here is a summary of the API endpoints provided by this application:

1.  **POST `/register`**: Register a new user.

    -   **Request Body**:

        ```bash
        {  
          "name": "John Doe", 
          "email": "john@example.com",  
          "password": "password123"  
        }
        ````  

    -   **Response**:

        -   `201 Created`: User successfully registered.
        -   `422 Unprocessable Entity`: Validation error.
2.  **POST `/login`**: Obtain an OAuth2 token using Laravel Passport.

    -   **Request Body**:

        ```bash
        {  
          "email": "john@example.com",  
          "password": "password123"  
        }
        ````  

    -   **Response**:

        -   `200 OK`: Token generated.
        -   `401 Unauthorized`: Invalid credentials.
3.  **POST `/integration`**: Add a new marketplace integration.

    -   **Request Body**:

        ```bash
        {  
          "marketplace": "n11|trendyol",  
          "username": "user",  
          "password": "pass"  
        }
        ````  

    -   **Response**:

        -   `201 Created`: Integration added.
        -   `403 Forbidden`: Unauthorized access.
4.  **PUT `/integration/{id}`**: Update an existing integration.

    -   **Request Body**:

        ```bash
        {  
          "marketplace": "n11|trendyol",  
          "username": "newuser",  
          "password": "newpass"
        }
        ```` 

    -   **Response**:

        -   `200 OK`: Integration updated.
        -   `404 Not Found`: Integration not found.
6.  **DELETE `/integration/{id}`**: Delete an integration.

    -   **Response**:
        -   `204 No Content`: Integration deleted.
        -   `403 Forbidden`: Unauthorized access.

Commands
--------

The following Artisan commands are available for managing integrations:

-   **Create Integration**:

    ```bash
    php artisan integration:store {marketplace} {username} {password}
    ````

-   **Update Integration**:

    ```bash
    php artisan integration:update {id} {marketplace} {username} {password}
    ````

-   **Delete Integration**:

    ```bash
    php artisan integration:destroy {id}
    ````

Postman Collection
------------------

A Postman collection is included in the project to facilitate testing. You can import the collection into Postman to test the API endpoints directly.

1.  **Import the Collection:**

    -   Download the collection file laravel_challenge_project.postman_collection.json from the repository.
    -   Open Postman and import the collection.

2.  **Using the Collection:**

    -   The collection includes predefined requests for all API endpoints.
    -   Adjust the environment variables in Postman (e.g., `base_url`, `auth_token`) to match your setup.

Installation Guide
------------------

1.  **Clone the repository and navigate to the project directory.**
2.  **Install dependencies with Composer.**
3.  **Set up your `.env` file and generate an application key.**
4.  **Migrate your database schema.**
5.  **Install and configure Laravel Passport.**
6.  **Run the Laravel development server.**
7.  **Use Postman to test the API endpoints and manage integrations.**

Troubleshooting
---------------

-   **403 Forbidden Errors**:
    -   Ensure your token is correctly included in the `Authorization` header.
    -   Check your Passport middleware configuration.
-   **500 Internal Server Errors**:
    -   Check the Laravel logs (`storage/logs/laravel.log`) for detailed error messages.
    -   Verify your environment configuration (`.env`), especially database and Passport settings.

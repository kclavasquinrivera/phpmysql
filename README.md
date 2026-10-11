# Contacts App

A full-stack web application built with PHP, MySQL, and Bootstrap that lets users securely store and manage their personal contacts. Each user has a private contact list protected by authentication and access control.

![Geometric Pattern Animation](Screenshot%202026-10-10%20162205.png)
![Geometric Pattern Animation](Screenshot%202026-10-10%20162205.png)
![Geometric Pattern Animation](Screenshot%202026-10-10%20162205.png)
![Geometric Pattern Animation](Screenshot%202026-10-10%20162205.png)


## Overview

Users can create an account, log in, and manage their own contacts through a simple page-based interface. Passwords are hashed, sessions keep users authenticated, and every contact is tied to the user who created it, so nobody can view or modify contacts that do not belong to them.

## Key Features

* **User Registration and Login:** Creates accounts and validates credentials, with passwords hashed using bcrypt (`password_hash` / `password_verify`).
* **Session-Based Authentication:** Protects private pages and redirects unauthenticated visitors to the login page. Includes logout.
* **Contact Management (CRUD):** Create, view, edit, and delete contacts.
* **Per-User Data Isolation:** Contacts are linked to their owner. Requests for contacts owned by someone else are rejected with 403/404 responses.
* **Form Validation:** Checks required fields, email format, and a minimum phone number length.
* **Flash Messages:** Confirms actions such as adding, updating, or deleting a contact.
* **Secure Database Access:** Uses PDO with prepared statements for queries.
* **Reusable Layout:** Shared header and footer partials keep pages consistent.

## Technologies

* **Language:** PHP
* **Database:** MySQL
* **Database Access:** PDO (PHP Data Objects)
* **Front End:** HTML, Bootstrap, JavaScript
* **Concepts:** Sessions, authentication, password hashing, CRUD operations, access control, server-side validation

## Project Structure

```
phpmysql/
├── index.php        # Landing page
├── register.php     # User registration
├── login.php        # User login
├── logout.php       # Ends the session
├── home.php         # Contact list for the logged-in user
├── add.php          # Add a new contact
├── edite.php        # Edit an existing contact
├── delete.php       # Delete a contact
├── database.php     # PDO database connection
├── partials/        # Shared header and footer
├── static/          # Static assets
└── mysql/
    └── setup.sql    # Database and table creation script
```

## Database Schema

| Table | Columns |
|---|---|
| `users` | `id`, `name`, `email` (unique), `password` (hashed) |
| `contacts` | `id`, `name`, `user_id` (foreign key to `users.id`), `phone_nober` |

## Getting Started

### Requirements

* PHP 8 or later with the `pdo_mysql` extension
* MySQL or MariaDB
* [XAMPP](https://www.apachefriends.org) (includes PHP, Apache, and MySQL)

### Installation

1. **Clone the repository** (keep the folder name `phpmysql`):

   ```bash
   git clone https://github.com/kclavasquinrivera/phpmysql.git
   cd phpmysql
   ```

2. **Start MySQL.** With XAMPP, open the Control Panel and start MySQL (and Apache if you plan to use it).

3. **Create the database and tables:**

   ```bash
   mysql -u root < mysql/setup.sql
   ```

   On Windows with XAMPP:

   ```cmd
   C:\xampp\mysql\bin\mysql.exe -u root < mysql\setup.sql
   ```

4. **Check the connection settings** in `database.php`. The defaults are:

   ```php
   $host = "localhost";
   $database = "contacts_app";
   $user = "root";
   $password = "";
   ```

5. **Run the app** with PHP's built-in server from the project folder:

   ```bash
   php -S localhost:8000
   ```

6. **Open** [http://localhost:8000](http://localhost:8000), click **Get Started**, and create an account.

## Screenshots

_Add screenshots here (landing page, register, login, contact list, add/edit form)._

```md
![Contact list](docs/contact-list.png)
```

## Learning Outcomes

Through this project, I practiced:

* Building a multi-page PHP application connected to a MySQL database.
* Implementing user registration, login, and session management.
* Hashing and verifying passwords securely.
* Using PDO and prepared statements to interact with the database.
* Enforcing access control so users can only manage their own data.
* Designing a relational schema with a foreign key between users and contacts.
* Managing a project with Git and GitHub as part of my programming portfolio.

## Future Improvements

* Escape all output with `htmlspecialchars()` to prevent XSS.
* Add CSRF protection to forms.
* Change deletion to a POST request instead of a GET link.
* Use prepared statements for every query and move credentials to environment variables.
* Add search, sorting, and pagination for contacts.
* Improve validation for phone numbers and email addresses.
* Add automated tests.

## Project Background

I built this project to learn how server-side web applications work: handling forms, authenticating users, and storing data in a relational database. I published it on GitHub to document my progress and continue developing my software engineering skills.

**Note:** This application is an educational project and is not intended for production use. Database credentials are configured for local development only.

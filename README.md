# PHP Learning Exercises
This repository contains a series of exercises designed to help learn PHP, covering syntax, forms, database access, CRUD operations, and REST APIs.
It was created as part of the course ***64-31 Internet Programming*** at **Haute École de Gestion (HEG)**.

## Features
- PHP Syntax Exercises: Understanding the basics of PHP.
- Form Handling: Using HTML forms and processing data with PHP.
- Database Access: Connecting to and querying MySQL databases.
- CRUD Operations: Implementing Create, Read, Update, and Delete functionalities.
- REST API in PHP: Building RESTful services with PHP.

## Project Structure
- `Demo_1/` : Basic PHP form handling.
- `Demo_BDD/` : Basic database interaction with PHP.
- `TP-01_Syntaxe/` : Introduction to PHP syntax.
- `TP-02_Syntaxe/` : Advanced PHP syntax concepts.
- `TP-03_Formulaire/` : Form handling exercises.
- `TP-04_Formulaire/` : More advanced form handling.
- `TP-05_Acces_BDD/` : Connecting and querying MySQL databases.
- `TP-06_Acces_BDD/` : Additional database exercises.
- `TP-07_Export/` : Exporting data from a database.
- `TP-08_CRUD/` : Implementing CRUD operations.
- `TP-09_REST/` : Building a REST API in PHP.

## Prerequisites
- PHP 7.x or 8.x
- Apache Server (e.g., XAMPP, WAMP, MAMP)
- MySQL Database
- Basic knowledge of HTML and PHP

## Installation
```shell
git clone https://github.com/DanielGarcia85/PHP_Exercices.git
```
- Start your Apache and MySQL server (if applicable).
- Place the project in the appropriate directory (e.g., htdocs for XAMPP).
- Import SQL files where necessary (npa.sql, sommets.sql).
- Access exercises via http://localhost/

## Exercises Overview
### Each folder contains exercises and corresponding corrections where available.
Example: Running a Form Processing Exercise
- Navigate to *TP-03_Formulaire/Exercice_1/*.
- Open *index.html* in a browser.
- Fill out the form and submit it.
- Data is processed by *traitementPHP.php*.

## API Endpoints (for TP-09 REST)
| Method | Endpoint | Description |
|--------|---------|-------------|
| GET    | `/api/resource` | Fetch all resources |
| POST   | `/api/resource` | Create a new resource |
| GET    | `/api/resource/{id}` | Fetch a specific resource |
| PUT    | `/api/resource/{id}` | Update a resource |
| DELETE | `/api/resource/{id}` | Delete a resource |

## Useful References
- PHP Documentation : https://www.php.net/manual/en/
- MySQL Documentation : https://dev.mysql.com/doc/

## License
This project is licensed under the Creative Commons Attribution-ShareAlike (CC BY-SA) license.

## Author
Project created by Daniel Garcia as part of the course ***64-31 Internet Programming*** at **Haute École de Gestion (HEG)** during the Spring semester of 2025.
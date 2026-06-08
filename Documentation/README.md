# ANNEXSPRINT Sportswear E-Commerce Platform

[![PHP](https://img.shields.io/badge/PHP-8.3-blue?style=for-the-badge&logo=php)](https://www.php.net/)

[![HTML5](https://img.shields.io/badge/HTML-5.0-E34F26?style=for-the-badge&logo=html5&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/HTML)

[![CSS3](https://img.shields.io/badge/CSS-3.0-1572B6?style=for-the-badge&logo=css3&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/CSS)

[![JavaScript](https://img.shields.io/badge/JavaScript-ES2024-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)](https://developer.mozilla.org/en-US/docs/Web/JavaScript)


## Table of contents

## Project Description

A lightweight, high-performance sportswear e-commerce application built using procedural PHP, MySQL, HTML5, CSS3, and vanilla JavaScript. This documentation outlines the core authentication and contact systems completed prior to building the user homepage.

---

## Tech Stack

| Category | Technologies |
|----------|--------------|
| **Frontend** | HTML5, CSS3 (Custom Variables), JavaScript (ES6+) |
| **Backend** | PHP (Procedural, Include-driven architecture) |
| **Database** | MySQL (via XAMPP) |

---

## Prerequisites & Database Setup
Ensure your local server environment (XAMPP) is installed and running with both Apache and MySQL services active.

1. Open phpMyAdmin at `http://localhost/phpmyadmin`
2. Create a new database named `sportsdb`
3. Execute the following SQL query to initialize the user entity schema:

```sql
CREATE DATABASE IF NOT EXISTS sportsdb;
USE sportsdb;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

---

## Installation & Running the Project
This project uses the PHP Server runtime extension directly inside Visual Studio Code instead of relying on traditional XAMPP root file paths.

Launch VS Code and open the root sports-gear-shop directory

Navigate to the Extensions tab `(Ctrl + Shift + X)`, search for PHP Server (by braporta), and click install

Open your explorer sidebar, right-click directly on index.php, and select PHP Server: Serve Project

Your default web browser will automatically load the workspace instance at: `http://localhost:3000`

---

## How to Test Functionality
Since the landing homepage layout is yet to be built, you can explicitly route to individual entry points via your browser address bar to test the completed modules:

### User Registration (register.php)
Test Route URL: `http://localhost:3000/register.php`

| Validation Checkpoint | Expected Behavior |
| :--- | :--- |
| **Empty Submission** | Client-side JavaScript block alert: "Inputs cannot be empty!" |
| **Password Length Rules** | Browser input barrier validation constraint for passwords shorter than 6 characters |
| **Symmetry Check** | Mismatch alert when Password and Confirm Password values differ |
| **Success Run** | Routes data to `auth/register-process.php`, applies `password_hash()` cryptographic hashing, injects entry into database, and updates table row state |

### Secure Login Engine (login.php)
Test Route URL: http://localhost:3000/login.php

| Validation Checkpoint | Expected Behavior |
| :--- | :--- |
| **Invalid Credentials** | Database lookups flag and block access for unregistered email or wrong password |
| **Success Run** | Verifies data parity via `password_verify()`, mounts persistent user session via `session_start()`, and triggers welcome screen banner tracking the verified username |

### Customer Contact Module (contact.php)
Test Route URL: http://localhost:3000/contact.php

| Validation Checkpoint | Expected Behavior |
| :--- | :--- |
| **Form Submission** | Provide inputs for Full Name, Email Address, Inquiry Subject dropdown, and Message canvas. Hit send to verify client validation wrapper integration |
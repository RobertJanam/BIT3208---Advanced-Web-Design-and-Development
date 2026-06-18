# ANNEXSPRINT Sportswear E-Commerce Platform

[![PHP](https://img.shields.io/badge/PHP-8.3-blue?style=for-the-badge&logo=php)](https://www.php.net/)

[![HTML5](https://img.shields.io/badge/HTML-5.0-E34F26?style=for-the-badge&logo=html5&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/HTML)

[![CSS3](https://img.shields.io/badge/CSS-3.0-1572B6?style=for-the-badge&logo=css3&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/CSS)

[![JavaScript](https://img.shields.io/badge/JavaScript-ES2024-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)](https://developer.mozilla.org/en-US/docs/Web/JavaScript)


## Table of Contents
1. [Project Description](#project-description)
2. [Tech Stack](#tech-stack)
3. [Relational Database Schema Setup](#relational-database-schema-setup)
4. [Local Installation & Development Server Setup](#local-installation--development-server-setup)
5. [Core Authentication & Contact Verification (Phase 1)](#core-authentication--contact-verification-phase-1)
6. [Role-Based Access Control & Admin Gateways (Phase 2)](#role-based-access-control--admin-gateways-phase-2)
7. [Dynamic Category Infrastructure](#dynamic-category-infrastructure)
8. [Product Inventory Control System (CRUD)](#product-inventory-control-system-crud)
9. [User Frontend Application Grid & Interactivity](#user-frontend-application-grid--interactivity)
10. [Secure Logout Guardrail Engine](#secure-logout-guardrail-engine)

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

## Relational Database Schema Setup

The backend engine leverages a centralized database named `sportsdb`. Run this initialization script within your local phpMyAdmin console or native MySQL client terminal to map the authorization roles, categorical structures, and stock records:

```sql
CREATE DATABASE IF NOT EXISTS sportsdb;
USE sportsdb;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(20) DEFAULT 'customer',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE,
    description TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    description TEXT NOT NULL,
    category VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    image1 VARCHAR(255) DEFAULT NULL,
    image2 VARCHAR(255) DEFAULT NULL,
    image3 VARCHAR(255) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

## Local Installation & Development Server Setup

### Step 1: Clone and Position the Repository
Download or clone the repository branch from your version control source.

Position the root sports-gear-shop folder inside your system's environment. If using standard XAMPP paths, drag the folder tree directly into your local machine's htdocs/ loop.

### Step 2: Configure Environment Runtime in VS Code
To ensure seamless server execution and execution handling inside VS Code:

Boot up Visual Studio Code.

Open global settings configuration using Ctrl + ,.

Search for PHP Validate Executable Path and configure your system's absolute binary route (e.g. C:\xampp\php\php.exe on Windows environment configurations).

### Step 3: Serve the Core Project Pipeline
Launch an integrated terminal instance inside VS Code (Ctrl + ~).

Spin up the native PHP server listening on local port loop 3000 by running:

```bash

php -S localhost:3000
Open your browser framework of choice and access the local index endpoint via: http://localhost:3000.
```

---

## Core Authentication & Contact Verification

### User Registration (register.php)
Test Route URL: `http://localhost:3000/register.php`
ValidationTarget Check
Empty Fields: Client-side JavaScript blocks submission with a visual alert text loop saying "Inputs cannot be empty!".
Password Barrier: Form constraints enforce a registration requirement of at least 6 characters before allowing data transition.
Symmetry Check: Checks password consistency against the confirmation string to catch mismatches before postback.
Success Path: Passes input metrics to auth/register-process.php, hashes data securely with password_hash(), and appends the entry as a regular customer record inside the table tracking parameters.Customer Contact Module (contact.php)Test Route URL: `http://localhost:3000/contact.php`
Validation Target Check
Submission Routing: Enter test criteria within full name fields, select target topics from the dropdown framework, and compile messages inside the text block to verify client-side verification constraints.

---

## Role-Based Access Control & Admin Gateways

The application handles administrative authorization tiers using strict conditional session filtering loops.
Admin Account Creation (admin_register.php)
Test Route URL: `http://localhost:3000/admin_register.php`
Automatic Role Privilege Injection
Bypasses standard user configuration defaults, appending an explicit 'admin' role token value directly to the user record database row.Secure Login Engine (login.php)Test Route URL: ```http://localhost:3000/login.phpValidation```
Target Check
Credential Verification: Inspects input values against system database tables using safe password_verify() loops.
Conditional Routing Engine: Once verification passes, a conditional tracking layer intercepts the authenticated user profile session token ($_SESSION['role']):
If Role == 'admin': Reroutes traffic to the control console dashboard at admin/index.php.
If Role == 'customer': Maps the runtime workspace forward to the customer homepage at index.php.
Dynamic Category Infrastructure
Administrators can control product classification trees through dedicated backend configuration panels under admin/manage-category/:
1. Add Category (add-category.php)
Purpose: Allows creation of custom sportswear classification indices (e.g., Elite Footwear, Training Jerseys).
Automated Asset Management: Upon database insertion success, a script loop extracts the text string, formats it into a lowercased snake_case variable pattern, and triggers an automated local file directory creation loop (mkdir()) inside uploads/ to receive future product media files.
2. Update Category (update-category.php)
Purpose: Handles layout editing for category labels and scope parameter logs.Asynchronous Execution Layer: Integrates native JavaScript fetch() triggers linked to a configuration dropdown menu.
Selecting a category dynamically reads data records and injects current descriptions into the update form without a page reload.
Product Inventory Control System (CRUD)The core CRUD operations are managed through the administrator interface using dynamic file system streaming:
1. Product Asset Creation (products.php)
Form Ingestion Handling: Captures core string descriptors via secure HTTP POST methods, escaping raw metrics using mysqli_real_escape_string() to prevent database injection vulnerabilities.
Multi-Media Asset Streaming: Supports parallel uploading of up to 3 high-resolution inventory images. Files are sorted dynamically based on the associated category folder route configuration (e.g., ../uploads/elite_footwear/).2. Live Inventory Updates (update-product.php)Modal Modification Interface: Uses a centralized modification modal template that populates existing database states upon selection click.
Asset Scrubbing Mechanism: When a product image is updated, the server calls @unlink() on the target path to delete the old asset from local storage before saving the new media file.
3. Permanent Record Purging (remove-product.php)Destructive Cascade Logic: Selecting a product ID for deletion triggers a multi-tier database purge. The engine looks up the record, extracts all image file pointers, removes those local media assets from the file system, and permanently deletes the database entry.User Frontend Application Grid & InteractivityThe main consumer-facing catalog presents active product layouts across a clean grid interface:Dynamic Catalog View (products.php / Front-End Grid)Test Route URL: http://localhost:3000/products.phpRelational
Category Joining: Pulls stock details via a LEFT JOIN on the categories table to ensure metadata matches the system's dynamic data architecture.Multi-Slider Layout Engine: To accommodate multiple item listings gracefully without breaking standard dimensions, product blocks are designed with a custom JavaScript slider framework. Customers can click through up to 3 image slides per product, cycling using an indexed loop indicator that updates visibility values dynamically.
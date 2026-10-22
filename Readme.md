# Computational Physics Simulation DBMS

## Overview
An API-driven, fully decoupled Database Management System designed to track computational physics simulation runs, manage researcher profiles, and monitor execution statuses. Built as a collaborative group project.

## Features
*   **Decoupled Architecture:** The frontend client (`api_dashboard.html`) dynamically communicates with backend PHP endpoints via asynchronous JavaScript (Fetch API).
*   **Real-Time CRUD Operations:**
    *   **Create:** Log new simulation runs and register new researcher profiles with foreign-key linking.
    *   **Read:** Fetch and display joined relational database records instantly on page load.
    *   **Update:** Swap execution statuses (Running, Completed, Failed) via dropdowns without reloading the page.
    *   **Delete:** Permanently remove simulation logs from the database dynamically.
*   **Relational Database:** Normalized MySQL schema utilizing foreign keys between `Users`, `Simulations`, and `SimulationRuns`.

## Tech Stack
*   **Backend:** PHP (PDO API), MySQL
*   **Frontend:** HTML5, CSS3, Vanilla JavaScript

## Project Structure
*   **`/database_setup.sql`** - Complete MySQL dump containing tables and sample data.
*   **`/db.php`** - Core PDO database connection file.
*   **`/api_dashboard.html`** - The primary frontend client interface.
*   **`/style.css`** - External stylesheet for UI design.
*   **`/api_*.php`** - Backend API endpoints that read, update, and delete JSON data.
*   **`/add_*.php`** - HTML/PHP hybrid forms for inserting new database records.

---

## Local Setup Instructions

### For Windows Users (Using XAMPP)
1.  **Install XAMPP:** Download and install [XAMPP for Windows](https://www.apachefriends.org/index.html).
2.  **Clone Repository:** Open your terminal, navigate to `C:\xampp\htdocs\`, and run:
    ```bash
    git clone [https://github.com/abhishekraj0310/Physics_Simulation_Dbms.git](https://github.com/abhishekraj0310/Physics_Simulation_Dbms.git)
    ```
3.  **Start Server:** Open the XAMPP Control Panel and click **Start** next to both **Apache** and **MySQL**.
4.  **Setup Database:** 
    * Go to `http://localhost/phpmyadmin` in your browser.
    * Click the **Import** tab, select the `database_setup.sql` file from the cloned folder, and click **Import**.
5.  **Configure Credentials:** Open `db.php` and ensure the password is set to blank (XAMPP's default):
    ```php
    $password = '';
    ```
6.  **Run Application:** Navigate to `http://localhost/Physics_Simulation_Dbms/api_dashboard.html`.

### For macOS Users (Using Built-in PHP)
1.  **Clone Repository:**
    ```bash
    git clone [https://github.com/abhishekraj0310/Physics_Simulation_Dbms.git](https://github.com/abhishekraj0310/Physics_Simulation_Dbms.git)
    cd Physics_Simulation_Dbms
    ```
2.  **Setup Database:** Open MySQL Workbench, open `database_setup.sql`, and execute the script to build the schema.
3.  **Configure Credentials:** Open `db.php` and update the password to match your local MySQL root password:
    ```php
    $password = 'your_mac_mysql_password';
    ```
4.  **Start Server:** Run the built-in PHP development server from your terminal:
    ```bash
    php -S localhost:8000
    ```
5.  **Run Application:** Navigate to `http://localhost:8000/api_dashboard.html`.
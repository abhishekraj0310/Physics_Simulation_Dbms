# Computational Physics Dashboard (API Version)

A decoupled, API-driven database management system using PHP, MySQL, and Vanilla JavaScript.

## Windows Setup Instructions (Using XAMPP)

Because this project requires a PHP server and a MySQL database, Windows users should use XAMPP to run it locally.

### 1. Install Requirements
* Download and install [XAMPP for Windows](https://www.apachefriends.org/index.html).

### 2. Move the Project Files
* Clone or download this repository.
* Move the entire project folder into your XAMPP `htdocs` directory (usually located at `C:\xampp\htdocs\`).

### 3. Start the Server
* Open the **XAMPP Control Panel**.
* Click **Start** next to both **Apache** and **MySQL**.

### 4. Setup the Database
* Open your web browser and go to: `http://localhost/phpmyadmin`
* Click the **Import** tab at the top of the screen.
* Click **Choose File**, select the `database_setup.sql` file from the project folder, and click **Import** at the bottom to instantly create the database and sample data.

### 5. Configure the Database Connection
* Open `db.php` in a text editor (like VS Code or Notepad).
* Because XAMPP's default MySQL password is intentionally left blank, you must change line 5 to have empty quotes.
* Change `$password = '12345';` to `$password = '';`

### 6. View the Dashboard
* Open your browser and go to: `http://localhost/YOUR_FOLDER_NAME/api_dashboard.html` *(Make sure to replace YOUR_FOLDER_NAME with the actual name of the folder inside htdocs, such as `Physics_Simulation_Dbms`)*.
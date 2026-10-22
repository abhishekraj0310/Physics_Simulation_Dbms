<?php
$host = '127.0.0.1';
$dbname = 'physics_simulation';
$username = 'root';
$password = 'Abhi@iiitb'; // Update this to match your local MySQL password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
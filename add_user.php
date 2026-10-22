<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare('INSERT INTO Users (user_name, email, designation) VALUES (?, ?, ?)');
    if ($stmt->execute([$_POST['user_name'], $_POST['email'], $_POST['designation']])) {
        header('Location: add_run.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Researcher</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="add_run.php">← Back to Log Run</a>
    <h2>Add New Researcher</h2>
    <form method="POST">
        <label>Name:</label><br>
        <input type="text" name="user_name" required><br><br>
        
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>
        
        <label>Designation / Role:</label><br>
        <select name="designation" class="status-dropdown" required style="width: 100%; padding: 8px; margin-top: 5px;">
            <option value="" disabled selected>Select designation...</option>
            <option value="Scholar">Scholar</option>
            <option value="Professor">Professor</option>
            <option value="PhD Candidate">PhD Candidate</option>
            <option value="Postdoc Researcher">Postdoc Researcher</option>
            <option value="Student">Student</option>
        </select><br><br>
        
        <button type="submit" style="background: #007bff; color: white; border: none; padding: 10px 15px; border-radius: 4px; font-weight: bold; cursor: pointer;">Save Researcher</button>
    </form>
</body>
</html>
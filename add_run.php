<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sim_id = $_POST['simulation_id'];
    $user_id = $_POST['user_id'];
    $exec_date = $_POST['execution_date'];
    $status = $_POST['status'];

    $sql = "INSERT INTO SimulationRuns (simulation_id, user_id, execution_date, status) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([$sim_id, $user_id, $exec_date, $status])) {
        header("Location: api_dashboard.html");
        exit();
    } else {
        echo "Error saving data.";
    }
}

$simulations = $pdo->query("SELECT simulation_id, simulation_name FROM Simulations")->fetchAll();
$users = $pdo->query("SELECT user_id, user_name FROM Users")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Simulation Run</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .form-container { background: white; padding: 25px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); max-width: 500px; margin-top: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        select, input { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { background-color: #28a745; color: white; border: none; padding: 10px 15px; font-size: 16px; border-radius: 4px; cursor: pointer; font-weight: bold; }
        button:hover { background-color: #218838; }
        a { text-decoration: none; color: #007bff; font-weight: bold; }
    </style>
</head>
<body>

    <a href="api_dashboard.html">← Back to Dashboard</a>
    
    <div class="form-container">
        <h2>Log a New Simulation Run</h2>
        
        <form method="POST" action="add_run.php">
            <div class="form-group">
                <label>Select Simulation:</label>
                <select name="simulation_id" required>
                    <option value="">-- Choose Simulation --</option>
                    <?php foreach ($simulations as $sim): ?>
                        <option value="<?php echo $sim['simulation_id']; ?>"><?php echo htmlspecialchars($sim['simulation_name']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Select Researcher: <a href="add_user.php" style="font-size: 13px; font-weight: normal; margin-left: 10px;">(+ Add New)</a></label>
                <select name="user_id" required>
                    <option value="">-- Choose Researcher --</option>
                    <?php foreach ($users as $user): ?>
                        <option value="<?php echo $user['user_id']; ?>"><?php echo htmlspecialchars($user['user_name']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Execution Date:</label>
                <input type="date" name="execution_date" value="<?php echo date('Y-m-d'); ?>" required>
            </div>

            <div class="form-group">
                <label>Status:</label>
                <select name="status" required>
                    <option value="Running">Running</option>
                    <option value="Completed">Completed</option>
                    <option value="Failed">Failed</option>
                </select>
            </div>

            <button type="submit">Submit to Database</button>
        </form>
    </div>

</body>
</html>
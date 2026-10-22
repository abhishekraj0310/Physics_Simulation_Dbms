<?php
require 'db.php';
header('Content-Type: application/json');

try {
    $sql = "SELECT 
                sr.run_id, 
                s.simulation_name, 
                u.user_name AS researcher_name, 
                sr.execution_date, 
                sr.status
            FROM SimulationRuns sr
            JOIN Users u ON sr.user_id = u.user_id
            JOIN Simulations s ON sr.simulation_id = s.simulation_id";
            
    $stmt = $pdo->query($sql);
    $runs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($runs);
} catch (PDOException $e) {
    echo json_encode(["error" => "Database error: " . $e->getMessage()]);
}
?>
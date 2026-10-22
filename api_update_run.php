<?php
require 'db.php';
header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['run_id']) && isset($data['status'])) {
    try {
        $stmt = $pdo->prepare("UPDATE SimulationRuns SET status = ? WHERE run_id = ?");
        if ($stmt->execute([$data['status'], $data['run_id']])) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "error" => "Database update failed"]);
        }
    } catch (PDOException $e) {
        echo json_encode(["success" => false, "error" => $e->getMessage()]);
    }
} else {
    echo json_encode(["success" => false, "error" => "Missing data"]);
}
?>
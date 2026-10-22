<?php
require 'db.php';
header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['run_id'])) {
    try {
        $stmt = $pdo->prepare("DELETE FROM SimulationRuns WHERE run_id = ?");
        if ($stmt->execute([$data['run_id']])) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "error" => "Database delete failed"]);
        }
    } catch (PDOException $e) {
        echo json_encode(["success" => false, "error" => $e->getMessage()]);
    }
} else {
    echo json_encode(["success" => false, "error" => "Missing run_id"]);
}
?>
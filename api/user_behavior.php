<?php
session_start();
header('Content-Type: application/json');
include '../includes/db.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'Unauthorized']);
    http_response_code(401);
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetch recent product views by user (last 20)
$stmt = $pdo->prepare("SELECT product_id FROM user_product_views WHERE user_id = ? ORDER BY viewed_at DESC LIMIT 20");
$stmt->execute([$user_id]);
$views = $stmt->fetchAll(PDO::FETCH_COLUMN);

echo json_encode(['product_views' => $views]);
?>

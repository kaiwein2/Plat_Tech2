<?php
include 'db.php'; 
$query = isset($_GET['q']) ? $_GET['q'] : '';

$stmt = $pdo->prepare("SELECT id, title FROM products WHERE title LIKE :query LIMIT 10");
$stmt->execute(['query' => '%' . $query . '%']);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($results);
?>
<?php
session_start();
include 'db.php';

$response = ['stock' => 0, 'price' => 0];

if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    $stmt = $pdo->prepare("SELECT stock, price FROM products WHERE id = :id");
    $stmt->execute(['id' => $productId]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product) {
        $response['stock'] = (int) $product['stock'];
        $response['price'] = (float) $product['price'];
    }
}

header('Content-Type: application/json');
echo json_encode($response);
?>
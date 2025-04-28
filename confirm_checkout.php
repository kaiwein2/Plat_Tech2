<?php
session_start();
include 'db.php';

$response = ['success' => false];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['cart'])) {
        try {
            foreach ($_SESSION['cart'] as $item) {
                
                error_log("Updating stock for Product ID: {$item['id']} with Quantity: {$item['quantity']}");
                
                $stmt = $pdo->prepare("UPDATE products SET stock = stock - :quantity WHERE id = :id");
                $stmt->execute(['quantity' => $item['quantity'], 'id' => $item['id']]);
            }
           
           
            unset($_SESSION['cart']);
            $response['success'] = true;
        } catch (Exception $e) {
            $response['message'] = 'Error updating stock: ' . $e->getMessage();
        }
    }
}

header('Content-Type: application/json');
echo json_encode($response);
?>
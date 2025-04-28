<?php
session_start();
include 'db.php'; // Database connection

$response = ['success' => false, 'message' => 'Invalid input'];

try {
    $input = json_decode(file_get_contents('php://input'), true);
    
    if (isset($input['id']) && isset($input['quantity'])) {
        $productId = intval($input['id']);
        $quantity = intval($input['quantity']);

        if ($productId > 0 && $quantity > 0) {
            foreach ($_SESSION['cart'] as &$item) {
                if ($item['id'] == $productId) {
                    $stmt = $pdo->prepare("SELECT stock FROM products WHERE id = :id");
                    $stmt->execute(['id' => $productId]);
                    $product = $stmt->fetch(PDO::FETCH_ASSOC);
                    
                    if ($product && $quantity <= $product['stock']) {
                        $item['quantity'] = $quantity; 
                        $response['success'] = true;
                        $response['message'] = 'Quantity updated successfully.';
                    } else {
                        $response['message'] = 'Quantity exceeds available stock.';
                    }
                    break;
                }
            }
        } else {
            $response['message'] = 'Invalid product ID or quantity.';
        }
    }
} catch (Exception $e) {
    $response['message'] = 'Error processing request: ' . $e->getMessage();
}

header('Content-Type: application/json');
echo json_encode($response);
?>
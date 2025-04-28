<?php
session_start();

$response = ['success' => false];

try {
    if (isset($_SESSION['cart'])) {
        unset($_SESSION['cart']);
        $response['success'] = true;
    }
} catch (Exception $e) {
    error_log("Error clearing cart: " . $e->getMessage());
}

header('Content-Type: application/json');
echo json_encode($response);
?>
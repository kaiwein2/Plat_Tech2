<?php
header('Content-Type: application/json');
session_start();

$conn = new mysqli("localhost", "root", "", "ecommerce");
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed: ' . $conn->connect_error]);
    exit;
}

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1;  // Get user ID from session

$sql = "SELECT product_name, quantity, price FROM cart_items WHERE user_id = $user_id";
$result = $conn->query($sql);

$cartItems = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $cartItems[] = $row;
    }
}

echo json_encode(['cartItems' => $cartItems]);

$conn->close();
?>

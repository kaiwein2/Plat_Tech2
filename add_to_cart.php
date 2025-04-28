<?php
header('Content-Type: application/json');
error_reporting(E_ALL);  
ini_set('display_errors', 1);

session_start();

// Database connection
$conn = new mysqli("localhost", "root", "", "ecommerce");
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed: ' . $conn->connect_error]);
    exit;
}

// Check if product_id is passed in POST request
if (!isset($_POST['product_id'])) {
    echo json_encode(['success' => false, 'message' => 'Product ID is missing']);
    exit;
}

$product_id = $_POST['product_id'];  // Get product ID from the POST request
$quantity = 1;  // Default quantity
$price = 100;  // Default price
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1;  // Get user ID from session

// Query the database for product price and name
$sql = "SELECT price, name FROM products WHERE id = $product_id";
$result = $conn->query($sql);

if (!$result) {
    echo json_encode(['success' => false, 'message' => 'Database query error: ' . $conn->error]);
    exit;
}

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $price = $row['price'];
    $product_name = $row['name'];
} else {
    echo json_encode(['success' => false, 'message' => 'Product not found']);
    exit;
}

// Insert the item into the cart
$sql = "INSERT INTO cart_items (user_id, product_id, product_name, quantity, price)
        VALUES ($user_id, $product_id, '$product_name', $quantity, $price)";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['success' => true, 'message' => 'Item added to cart!']);
} else {
    echo json_encode(['success' => false, 'message' => 'Error adding item to cart: ' . $conn->error]);
}

$conn->close();
?>


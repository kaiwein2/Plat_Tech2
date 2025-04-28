<?php
$host = 'localhost';
$dbname = 'ecommerce'; // Replace with your vouchers database name
$username = 'root'; // Replace with your database username
$password = ''; // Replace with your database password (default is empty for XAMPP)

try {
    $voucher_pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $voucher_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the vouchers database: " . $e->getMessage());
}
?>
    
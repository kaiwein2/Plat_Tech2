<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve the product ID and category from the POST request
        $productId = $_POST['product_id'];
        $category = $_POST['category'];

        // Assume a simple favorites list stored in the session (this can be extended with a database)
        if (!isset($_SESSION['favorites'])) {
            $_SESSION['favorites'] = [];
        }

        // Add the product to the favorites list
        $_SESSION['favorites'][$category][] = $productId;

        echo 'Product added to favorites!';
    }
?>
<?php
session_start();
include 'db_kids.php'; // Include your kids database connection

// Check if product ID is provided in the URL
if (!isset($_GET['id'])) {
    header("Location: kids.php"); // Redirect to kids page if no ID
    exit();
}

$productId = $_GET['id'];

// Fetch the product details from the database
$stmt = $pdo->prepare("SELECT * FROM products_kids WHERE id = :id"); // Using products table
$stmt->execute(['id' => $productId]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if the product exists
if (!$product) {
    header("Location: kids.php"); // Redirect if product not found
    exit();
}

// Get the username and role from the session (if available)
$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
$role = isset($_SESSION['role']) ? ucfirst($_SESSION['role']) : null;
?>

<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?php echo htmlspecialchars($product['title']); ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/product.css">

    <style>
        .product-gallery {
            display: flex;
            justify-content: center; /* Center the gallery */
            align-items: flex-start; /* Align items at the top */
            margin-top: 20px;
        }
        .thumbnail {
            width: 100px; /* Thumbnail width */
            margin: 0 10px; /* Spacing between thumbnails */
            cursor: pointer;
            border: 2px solid transparent; /* Default border */
            transition: border-color 0.3s; /* Transition for hover effect */
        }
        .thumbnail:hover {
            border-color: #007bff; /* Highlight on hover */
        }
        .thumbnail img {
            width: 100%; /* Make thumbnail images responsive */
            height: auto; /* Maintain aspect ratio */
        }
        .main-image {
            max-width: 600px; /* Limit the main image width */
            margin-right: 20px; /* Spacing between main image and thumbnails */
        }
        .size-btn {
            margin: 5px; /* Spacing around size buttons */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top bg-dark navbar-dark" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="index.php">ShoeARizz</a>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="men.php">MEN</a></li>
                    <li class="nav-item"><a class="nav-link" href="women.php">WOMEN</a></li>
                    <li class="nav-item"><a class="nav-link" href="kids.php">KIDS</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div style="height: 100px;"></div>
    <div class="container mt-5">
        <div class="product-gallery">
            <div class="main-image">
                <img src="<?php echo htmlspecialchars($product['image']); ?>" class="img-fluid" alt="">
            </div>
            <div class="thumbnails">
                <div class="thumbnail" onclick="changeImage('<?php echo htmlspecialchars($product['thumbnail1']); ?>')">
                    <img src="<?php echo htmlspecialchars($product['thumbnail1']); ?>" alt="Thumbnail 1">
                </div>
                <div class="thumbnail" onclick="changeImage('<?php echo htmlspecialchars($product['thumbnail2']); ?>')">
                    <img src="<?php echo htmlspecialchars($product['thumbnail2']); ?>" alt="Thumbnail 2">
                </div>
                <div class="thumbnail" onclick="changeImage('<?php echo htmlspecialchars($product['thumbnail3']); ?>')">
                    <img src="<?php echo htmlspecialchars($product['thumbnail3']); ?>" alt="Thumbnail 3">
                </div>
            </div>
        </div>
        <p class="mt-3 product-title"><?php echo htmlspecialchars($product['title']); ?></p>
        <p class="mt-3 price-tag">Price: ₱<?php echo number_format($product['price'], 2); ?></p>
        <p class="mt-3"><?php echo nl2br(htmlspecialchars($product['description'])); ?></p>

        <!-- Size Selection Buttons -->
        <div class="mt-4">
            <h5>Select Size:</h5>
            <div id="size-selection">
                <button type="button" class="btn btn-outline-secondary size-btn" onclick="selectSize('PH Size 7')">7</button>
                <button type="button" class="btn btn-outline-secondary size-btn" onclick="selectSize('PH Size 8')">8</button>
                <button type="button" class="btn btn-outline-secondary size-btn" onclick="selectSize('PH Size 9')">9</button>
                <button type="button" class="btn btn-outline-secondary size-btn" onclick="selectSize('PH Size 10')">10</button>
                <button type="button" class="btn btn-outline-secondary size-btn" onclick="selectSize('PH Size 11')">11</button>
            </div>
            <p id="selected-size" class="mt-2"></p>
        </div>

        <div class="mt-4">
            <button type="button" class="btn btn-dark add-to-cart-btn" onclick="addToCart(<?php echo $product['id']; ?>, 'kids')"  <?php echo ($product['stock'] <= 0 ? 'disabled' : ''); ?>>Add to Cart</button>
            <a href="checkout.php" class="btn btn-primary">Proceed to Checkout</a>
        </div>
    </div>

    <script src="assets/js/kids.js"></script>
    
    <script>
        function changeImage(imageSrc) {
            document.querySelector('.main-image img').src = imageSrc; // Change the main image source
        }

        function selectSize(size) {
            document.getElementById('selected-size').innerText = 'Selected Size: ' + size;
        }
    </script>


<script>
        function addToCart(productId, source) {
    fetch('add_to_cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ id: productId, source: source }),
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Product added to cart!');
        } else {
            alert('Failed to add product. Please try again.');
        }
    });
}




</body>

</html>
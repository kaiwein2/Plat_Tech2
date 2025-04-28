<?php
session_start();
include 'db.php'; // Include your database connection file

// Check if product ID is provided in the URL
if (!isset($_GET['id'])) {
    header("Location: men.php"); // Redirect to main page if no ID
    exit();
}

$productId = $_GET['id'];

// Fetch the product details from the database
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = :id");
$stmt->execute(['id' => $productId]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if the product exists
if (!$product) {
    header("Location: men.php"); // Redirect if product not found
    exit();
}

// Get the username and role from the session (if available)
$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
$role = isset($_SESSION['role']) ? ucfirst($_SESSION['role']) : null;
?>

<!DOCTYPE html>
<html lang="en">

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
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            justify-items: center;
            margin-top: 20px;
        }

        .main-image {
            grid-column: span 2;
            max-width: 600px;
            margin-bottom: 20px;
        }

        .thumbnails {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }

        .thumbnail {
            width: 100%;
            cursor: pointer;
            border: 2px solid transparent;
            transition: border-color 0.3s;
        }

        .thumbnail:hover {
            border-color: #007bff;
        }

        .thumbnail img {
            width: 100%;
            height: auto;
        }

        .size-btn {
            margin: 5px;
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
                <img src="<?php echo htmlspecialchars($product['image']); ?>" class="img-fluid" alt="Product Image" id="main-product-image"> <!-- Default main image -->
            </div>

            <div class="thumbnails">
                <!-- Displaying additional variants (thumbnails) -->
                <?php if ($product['thumbnail1']) { ?>
                    <div class="thumbnail" onclick="changeImage('<?php echo htmlspecialchars($product['thumbnail1']); ?>')">
                        <img src="<?php echo htmlspecialchars($product['thumbnail1']); ?>" alt="Thumbnail 1">
                    </div>
                <?php } ?>
                <?php if ($product['thumbnail2']) { ?>
                    <div class="thumbnail" onclick="changeImage('<?php echo htmlspecialchars($product['thumbnail2']); ?>')">
                        <img src="<?php echo htmlspecialchars($product['thumbnail2']); ?>" alt="Thumbnail 2">
                    </div>
                <?php } ?>
                <?php if ($product['thumbnail3']) { ?>
                    <div class="thumbnail" onclick="changeImage('<?php echo htmlspecialchars($product['thumbnail3']); ?>')">
                        <img src="<?php echo htmlspecialchars($product['thumbnail3']); ?>" alt="Thumbnail 3">
                    </div>
                <?php } ?>
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
            <button type="button" class="btn btn-dark add-to-cart-btn" onclick="addToCart(<?php echo $product['id']; ?>)" <?php echo ($product['stock'] <= 0 ? 'disabled' : ''); ?>>Add to Cart</button>
            <a href="checkout.php" class="btn btn-primary">Proceed to Checkout</a>
        </div>
    </div>

    <script src="assets/js/men.js"></script>
    <script>
        function changeImage(imageSrc) {
            document.getElementById('main-product-image').src = imageSrc; // Change the main image source
        }

        function selectSize(size) {
            document.getElementById('selected-size').innerText = 'Selected Size: ' + size;
        }

        function addToCart(productId) {
            // Add to cart functionality (AJAX or session-based logic)
            alert("Product " + productId + " added to cart.");
        }
    </script>
</body>

</html>

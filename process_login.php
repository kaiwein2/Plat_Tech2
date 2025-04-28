<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = ""; // Default password for XAMPP
$dbname = "user_auth";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form inputs
$input_username = $_POST['username'];
$input_password = $_POST['password']; // Plain text password

// Check if user exists in the database
$sql = "SELECT * FROM users WHERE username = '$input_username' AND password = '$input_password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Valid credentials
    $row = $result->fetch_assoc();
    session_start();
    $_SESSION['username'] = $row['username'];
    $_SESSION['role'] = $row['role'];

    // Redirect to index.php
    header("Location: index.php");
} else {
    // Invalid credentials
    echo "<script>
            alert('Invalid Username or Password');
            window.location.href='login.php';
          </script>";
}

$conn->close();
?>
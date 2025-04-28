<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_auth";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form inputs
$new_username = $_POST['username'];
$new_password = $_POST['password'];
$new_role = $_POST['role'];

// Check if username already exists
$sql_check = "SELECT * FROM users WHERE username = '$new_username'";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {
    echo "<script>
            alert('Username already exists. Please choose another.');
            window.location.href='login.php';
          </script>";
} else {
    // Insert new user into the database
    $sql_insert = "INSERT INTO users (username, password, role) VALUES ('$new_username', '$new_password', '$new_role')";
    if ($conn->query($sql_insert) === TRUE) {
        echo "<script>
                alert('Signup successful! Please log in.');
                window.location.href='login.php';
              </script>";
    } else {
        echo "Error: " . $sql_insert . "<br>" . $conn->error;
    }
}

$conn->close();
?>

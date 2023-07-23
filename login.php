<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "finance_tracker");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$username = $_POST['username'];
$password = $_POST['password'];

// Retrieve user data from the database based on username/email
$sql = "SELECT * FROM users WHERE username = '$username' OR email = '$username'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    
    // Verify the provided password with the hashed password from the database
    if (password_verify($password, $row['password'])) {
        // Start a user session and store necessary information
        session_start();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['username'] = $row['username'];
        
        // Redirect to the dashboard or desired page
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid login credentials!";
    }
} else {
    echo "User not found!";
}

$conn->close();
?>

<?php
// Database configuration
$host = "localhost"; // Change if using a different host
$username = "root"; // Change if using a different username
$password = ""; // Change if using a different password
$database = "finance_tracker"; // Change if using a different database name

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

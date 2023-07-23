<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "finance_tracker");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$goalName = $_POST['goalName'];
$targetAmount = $_POST['targetAmount'];

// Insert goal data into the database
$sql = "INSERT INTO savings_goals1 (goal_name, target_amount) VALUES ('$goalName', $targetAmount)";

if ($conn->query($sql) === TRUE) {
    echo "Goal saved successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

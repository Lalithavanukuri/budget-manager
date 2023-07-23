<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "finance_tracker");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$budgetCategory = $_POST['budgetCategory'];
$budgetAmount = $_POST['budgetAmount'];

// Insert budget data into the database
$sql = "INSERT INTO budgets (category, amount) VALUES ('$budgetCategory', $budgetAmount)";

if ($conn->query($sql) === TRUE) {
    echo "Budget saved successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

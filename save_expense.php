<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "finance_tracker");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$expenseName = $_POST['expenseName'];
$expenseCategory = $_POST['expenseCategory'];
$expenseAmount = $_POST['expenseAmount'];

// Insert expense data into the database
$sql = "INSERT INTO expenses1 (name, category, amount) VALUES ('$expenseName', '$expenseCategory', $expenseAmount)";

if ($conn->query($sql) === TRUE) {
    echo "Expense saved successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

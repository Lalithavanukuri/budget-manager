<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "finance_tracker");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query and retrieve transaction data from the database
$transactionQuery = "SELECT * FROM transactions";
$transactionResult = $conn->query($transactionQuery);

// Query and retrieve budget data from the database
$budgetQuery = "SELECT * FROM budgets";
$budgetResult = $conn->query($budgetQuery);

// Query and retrieve savings goal data from the database
$savingsGoalQuery = "SELECT * FROM savings_goals1";
$savingsGoalResult = $conn->query($savingsGoalQuery);

// Process the retrieved data and return as JSON or HTML response

$conn->close();
?>

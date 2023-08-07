<?php
session_start();

// Function to handle logout
function logout() {
    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session
    header("Location: index.html"); // Redirect to index.html after logout
    exit();
}

if (isset($_GET['logout'])) {
    logout();
}

if (!isset($_SESSION['username'])) {
    // Redirect to login page if user is not logged in
    header("Location: login.html");
    exit();
}

// Get the username from the session
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="home_style.css">
</head>

<body>
    <div class="header">
        <h1>Welcome to Your Dashboard, <?php echo htmlspecialchars($username); ?>!</h1>
        <a href="?logout=true" class="logout-button">Logout</a>
    </div>

    <div class="button-container">
        <a href="expenses.html" class="dashboard-button">Expenses</a>
        <a href="budget_goals.html" class="dashboard-button">Savings</a>

        <a href="bud_limits.html" class="dashboard-button">Set budget limits</a>
        <a href="income.html" class="dashboard-button">Income</a>
        <a href="financial_report.php" class="dashboard-button">Financial Reports</a>



    </div>
</body>

</html>

<!DOCTYPE html>
<html>
<head>
    <title>Financial Report</title>
    <!-- Add your CSS stylesheets here -->
    <link rel="stylesheet" href="fin_rep.css">
</head>
<body>

        <div class="container">
        <div class="header">
            <h1>Financial Report</h1>
        </div>

    <?php
    // Database connection
    $conn = new mysqli("localhost", "root", "", "finance_tracker");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve username from session (assuming the user is logged in)
    session_start();
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    } else {
        echo "<p>Error: User not logged in.</p>";
        exit();
    }

    // Retrieve total income for the user
    $incomeQuery = "SELECT SUM(amount) AS amount FROM income WHERE username='$username'";
    $result = $conn->query($incomeQuery);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalIncome = $row['amount'];
    } else {
        $totalIncome = 0;
    }

    // Retrieve total expenses for the user
    $expenseQuery = "SELECT SUM(expense_amount) AS total_expense FROM expenses WHERE username='$username'";
    $result = $conn->query($expenseQuery);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalExpense = $row['total_expense'];
    } else {
        $totalExpense = 0;
    }

    // Retrieve total goals amount for the user
    $goalQuery = "SELECT SUM(goalAmount) AS total_goals FROM goals WHERE username='$username'";
    $result = $conn->query($goalQuery);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalGoalsAmount = $row['total_goals'];
    } else {
        $totalGoalsAmount = 0;
    }

    // Calculate net income
    $netIncome = $totalIncome - $totalExpense;

    // Display the financial report
    echo "<p> Username: $username</p>";
    echo "<p>Total Income: $totalIncome</p>";
    echo "<p>Total Expenses: $totalExpense</p>";
    echo "<p>Net Income: $netIncome</p>";
    echo "<p>Total Goals Amount: $totalGoalsAmount</p>";
    if($totalGoalsAmount>$netIncome)
    {
        echo "<p>keep your expenses low your goal cant be reached </p>";
    }


    // Close the database connection
    $conn->close();
    ?>
    <div class="button-container">
            <a href="dashboard.php">Back to Dashboard</a>
        </div>
    </div>
</body>
</html>

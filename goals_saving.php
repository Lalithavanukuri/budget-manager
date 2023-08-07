<?php
// Start the session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    if (isset($_SESSION['username'])) {
        // Get the username from the session
        $username = $_SESSION['username'];

        // Validate and sanitize the form inputs (you can add more validation if needed)
        $goalName = htmlspecialchars($_POST['goalName']);
        $goalAmount = intval($_POST['targetamount']); // Convert to integer

        // Database connection
        $conn = new mysqli("localhost", "root", "", "finance_tracker");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert expense data into the database
        $sql = "INSERT INTO goals (username, goalname, goalAmount) VALUES ('$username', '$goalName', '$goalAmount')";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Goals saved successfully!</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        // Handle the case when the 'username' session variable is not set
        echo "Error: Username not found in session.";
    }
} else {
    // If the form is not submitted directly through the page, redirect to the homepage or dashboard
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Save Expense</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-image: url('goals_imgg.jpg');
            background-size: cover;
        }
        .container {
            margin: 0 auto;
            max-width: 500px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
        }
        .back-button {
            display: block;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        // Rest of your existing PHP code for handling the form submission and database insertion...

        // Add the button to go back to the dashboard
        echo '<a href="dashboard.php" class="back-button">Go Back to Dashboard</a>';
        ?>
    </div>
</body>

</html>

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
        $expenseName = htmlspecialchars($_POST['expenseName']);
        $expenseCategory = htmlspecialchars($_POST['expenseCategory']);
        $expenseAmount = intval($_POST['expenseAmount']); // Convert to integer

        // Database connection
        $conn = new mysqli("localhost", "root", "", "finance_tracker");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert expense data into the database
        $sql = "INSERT INTO expenses (username, expense_name, expense_category, expense_amount) VALUES ('$username', '$expenseName', '$expenseCategory', $expenseAmount)";

        $expenseLimit = "SELECT SUM(budget_Limit) AS total_expense_limit FROM budgetlimit WHERE username='$username' AND BudgetLimitname='$expenseCategory' ";

        $expamut="SELECT SUM(expense_amount) AS expamut FROM expenses Where username='$username' and expense_category='$expenseCategory'";

        
        if ($conn->query($sql) === TRUE) {
            echo "<p>Expense saved successfully!</p>";


            $result = $conn->query($expamut);
            $result_exp_lmt = $conn->query($expenseLimit);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $expamut = $row['expamut'];
                echo "<p> your expenses till now : $expamut </p>";
            


            if (!$result_exp_lmt) {
                echo "Query failed: " . $conn->error;
            }

            if (is_object($result_exp_lmt)) {
                if ($result_exp_lmt->num_rows > 0) {
                    $row = $result_exp_lmt->fetch_assoc();
                    $expamut_limit = $row['total_expense_limit'];
                    echo "<p> your limits on this category is : $expamut_limit </p>";

                    if($expamut<$expenseLimit){
                        echo "<p>Your expenses have reached the budget limit for this category. Please consider saving income.</p>";                    }
                    else{
                        echo "<p> under budget limits only </p>";
                    }
                }
                else {
                    echo "<p> no budget limits </p>";
                }
            } else {
                echo "Query did not return a valid result.";
            }
        }  
            
        }
         
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        // Handle the case when the 'username' session variable is not set
        echo "Error: Username not found in session.";
    }
}
    else {
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
            background-image: url('expenses_img.jpg');
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



    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Retrieve form data
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Database connection
        $conn = new mysqli("localhost", "root", "", "finance_tracker");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch the user record from the database based on the provided username
        $sql = "SELECT * FROM register WHERE username = '$username'";
        $result = $conn->query($sql);

        if ($result->num_rows === 1) {
            // User found, verify the password
            $row = $result->fetch_assoc();

            if (password_verify($password, $row['password'])) {
                // Password matches, login successful
                session_start();
    $_SESSION['username'] = $username;

    // Redirect the user to the dashboard page after successful login
    header("Location: dashboard.php");
    exit();
               
                // Add further logic or redirect the user to the home page
            } else {
                echo "Stored Hashed Password: " . $row['password'];

                echo "<p>Invalid password. Please try again.</p>";
            }
        } else {
            echo "<p>User not found. Please check your username.</p>";
        }

        $conn->close();
    }
    ?>

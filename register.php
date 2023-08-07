<?php

// Database connection
$conn = new mysqli("localhost", "root", "", "finance_tracker");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$gen = $_POST['gender'];
$age = $_POST['age'];
$username = $_POST['username'];
$email = $_POST['email'];

$password = $_POST['password'];



// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert user data into the database
$sql = "INSERT INTO register (name,mobile,gen,age,username, email, password) VALUES ('$name', '$mobile', '$gen', '$age', '$username', '$email', '$hashedPassword')";

if ($conn->query($sql) === TRUE) {
    header("Location: reg_success.html");
    exit(); // Make sure to add exit() after header() to terminate the script
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


$conn->close();
?>

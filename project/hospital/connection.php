<?php
$servername = "localhost"; // Database server (usually localhost)
$username = "root";        // Your MySQL username (default is root)
$password = "";            // Your MySQL password (empty for local setups like XAMPP)
$database = "hospital_db"; // The name of your database

// Establish connection to the database
$conn = new mysqli($servername, $username, $password, $database);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); // If connection fails
}
?>

<?php
$servername = "localhost";
$username = "root"; 
$password = "";
$database = "hospital";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connection successful";
}

// Collect data from the POST request and sanitize/validate inputs
$name = $_POST['name'];
$age = intval($_POST['age']);  // Convert age to integer
$contact = $_POST['contact'];

// Ensure 'age' is a valid integer
if (!is_numeric($age)) {
    die("Error: Age must be a valid integer.");
}

// Prepare the SQL query with table name 'patient' (as you renamed it)
$query = "INSERT INTO patient (name, age, contact) VALUES ('$name', $age, '$contact')";

// Execute the query
if ($conn->query($query) === TRUE) {
    echo "New record created successfully";
    // Redirect to the dashboard page
    header('Location: dashboard.php');
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>

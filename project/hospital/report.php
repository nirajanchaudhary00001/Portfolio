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
}

echo "Connection successful.<br>"; // Debugging line

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<pre>";
    print_r($_POST); // Debugging: Show received form data
    echo "</pre>";

    $report_id = $_POST['report_id'] ?? '';  // Report ID is no longer needed
    $patient_name = $_POST['patient_name'] ?? '';
    $date = $_POST['date'] ?? '';
    $doctors = $_POST['doctors'] ?? '';
    $status = $_POST['status'] ?? '';

    // Check if any field is empty
    if (empty($patient_name) || empty($date) || empty($doctors) || empty($status)) {
        die("Error: All fields are required!");
    }

    // Prepare SQL query using prepared statements (to prevent SQL injection)
    $query = "INSERT INTO reports (patient_name, date, doctors, status) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $patient_name, $date, $doctors, $status);

    if ($stmt->execute()) {
        echo "Report added successfully!";
        header('Location: dashboard.php');
        exit();
    } else {
        echo "Error inserting report: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

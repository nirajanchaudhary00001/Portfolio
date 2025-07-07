<?php
session_start(); // Start a session to store the login status

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "hospital";

$conn = new mysqli($servername, $username, $password, $database);

// Check for connection error
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize error variable
$error = '';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get user input
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // Prepare the SQL query
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $input_username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the username exists in the database
    if ($result->num_rows > 0) {
        // Fetch the user data from the database
        $row = $result->fetch_assoc();

        // Check if the entered password matches the stored password
        if ($input_username == $row['username'] && $input_password == $row['password']) {
            // Login successful
            $_SESSION['username'] = $row['username']; // Store the username in session
            header('Location: dashboard.php'); // Redirect to dashboard
            exit();
        } else {
            // Incorrect password
            $error = 'Incorrect password!';
        }
    } else {
        // Username not found
        $error = 'Username not found!';
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- For icons -->
</head>
<body>

<h1>Welcome to HospitaL Management System</h1>


    <div class="background-image">
        <div class="login-container">
            
            <h2>Login to Bunny's Hospital</h2>
            
            <!-- Show error message if login fails -->
        <?php if (!empty($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

            <form action="login.php" method="POST">
                <div class="input-wrapper">
                    <input type="text" name="username" placeholder="Username" required>
                
                </div>
                <div class="input-wrapper">
                    <input type="password" name="password" placeholder="Password" required>
                   
                </div>
                <button type="submit" class="submit-btn">Login</button>
            </form>

            
    </div>
            </div>
</body>
</html>

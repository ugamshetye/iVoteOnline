<!DOCTYPE html>
<html lang="en">
<?php
// Start a session to manage user authentication
session_start();

// Database connection details
$servername = "localhost";  // Change if not using localhost
$username_db = "root";      // Database username (change as needed)
$password_db = "";          // Database password (change as needed)
$dbname = "ivoteonline";    // Database name

// Create a connection
$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Check if connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the form data (username and password)
$username = $_POST['username'];
$password = $_POST['password'];

// Sanitize input to prevent SQL injection
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

// SQL query to check if the provided username and password are correct
$sql = "SELECT * FROM admin_login WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

// Check if the query returned any rows
if ($result->num_rows > 0) {
    // If a matching user is found, start the session and redirect to the admin dashboard
    $_SESSION['admin_logged_in'] = true;
    header("Location: admindashboard.html");
} else {
    // If no match is found, redirect back to the login page with an error message
    echo "<script>alert('Invalid Username or Password');window.location.href='admin-login.html';</script>";
}

// Close the database connection
$conn->close();
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            text-align: center;
        }

        .login-form {
            display: flex;
            flex-direction: column;
        }

        .login-form label {
            margin: 10px 0 5px;
        }

        .login-form input {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .options {
            margin-top: 20px;
        }

        .option-button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .option-button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>ADMIN ACCESS GRANTED</h1>
        <div class="options">
            <h2>Actions</h2>
            <button class="option-button" onclick="location.href='add_voter.html'">Add Voter</button>
            <button class="option-button" onclick="location.href='add_candidate.html'">Add Candidate</button>
            <button class="option-button" onclick="location.href='reset.php'">Reset cadidate data</button>
        </div>
    </div>
</body>
</html>

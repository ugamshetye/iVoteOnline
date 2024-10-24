<!DOCTYPE html>
<html lang="en">
<?php
// Start the session
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    
    // Database connection details
    $servername = "localhost";  // Change if not using localhost
    $username_db = "root";      // Database username (change as needed)
    $password_db = "";          // Database password (change as needed)
    $dbname = "ivoteonline";    // Database name

    // Create a connection
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $username = $_POST['username'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Sanitize input to prevent SQL injection
    $username = mysqli_real_escape_string($conn, $username);
    $current_password = mysqli_real_escape_string($conn, $current_password);
    $new_password = mysqli_real_escape_string($conn, $new_password);
    $confirm_password = mysqli_real_escape_string($conn, $confirm_password);

    // Check if the new password and confirm password match
    if ($new_password !== $confirm_password) {
        echo "<script>alert('New password and Confirm password do not match.');window.location.href='admin_login.html';</script>";
        exit();
    }

    // SQL query to get the current password for the given username
    $sql = "SELECT * FROM admin_login WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify the current password
        if ($current_password==$row['password']) {
            // If current password matches, update to the new password

            // Hash the new password for security
            //$new_password_hashed = password_hash($new_password, PASSWORD_DEFAULT);

            // SQL query to update the password
            $update_sql = "UPDATE admin_login SET password='$new_password' WHERE username='$username'";

            if ($conn->query($update_sql) === TRUE) {
                echo "<script>alert('Password updated successfully.');window.location.href='admin-login.html';</script>";
            } else {
                echo "<script>alert('Error updating password.');window.location.href='chg_admin_pass.php';</script>";
            }
        } else {
            echo "<script>alert('Current password is incorrect.');window.location.href='chg_admin_pass.php';</script>";
        }
    } else {
        echo "<script>alert('Username not found.');window.location.href='admin_login.html';</script>";
    }

    // Close the connection
    $conn->close();
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login & Change Password</title>
    <link rel="stylesheet" href="chg_admin_pass_style.css"> 
</head>
<body>
   
    <div class="change-password-container">
        <h2>Change Password</h2>
        <form action="chg_admin_pass.php" method="POST">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>

    <label for="current_password">Current Password:</label>
    <input type="password" id="current_password" name="current_password" required>

    <label for="new_password">New Password:</label>
    <input type="password" id="new_password" name="new_password" required>

    <label for="confirm_password">Confirm New Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" required>

    <input type="submit" name="submit" value="Change Password">
</form>

    </div>
</body>
</html>
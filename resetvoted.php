<?php
// Database connection
$servername = "localhost"; // Change this if needed
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "ivoteonline";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Execute update when the page is accessed
$sql = "UPDATE voter_login SET voted = 'n'";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('All voters status set to not voted.');window.location.href='admindashboard.html';</script>";
} else {
    echo "<script>alert('Error updating voting status.');window.location.href='admindashboard.html';</script>";

}

$conn->close();
?>


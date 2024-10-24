<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$database = "ivoteonline";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to delete all rows in the candidate table
$sql = "DELETE FROM candidate";

// Execute the deletion query
if ($conn->query($sql) === TRUE) {
    // Reset the auto-increment value of candidate_id to 1
    $resetAutoIncrement = "ALTER TABLE candidate AUTO_INCREMENT = 1";
    if ($conn->query($resetAutoIncrement) === TRUE) {
        echo "<script>alert('All records deleted and candidate_id reset successfully.');window.location.href='admindashboard.html';</script>";
    } else {
        echo "Error resetting candidate_id: " . $conn->error;
    }
} else {
    echo "Error deleting records: " . $conn->error;
}

// Close the database connection
$conn->close();
?>

<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ivoteonline";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch form data
$voter_id = $_POST['voter_id'];
$name = $_POST['name'];
$age = $_POST['age'];
$password = $_POST['password'];

// Prepare SQL query to insert data into the vote_login table
$sql = "INSERT INTO voter_login (voter_id, name, age, password) VALUES ('$voter_id', '$name', '$age', '$password')";

// Execute the query and check for errors
if ($conn->query($sql) === TRUE) {
    echo "<script>
        alert('Voter registered successfully!');
        window.location.href='admindashboard.html';
    </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>

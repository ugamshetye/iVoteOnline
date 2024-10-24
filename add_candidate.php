<?php
// Database connection details
$host = 'localhost';
$db = 'ivoteonline';
$user = 'root'; // default XAMPP username
$pass = '';     // default XAMPP password is empty

// Create connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = $_POST['name'];
    $age = $_POST['age'];
    $department = $_POST['department'] ;
    $year = $_POST['year'];
    $designation = $_POST['designation'];
    $party = $_POST['party'];
    
    // Prepare SQL statement
    $sql = "INSERT INTO candidate (c_name, age, department, year, designation, panel) VALUES (?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind the parameters
    $stmt->bind_param("sissss", $name, $age, $department, $year, $designation, $party);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>alert('Candidate added successfully!');window.location.href='admindashboard.html';</script>";
    } else {
        echo "<script>alert('Error: ')</script>" . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>

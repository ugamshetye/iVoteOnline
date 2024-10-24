<!DOCTYPE html>
<html lang="en">
<?php
// Database connection parameters
$servername = "localhost";  // Server (usually 'localhost')
$username = "root";         // Database username
$password = "";             // Database password (default is empty for XAMPP)
$dbname = "ivoteonline";    // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $voter_id = $_POST['voter-id'];
    $password = $_POST['password'];

    // First query to check if the voter has already voted
    $sql = "SELECT voted FROM voter_login WHERE voter_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $voter_id); // Use 's' for string type voter_id
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a result was returned
    if ($result->num_rows > 0) {
        // Fetch the 'voted' status
        $row = $result->fetch_assoc();
        
        // Check if the user has not voted (assuming 'n' means not voted)
        if ($row['voted'] == 'n') {
            // Prepare SQL query to fetch voter based on the voter_id
            $sql = "SELECT * FROM voter_login WHERE voter_id = ?";
            $stmt = $conn->prepare($sql);  // Prepare the SQL query
            $stmt->bind_param("s", $voter_id);  // Bind voter_id as a string ("s")
            $stmt->execute();  // Execute the query
            $result = $stmt->get_result();  // Get the result set

            // Check if the voter ID exists in the database
            if ($result->num_rows > 0) {
                // Fetch the voter details
                $row = $result->fetch_assoc();

                // Verify the password
                session_start();  // Start the session

if ($password === $row['password']) {
    // Password matches, start session and store voter ID
    $_SESSION['voter_id'] = $voter_id;
    echo "<script>alert('Login successful! Welcome, " . htmlspecialchars($row['name']) . "');window.location.href='voting_page.php';</script>";
} else {
    // Invalid password
    echo "<script>alert('Invalid password.');window.location.href='voter-login.php';</script>";
}

            } else {
                // Invalid Voter ID
                echo "<script>alert('Invalid Voter ID.');window.location.href='voter-login.php';</script>";
            }
        } else {
            // If the user has already voted
            echo "<script>alert('You have already cast your vote, Thank You');window.location.href='voter-login.php';</script>";
        }
    } else {
        echo "<script>alert('Invalid Voter ID.');window.location.href='voter-login.php';</script>";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="onlylogo.png">
    <title>Voter Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            width: 30%;
            margin: 100px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .navbar {
            position:fixed;
            top:0;
            left:0;
            width:100%;
            background-color: #333;
            overflow: hidden;
        }
        .navbar a {
            float: right;
            display: block;
            color: #fff;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
    </style>
</head>
<body>
<!-- Navigation Bar -->
<div class="navbar">
    <img name="logoname" src="logoname.png" height="40px" width="150px">
    <a href="login.html">Login</a>
    <a href="index.html">Home</a>
</div>
    <div class="container">
        <h1>Voter Login</h1>
        <form action="voter-login.php" method="POST">
            <label for="voter-id">Voter ID</label>
            <input type="text" id="voter-id" name="voter-id" placeholder="Enter Voter ID" required>
            
            <label for="voter-password">Password</label>
            <input type="password" id="voter-password" name="password" placeholder="Enter Password" required>
            
            <button type="submit">Login</button>
            <br><br><a href="chngvoterpass.php">Change password</a>
        </form>
    </div>

</body>
</html>

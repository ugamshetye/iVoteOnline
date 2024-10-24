<?php
// Connect to the MySQL database
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

// If form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['candidate'])) {
        $selected_candidate_id = $_POST['candidate'];

        // Update votes for the selected candidate
        $update_query = "UPDATE candidate SET no_of_votes = no_of_votes + 1 WHERE candidate_id = ?";
        $stmt = $conn->prepare($update_query);
        $stmt->bind_param("i", $selected_candidate_id);

       if ($stmt->execute()) {
    echo '<p class="success-message">Your vote has been cast successfully!</p><br><br>To cast vote for other designations <a href="voting_page.php">Return to voting page</a>';
} else {
    echo '<p class="error-message">Error casting vote. Please try again.</p>';
}


        $stmt->close();

        // Disable further voting by setting a session variable
        session_start();
        $_SESSION['voted'] = true;
    }
}

// Fetch all candidates from the database
$sql = "SELECT * FROM candidate where designation='general-secretary'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote for Your Candidate</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            text-align: center;
        }
        .container {
            width: 60%;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
        }
        form {
            margin-top: 20px;
        }
        .candidate {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ddd;
            font-size: 18px;
        }
        .submit-button {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            margin-top: 20px;
        }
        .submit-button:hover {
            background-color: #218838;
        }
        .success-message, .error-message {
            color: green;
            margin: 10px 0;
            font-size:40px;
        }
        .error-message {
            color: red;
        }
    </style>
</head>
<body>

<div class="container">

    <?php
    //session_start();
    if (isset($_SESSION['voted']) && $_SESSION['voted']) {
        echo "<p>You have already voted. Thank you for participating!</p>";
    } else {
    ?>
    <form method="POST" action="">

        <?php
        // Display all candidates as radio buttons with detailed information
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="candidate">';
                echo '<span><strong>' . $row['c_name'] . '</strong> (' . $row['age'] . ' years, ' .$row['year']. ' ' .$row['department']. ', ' . $row['designation'] . ', Panel: ' . $row['panel'] . ')</span>';
                echo '<input type="radio" name="candidate" value="' . $row['candidate_id'] . '">';
                echo '</div>';
            }
        } else {
            echo "<p>No candidates available.</p>";
        }
        ?>

        <input type="submit" class="submit-button" value="Vote Now">
    </form>
    <?php
    }
    ?>

</div>

</body>
</html>

<?php
$conn->close();
?>

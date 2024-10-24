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

// Fetch voters whose voted status is 'n'
$sql_n = "SELECT voter_id, name, age FROM voter_login WHERE voted = 'n'";
$result_n = $conn->query($sql_n);

// Fetch voters whose voted status is 'y'
$sql_y = "SELECT voter_id, name, age FROM voter_login WHERE voted = 'y'";
$result_y = $conn->query($sql_y);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voter Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            background-color: white;
            padding: 100px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }

        h2, h3 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        a{
            text-align:center;
        }

        .btn-admin {
            float:right;
            display: inline-block;
            padding: 10px 15px;
            margin-top: 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            text-decoration: none;
        }
        .btn-admin:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Voter Status</h2>
        
        <h3>Voters Who Have Not Voted (voted = 'n')</h3>
        <?php if ($result_n->num_rows > 0): ?>
            <table>
                <tr>
                    <th>Voter ID</th>
                    <th>Name</th>
                    <th>Age</th>
                </tr>
                <?php while ($row = $result_n->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['voter_id']); ?></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['age']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>No voters found who have not voted.</p>
        <?php endif; ?>

        <h3>Voters Who Have Voted (voted = 'y')</h3>
        <?php if ($result_y->num_rows > 0): ?>
            <table>
                <tr>
                    <th>Voter ID</th>
                    <th>Name</th>
                    <th>Age</th>
                </tr>
                <?php while ($row = $result_y->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['voter_id']); ?></td>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['age']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <p>No voters found who have voted.</p>
        <?php endif; ?>
        
        <a href="admindashboard.html" class="btn-admin">Return to admin dashboard</a>
    </div>
</body>
</html>

<?php
$conn->close();
?>

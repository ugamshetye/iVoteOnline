<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate List</title>
   
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        table th {
            background-color: #4CAF50;
            color: white;
        }
        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        table tr:hover {
            background-color: #ddd;
        }
        .btn-refresh {
            display: inline-block;
            padding: 10px 15px;
            margin-top: 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            text-decoration: none;
        }
        .btn-refresh:hover {
            background-color: #45a049;
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
    <h1>RESULT<br></h1>
    <h1>General secretary</h1>

    <?php
    // Database connection details
    $servername = "localhost";  // Change this if your server is different
    $username = "root";         // Change to your database username
    $password = "";             // Change to your database password
    $dbname = "ivoteonline";    // Name of your database

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to fetch candidate data
    $sql = "SELECT candidate_id, c_name, age, department, year, designation, panel, no_of_votes 
        FROM candidate 
        WHERE designation = 'general-secretary' 
        ORDER BY no_of_votes DESC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Candidate ID</th><th>Name</th><th>Age</th><th>Year</th><th>Department</th><th>Designation</th><th>Panel</th><th>No. of Votes</th></tr>";
        
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["candidate_id"] . "</td>
                    <td>" . $row["c_name"] . "</td>
                    <td>" . $row["age"] . "</td>
                    <td>" . $row["year"] . "</td>
                    <td>" . $row["department"] . "</td>
                    <td>" . $row["designation"] . "</td>
                    <td>" . $row["panel"] . "</td>
                    <td>" . ($row["no_of_votes"] ? $row["no_of_votes"] : "N/A") . "</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No candidates found.</p>";
    }
    ?>
    <br><h1>Cultural Secretary</h1>
    <?php
    // SQL query to fetch candidate data
    $sql = "SELECT candidate_id, c_name, age, department, year,  designation, panel, no_of_votes 
        FROM candidate 
        WHERE designation = 'cultural-secretary' 
        ORDER BY no_of_votes DESC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Candidate ID</th><th>Name</th><th>Age</th><th>Year</th><th>Department</th><th>Designation</th><th>Panel</th><th>No. of Votes</th></tr>";
        
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["candidate_id"] . "</td>
                    <td>" . $row["c_name"] . "</td>
                    <td>" . $row["age"] . "</td>
                     <td>" . $row["year"] . "</td>
                    <td>" . $row["department"] . "</td>
                    <td>" . $row["designation"] . "</td>
                    <td>" . $row["panel"] . "</td>
                    <td>" . ($row["no_of_votes"] ? $row["no_of_votes"] : "N/A") . "</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No candidates found.</p>";
    }
    ?>

<br><h1>Sports Secretary</h1>
    <?php
    // SQL query to fetch candidate data
    $sql = "SELECT candidate_id, c_name, age, department, year,  designation, panel, no_of_votes 
        FROM candidate 
        WHERE designation = 'sports-secretary' 
        ORDER BY no_of_votes DESC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Candidate ID</th><th>Name</th><th>Age</th><th>Year</th><th>Department</th><th>Designation</th><th>Panel</th><th>No. of Votes</th></tr>";
        
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["candidate_id"] . "</td>
                    <td>" . $row["c_name"] . "</td>
                    <td>" . $row["age"] . "</td>
                     <td>" . $row["year"] . "</td>
                    <td>" . $row["department"] . "</td>
                    <td>" . $row["designation"] . "</td>
                    <td>" . $row["panel"] . "</td>
                    <td>" . ($row["no_of_votes"] ? $row["no_of_votes"] : "N/A") . "</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No candidates found.</p>";
    }
    ?>
    <br><h1>Magazine Secretary</h1>
    <?php
    // SQL query to fetch candidate data
    $sql = "SELECT candidate_id, c_name, age, department, year,  designation, panel, no_of_votes 
        FROM candidate 
        WHERE designation = 'magazine-secretary' 
        ORDER BY no_of_votes DESC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Candidate ID</th><th>Name</th><th>Age</th><th>Year</th><th>Department</th><th>Designation</th><th>Panel</th><th>No. of Votes</th></tr>";
        
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["candidate_id"] . "</td>
                    <td>" . $row["c_name"] . "</td>
                    <td>" . $row["age"] . "</td>
                     <td>" . $row["year"] . "</td>
                    <td>" . $row["department"] . "</td>
                    <td>" . $row["designation"] . "</td>
                    <td>" . $row["panel"] . "</td>
                    <td>" . ($row["no_of_votes"] ? $row["no_of_votes"] : "N/A") . "</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No candidates found.</p>";
    }
    ?>

<?php
    // Close the connection
    $conn->close();
    ?>

    <a href="result.php" class="btn-refresh">Refresh</a>
    <a href="admindashboard.html" class="btn-admin">Return to admin dashboard</a>

</div>

</body>
</html>

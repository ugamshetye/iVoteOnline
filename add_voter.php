<!DOCTYPE html>
<html lang="en">
<head>
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #111224;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.container {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px 0px #000;
    width: 300px;
}

h2 {
    text-align: center;
    color: #333;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin: 10px 0 5px 0;
    font-weight: bold;
}

input[type="text"], input[type="password"], input[type="number"] {
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
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
        a{
            text-align:center;
        }
    </style>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voter Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navigation Bar -->
    <div class="navbar">
        <img name="logoname" src="logoname.png" height="40px" width="150px">
        <a href="login.html">Login</a>
        <a href="index.html">Home</a>
    </div>

    <div class="container">
        <h2>Voter Registration Form</h2>
        <form action="voter_register.php" method="POST">
            <label for="voter_id">Voter ID:</label>
            <input type="text" id="voter_id" name="voter_id" required><br>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="age">Age:</label>
            <input type="number" id="age" name="age" required min="16"><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>

            <input type="submit" value="Register">

            <br><br><a href="admindashboard.html">Return to admin dashboard</a>
        </form>
    </div>
</body>
</html>


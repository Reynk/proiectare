<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eventsdb";

/* instantiate a new database connection */
$dbConnection = mysqli_connect("localhost", "root", "", "eventsdb", 3306);
/* define the sql query and then use it to perform a query and assign the result */
$sql = "SELECT * FROM events";
$result = mysqli_query($dbConnection, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Event Tickets</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <nav>
        <ul class="nav-links">
            <li><a href="mainPage.php">Home</a></li>
            <li><a href="tickets.php">Tickets</a></li>
            <li><a href="order.php">Order history</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
        <ul class="login">
            <h2>Login</h2>
            <form action="login.php" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username"><br><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password"><br><br>
                <input type="submit" value="Login">
            </form>
        </ul>
        <div id="registerPopup" class="popup">
            <form action="register.php" method="post">
                <h2>Register</h2>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username"><br><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password"><br><br>
                <input type="submit" value="Register">
            </form>
        </div>
    </nav>
</header>
<main>
    <h1>CONTACT PAGE</h1>
</main>
<footer class="footer">
    <p>&copy; 2023 RRZ Tickets</p>
</footer>

</body>
</html>';

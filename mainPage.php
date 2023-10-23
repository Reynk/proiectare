<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";

/* instantiate a new database connection */
$dbConnection = mysqli_connect("localhost", "root", "", "eventsdb", 3306);

$sql = "SELECT * FROM `admins` WHERE username = 'admin'";
$result = mysqli_query($dbConnection, $sql);
$row = mysqli_fetch_assoc($result);

echo $row["username"];

echo '<!DOCTYPE html>
<html lang="en">
<head>
    <title>Event Tickets</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#">Tickets</a></li>
                <li><a href="#">Contact</a></li>
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
        </nav>
    </header>
    <main>
        <h1>Welcome to RRZ Tickets</h1>
        <p>Find and purchase tickets for your favorite events.</p>
        <div class="event-list">
            <!-- Event cards go here -->
        </div>
    </main>
    <footer>
        <p>&copy; 2023 RRZ Tickets</p>
    </footer>
    
</body>
</html>';
?>
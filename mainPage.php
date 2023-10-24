<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eventsdb";

/* instantiate a new database connection */
$dbConnection = mysqli_connect("localhost", "root", "", "eventsdb", 3306);

$mysqli = new mysqli("localhost", "root", "", "eventsdb", 3306);

$sql = "SELECT * FROM `admins` WHERE username = 'admin'";
$result = mysqli_query($dbConnection, $sql);
$row = mysqli_fetch_assoc($result);

echo $row["username"];

$sql = "SELECT * FROM events";
$result = mysqli_query($dbConnection, $sql);


// Your database connection code here

$sql = "SELECT * FROM events";

$result = mysqli_query($dbConnection, $sql);
$row = mysqli_fetch_assoc($result);



?>

<!DOCTYPE html>
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
            <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $title = $row['title'];
                    $date = $row['date'];
                    $about = $row['about'];
                    $description = $row['description'];
                    echo '<div class="event-card">';
                    echo "<h2>$title</h2>";
                    echo "<p>Date: $date</p>";
                    echo "<p>About: $about</p>";
                    echo "<p>Description: $description</p>";
                    echo '</div>';
                }
            ?>
        </div>
    </main>
    <footer>
        <p>&copy; 2023 RRZ Tickets</p>
    </footer>

</body>
</html>';

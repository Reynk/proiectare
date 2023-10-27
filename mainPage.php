<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eventsdb";

/* instantiate a new database connection */
$dbConnection = mysqli_connect("localhost", "root", "", "eventsdb", 3306);

//$mysqli = new mysqli("localhost", "root", "", "eventsdb", 3306);

//$sql = "SELECT * FROM `admins` WHERE username = 'admin'";
//$result = mysqli_query($dbConnection, $sql);
//$row = mysqli_fetch_assoc($result);
//
//echo $row["username"];

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
                <li><a href="#">Acasa</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#">Bilete</a></li>
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
        <div class="bilete-button"><p>Find and purchase tickets for your favorite events.</p><div>
        <div class="event-list">
            <?php
                /* while there are events in the database to be displayed
                    iterate and show the events */
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

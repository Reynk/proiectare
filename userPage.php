<!-- /**
 * This file is the user page that displays a list of events and allows users to purchase tickets.
 * It retrieves event data from the database and dynamically generates HTML to display the events.
 * Users can also log in or log out using the provided form.
 */ -->

<?php
session_start();
include 'dbConnect.php';

/* define the sql query and then use it to perform a query and assign the result */
$sql = "SELECT * FROM events";
$result = mysqli_query($dbConnection, $sql);


//$mysqli = new mysqli("localhost", "root", "", "eventsdb", 3306);

//$sql = "SELECT * FROM `admins` WHERE username = 'admin'";
//$result = mysqli_query($dbConnection, $sql);
//$row = mysqli_fetch_assoc($result);
//
//echo $row["username"];

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
                <li><a href="userPage.php">Tickets</a></li>
                <li><a href="order.php">Order history</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
            <ul class="logout">
                <?php if(isset($_SESSION['username'])) { ?>
                    <form action="logout.php" method="post">
                        <input type="submit" value="Logout" class="custom-button">
                    </form>
                <?php } else { ?>
                <h2>Login</h2>
                    <form action="login.php" method="post">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username"><br><br>
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password"><br><br>
                        <input type="submit" value="Login" class="custom-button">
                    </form>
                <?php } ?>
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
                    echo '<table>';
                    echo '<tr><th>Title</th><th>Date</th><th>About</th><th>Description</th><th></th></tr>';
                    while ($row = mysqli_fetch_assoc($result)) {
                        $title = $row['title'];
                        $date = $row['date'];
                        $about = $row['about'];
                        $description = $row['description'];
                        echo '<tr>';
                        echo "<td>$title</td>";
                        echo "<td>$date</td>";
                        echo "<td>$about</td>";
                        echo "<td>$description</td>";
                        echo '<td><button class="buy-ticket-button">Buy Ticket</button></td>';
                        echo '</tr>';
                    }
                    echo '</table>';

            ?>
        </div>
    </main>
    <footer>
        <div class="footer">
            <p id="p1">&copy; 2023 RRZ Tickets</p>
        </div>
    </footer>

</body>
</html>';

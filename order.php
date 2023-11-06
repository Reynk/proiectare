<?php
session_start();
include 'dbConnect.php'; 
/* define the sql query and then use it to perform a query and assign the result */
$sql = "SELECT * FROM orders WHERE username = '$_SESSION[username]'";
$result = mysqli_query($dbConnection, $sql);
echo $sql;
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
    <h1>ORDER PAGE</h1>
    <!-- for some reason the event list class messes up the table structure here -->
    <div class="event-list">
            <?php
                /* while there are events in the database to be displayed
                    iterate and show the events */
                while ($row = mysqli_fetch_assoc($result)) {
                    $event_title = $row['event_title'];
                    // echo $event_title;
                    $price = $row['price'];
                    $size = $row['size'];
                    echo '<table>';
                    echo '<tr><th>Event Name</th><th>Price</th><th>Size</th><th></th></tr>';
                    while ($row = mysqli_fetch_assoc($result)) {
                        $event_title = $row['event_title'];
                        $price = $row['price'];
                        $size = $row['size']; 
                        echo '<tr>';
                        echo "<td>$event_title</td>";
                        echo "<td>$price</td>";
                        echo "<td>$size</td>";
                        echo '</tr>';
                    }
                    echo '</table>';
                }
            ?>
        </div>
</main>
<footer class="footer">
    <p>&copy; 2023 RRZ Tickets</p>
</footer>

</body>
</html>';

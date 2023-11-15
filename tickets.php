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
                <li><a href="tickets.php">Tickets</a></li>
                <?php if(isset($_SESSION['username'])) { ?>
                    <li><a href="order.php">Order history</a></li>
                <?php } ?>
                <li><a href="contact.php">Contact</a></li>
            </ul>
            <ul class="logout">
                <?php if (isset($_SESSION['username'])) { ?>
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
                </ul>
                <div id="registerPopup" class="popup">
                    <form action="register.php" method="post">
                        <h2>Register</h2>
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username"><br><br>
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password"><br><br>
                        <input type="submit" value="Register" class="custom-button">
                    </form>
                </div>
            <?php } ?>
        </nav>
    </header>
    <main>
        <h1>Upcoming events</h1>
        <div class="event-list">
            <?php
            /* while there are events in the database to be displayed
                iterate and show the events */
            echo '<table>';
            if (isset($_SESSION['username'])) {
                echo '<tr><th>Image</th><th>Title</th><th>Date</th><th>About</th><th>Description</th><th>Price</th><th></th></tr>';
            } else 
            echo '<tr><th>Image</th><th>Title</th><th>Date</th><th>About</th><th>Description</th><th>Price</th></tr>';
            while ($row = mysqli_fetch_assoc($result)) {
                $image = $row['image'];
                $title = $row['title'];
                $date = $row['date'];
                $about = $row['about'];
                $description = $row['description'];
                $price = $row['price'];
                echo '<tr>';
                echo '<td><img src="data:image/jpeg;base64,' . base64_encode($image) . '" alt="logo" class="event-image"></td>';
                echo "<td>$title</td>";
                echo "<td>$date</td>";
                echo "<td>$about</td>";
                echo "<td>$description</td>";
                echo "<td>$price</td>";
                if (isset($_SESSION['username'])) {
                    echo '<td>';
                    echo '<div class="buy-ticket">';
                    echo '<form action="buyTicket.php" method="POST">';
                    echo '<select name="size">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>    
                            <option value="8">8</option>
                            <option value="9">9</option>
                        </select>';
                    echo '<input type="hidden" name="username" value="' . $_SESSION['username'] . '">';
                    echo '<input type="hidden" name="event_title" value="' . $row['title'] . '">';
                    echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                    echo '<input type="hidden" name="price" value="' . $row['price'] . '">';
                    echo '<button type="submit" class="custom-button">Buy Ticket</button>';
                    echo '</form>';
                    echo '</div>';
                    echo '</td>';
                }
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
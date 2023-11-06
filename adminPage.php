<?php
session_start();
/* instantiate a new database connection */
include 'dbConnect.php';

/* define the sql query and then use it to perform a query and assign the result */
$sql = "SELECT * FROM events";
$result = mysqli_query($dbConnection, $sql);
echo $_SESSION["username"];
echo $_SESSION["password"];
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
                <li><a href="logout.php">LOGOUT</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Admin event administration</h1>
        <div class="bilete-button"><p>Create update and delete events.</p><div>
        <ul class="login">
    <h2>Create new event</h2>
    <form action="createEvent.php" method="post">
        <label for="id">id:</label>
        <input type="text" id="id" name="id"><br><br>
        <label for="title">title:</label>
        <input type="text" id="title" name="title"><br><br>
        <label for="date">date:</label>
        <input type="date" value="2023-01-01" min="2023-01-01" max="2033-12-31" id="date" name="date"><br><br>
        <label for="about">about:</label>
        <input type="text" id="about" name="about"><br><br>
        <label for="description">description:</label>
        <input type="text" id="description" name="description"><br><br>
        <input type="submit" value="Create new event">
    </form>
            </ul>
        <div class="event-list">
            <?php
                /* while there are events in the database to be displayed
                    iterate and show the events */
                while ($row = mysqli_fetch_assoc($result)) {
                    $title = $row['title'];
                    $date = $row['date'];
                    $about = $row['about'];
                    $description = $row['description'];
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
                        echo '<td><button class="admin-button">Update Information</button></td>';
                        echo '<td><button class="admin-button">Delete Event</button></td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                }
            ?>
        </div>
    </main>
    <footer>
        <p>&copy; 2023 RRZ Tickets</p>
    </footer>

</body>
</html>';



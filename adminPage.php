<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eventsdb";

/* instantiate a new database connection */
include 'dbConnect.php';

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


// Create event
if (isset($_POST['create_event'])) {
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $event_location = $_POST['event_location'];

    $sql = "INSERT INTO events (event_name, event_date, event_location) VALUES ('$event_name', '$event_date', '$event_location')";

    if ($dbConnection->query($sql) === TRUE) {
        echo "Event created successfully";
    } else {
        echo "Error creating event: " . $dbConnection->error;
    }
}

// Update event
if (isset($_POST['update_event'])) {
    $event_id = $_POST['event_id'];
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $event_location = $_POST['event_location'];

    $sql = "UPDATE events SET event_name='$event_name', event_date='$event_date', event_location='$event_location' WHERE id=$event_id";

    if ($dbConnection->query($sql) === TRUE) {
        echo "Event updated successfully";
    } else {
        echo "Error updating event: " . $dbConnection->error;
    }
}

// Delete event
if (isset($_POST['delete_event'])) {
    $event_id = $_POST['event_id'];

    $sql = "DELETE FROM events WHERE id=$event_id";

    if ($dbConnection->query($sql) === TRUE) {
        echo "Event deleted successfully";
    } else {
        echo "Error deleting event: " . $dbConnection->error;
    }
}

// Close database connection
$dbConnection->close();

?>
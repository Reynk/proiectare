<!--
/**
 * This file represents the admin page of the project.
 * It is responsible for displaying the admin interface and handling admin-related functionality.
 */
  -->
<?php
session_start();
/* instantiate a new database connection */
include 'dbConnect.php';

if (isset($_SESSION['message'])) {
    echo '<script>alert("' . $_SESSION['message'] . '");</script>';
    unset($_SESSION['message']);
}

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
                <li><a href="logout.php">LOGOUT</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Admin event administration</h1>
        <div class="bilete-button">
            <div>
                <form action="createEvent.php" method="post" enctype="multipart/form-data">
                    <table class="event-create">
                        <tr>
                            <th colspan="2"><h2>Create new event</h2></th>
                        </tr>
                        <tr>
                            <td><label for="title">title:</label></td>
                            <td><input type="text" id="title" name="title"></td>
                        </tr>
                        <tr>
                            <td><label for="date">date:</label></td>
                            <td><input type="date" value="2023-01-01" min="2023-01-01" max="2033-12-31" id="date" name="date"></td>
                        </tr>
                        <tr>
                            <td><label for="about">about:</label></td>
                            <td><input type="text" id="about" name="about"></td>
                        </tr>
                        <tr>
                            <td><label for="description">description:</label></td>
                            <td><input type="text" id="description" name="description"></td>
                        </tr>
                        <tr>
                            <td><label for="price">price:</label></td>
                            <td><input type="text" id="price" name="price"></td>
                        </tr>
                        <tr>
                            <td><label for="image">image:</label></td>
                            <td><input type="file" id="image" name="image"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" value="Create new event" class="admin-button"></td>
                        </tr>
                    </table>
                </form>
                <div class="event-list">
                    <?php
                    /* while there are events in the database to be displayed
                        iterate and show the events */
                    echo '<table>';
                    echo '<tr><th>Title</th><th>Date</th><th>About</th><th>Description</th><th>Price</th><th></th></tr>';
                    while ($row = mysqli_fetch_assoc($result)) {
                        $title = $row['title'];
                        $date = $row['date'];
                        $about = $row['about'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image = $row['image'];
                        echo '<tr>';
                        echo "<td>$title</td>";
                        echo "<td>$date</td>";
                        echo "<td>$about</td>";
                        echo "<td>$description</td>";
                        echo "<td>$price</td>";
                        // echo "<td>$image</td";
                    

                        echo '<td>';
                        echo '<form action="deleteEvent.php" method="post">';
                        echo '<input type="hidden" name="event_id" value="' . $row['id'] . '">';
                        echo '<button type="submit" class="admin-button-delete">Delete Event</button>';
                        echo '</form>';
                        echo '</td>';
                        echo '</tr>';

                        echo '<tr class="edit-row">';
                        echo '<form action="updateEvent.php" method="post" enctype="multipart/form-data">';
                        // the below line may not get the row id, need to verify this
                        echo '<input type="hidden" name="event_id" value="' . $row['id'] . '">';
                        echo '  <td colspan="5">';
                        echo '    <input type="text" name="title" value="'.$title.'" placeholder="Update Title">';
                        echo '    <input type="date" name="date" value="'.$date.'" placeholder="Update Date">';
                        echo '    <input type="text" name="about" value="'.$about.'">';
                        echo '    <input type="text" name="description" value="'.$description.'" placeholder="Update Description">';
                        echo '    <input type="text" name="price" value="'.$price.'" placeholder="Update Price">';
                        echo '    <input type="file" name="image" id="image">';
                        echo '  </td>';
                        echo '<td>';
                        echo '    <button class="admin-button" type="submit">Update Information</button>';
                        echo '</td>';
                        echo '</form>';
                        echo '</tr>';

                        // echo "<tr>";
                        // echo '<form action="createEvent.php" method="post">';
                        // echo '<p>asd</p>';
// echo '    <label for="title">title:</label>';
// echo '    <input type="text" id="title" name="title"><br><br>';
// echo '    <label for="date">date:</label>';
// echo '    <input type="date" value="2023-01-01" min="2023-01-01" max="2033-12-31" id="date" name="date"><br><br>';
// echo '    <label for="about">about:</label>';
// echo '    <input type="text" id="about" name="about"><br><br>';
// echo '    <label for="description">description:</label>';
// echo '    <input type="text" id="description" name="description"><br><br>';
// echo '    <input type="submit" value="Create new event" class="admin-button">';
// echo '</form>';
                        // echo '<form action="updateEvent.php" method="post">';
                        // echo '<label for="title">title:</label>';
                        // echo '<td><input type="text" name="title"></td>';
                        // echo '<td><input type="text" name="date"></td>';
                        // echo '<td><input type="text" name="about"></td>';
                        // echo '<td><input type="text" name="description"></td>';
                        // echo '<td><input type="text" name="price"></td>';
                        // echo '<td><input type="text" name="image"></td>';
                        // echo '</form>';
                        // echo "</tr>";
                    
                    }
                    echo '</table>';
                    ?>
                </div>
    </main>
    <footer>
        <div class="footer">
            <p>&copy; 2023 RRZ Tickets</p>
        </div>
    </footer>

</body>

</html>';
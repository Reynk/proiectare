<!-- /**
 * Updates an event in the database based on the data received from a form submission.
 * If the form data is empty, the event table is not updated for that field.
 * ONLY UPDATES THE FILLED IN FIELDS
 */ -->
<?php
function updateEvent()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve the event ID and updated data from the form
        $eventId = $_POST['event_id'];
        $title = $_POST['title'];
        $date = $_POST['date'];
        $about = $_POST['about'];
        $description = $_POST['description'];
        $price = $_POST['price'];

        include 'dbConnect.php';

        // Define the SQL update 
        $sql_update = "UPDATE `events` SET ";

        // check each variable and add it to the query if it's not empty
        if (!empty($title)) {
            $sql_update .= "`title`='$title', ";
        }
        if (!empty($date)) {
            $sql_update .= "`date`='$date', ";
        }
        if (!empty($about)) {
            $sql_update .= "`about`='$about', ";
        }
        if (!empty($description)) {
            $sql_update .= "`description`='$description', ";
        }
        if (!empty($price)) {
            $sql_update .= "`price`='$price', ";
        }

        // Process the uploaded image
        if (!empty($_FILES["image"]["name"])) {
            $target_dir = "uploads/";
            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777, true);
            }
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "<script>console.log('$_FILES' );</script>";
                $sql_update .= "`image`='$target_file', ";
            }
        }

        // Remove trailing comma
        $sql_update = rtrim($sql_update, ', ');

        // Finish SQL query
        $sql_update .= " WHERE `id`='$eventId'";

        // Execute SQL query
        $result = mysqli_query($dbConnection, $sql_update);

        echo '<h3>query</h3>';
        echo $sql_update;
        echo '</br>';
        echo '<h3>result</h3>';
        echo $result;

        $_SESSION['message'] = "Event updated";
        // Redirect to admin page
        header('Location: adminPage.php');
        exit();
    }
}

updateEvent();
?>
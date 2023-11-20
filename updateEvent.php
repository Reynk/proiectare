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

        // Update the event in the database
        $sql_update = "UPDATE `events` SET `title`='$title', `date`='$date', `about`='$about', `description`='$description', WHERE `id`='$eventId'";
        $result = mysqli_query($dbConnection, $sql_update);

        header('Location: adminPage.php');
        exit();
    }
}

updateEvent();
?>
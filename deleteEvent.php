<?php 
session_start();

function deleteEvent() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve the event ID from the form data
        $event_id = $_POST['event_id'];
        
        include 'dbConnect.php';

        $sql_delete = "DELETE FROM `events` WHERE `id` = $event_id";
        $result = mysqli_query($dbConnection, $sql_delete);
        
        $_SESSION['message'] = "Event deleted";
        header('Location: adminPage.php');
        exit();
    }
}

deleteEvent();
?>
<?php function createEvent() {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve the username and password from the form data
        $id = $_POST['id'];
        $title = $_POST['title'];
        $date = $_POST['date'];
        $about = $_POST['about'];
        $description = $_POST['description'];
        
        include 'dbConnect.php';

        $sql_insert = "INSERT INTO `events` (`id`, `title`, `date`, `about`, `description`) VALUES ('$id', '$title', '$date', '$about', '$description')";
        $result = mysqli_query($dbConnection, $sql_insert);

        header('Location: adminPage.php');
        exit();

    // Close connection
    // $stmt->close();
    // $conn->close();
    // header("Location: adminPage.php");
    // exit();
    }
}

createEvent();
?>
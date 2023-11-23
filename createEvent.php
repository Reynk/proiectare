<?php function createEvent()
{

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve the username and password from the form data
        $title = $_POST['title'];
        $date = $_POST['date'];
        $about = $_POST['about'];
        $description = $_POST['description'];
        $price = $_POST['price'];

        // Handle the uploaded image -- Does not work
        $target_dir = "uploads/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "File has been uploaded.";
        } else {
            echo "File upload failed.";
        }
        echo "<script>console.log('$_FILES' );</script>";
        include 'dbConnect.php';
        $target_file = file_get_contents($target_file);
        // Define sql query for events table
        $sql_insert = "INSERT INTO `events` (`title`, `date`, `about`, `description`, `price`, `image`) VALUES ('$title', '$date', '$about', '$description', '$price', '$target_file')";
        mysqli_query($dbConnection, $sql_insert);
        echo $sql_insert;
        /*

        $sql_insert = "INSERT INTO `events` (`title`, `date`, `about`, `description`, `price`, `image`) VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($dbConnection, $sql_insert);

        mysqli_stmt_bind_param($stmt, 'sssssb', $title, $date, $about, $description, $price, $image_blob);

        mysqli_stmt_execute($stmt);
        */

        // header('Location: adminPage.php');
        exit();
    }
}

createEvent();
?>
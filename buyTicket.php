<?php
function insertOrder()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve the username and id from the form data
        $username = $_POST['username'];
        $event_title = $_POST['event_title'];
        $event_id = $_POST['id'];
        $price = $_POST['price'];
        $size = $_POST['size'];
        
        $price = $price * $size;
        include 'dbConnect.php';
        // Define sql query for orders table
        $sql = "INSERT INTO `orders` (`order_id`, `username`, `event_title`, `event_id`, `price`, `size`) VALUES (NULL, '$username', '$event_title', '$event_id', '$price', '$size')";

        mysqli_query($dbConnection, $sql);
        echo $username;
        echo $event_title;
        echo $event_id;
        
        echo '</br><p>price: </p>';
        echo $price;
        echo '</br><p>size: </p>';
        echo $size;
        header("Location: order.php");
    }
}

insertOrder();
?>
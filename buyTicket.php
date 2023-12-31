<!-- /**
 * Function to insert an order into the database.
 * Retrieves the username, event title, event id, price, and size from the form data.
 * Calculates the total price based on the price and size.
 * Inserts the order details into the 'orders' table in the database.
 * Redirects the user to the 'order.php' page.
 */ -->
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
        // Prepare email
        $to = $username;
        $subject = "Purchase Confirmation";
        $message = "Dear customer,\n\nYou have successfully purchased $size ticket(s) for $event_title. The total price is $price.\n\nThank you for your purchase!";
        $headers = "From: noreply@rrz.com";

        // Send email
        mail($to, $subject, $message, $headers);

        header("Location: order.php");
    }
}

insertOrder();
?>
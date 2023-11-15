<?php
// Define the function to insert user data into the database
function insertUser() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve the username and password from the form data
        $username = $_POST['username'];
        $password = $_POST['password'];
        echo $username;
        echo $password;

        include 'dbConnect.php';
        if (empty($username) || empty($password)) {
            echo "Please enter a username and password";
        } else {
            // Check if the username and password are correct
            /* TODO: IMPLEMENT CHECK AGAINST THE DB */

            // Define sql query for admins table
            $sql = "INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$password')";
                mysqli_query($dbConnection, $sql);
            
            header("Location: mainPage.php");

        }
    } 
}

insertUser();
?>
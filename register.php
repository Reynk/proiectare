<?php
// Define the function to insert user data into the database
function insertUser()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve the username and password from the form data
        $username = $_POST['username'];
        $password = $_POST['password'];

        include 'dbConnect.php';
        if (empty($username) || empty($password)) {
            echo "Please enter a username and password";
        } else {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            echo '<p>Hashed password: </p>';
            echo $hashed_password;
            // Define the sql query for adding records to users table
            $sql = "INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$hashed_password')";
            mysqli_query($dbConnection, $sql);

            header("Location: mainPage.php");
        }
    }
}

insertUser();
?>
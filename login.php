<?php
session_start();
function login() {
    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve the username and password from the form data
        $_SESSION["username"] = $_POST['username'];
        $_SESSION["password"] = $_POST['password'];
        // $_SESSION = $_POST['username'];
        // $password = $_POST['password'];
        // echo $username;
        // echo $password;


        include 'dbConnect.php';
        
        // Validate the input
        if (empty($_SESSION["username"]) || empty($_SESSION["password"])) {
            echo "Please enter a username and password";
        } else {
            // Check if the username and password are correct
            /* TODO: IMPLEMENT CHECK AGAINST THE DB */

            // Define sql query for admins table
            $sql = "SELECT * FROM admins WHERE username='$_SESSION[username]' AND password='$_SESSION[password]'";
            $result = mysqli_query($dbConnection, $sql);
            
            // Attempt admin login
            if (mysqli_num_rows($result) == 1) {
                echo "Login successful";
                // Redirect to admin page
                header("Location: adminPage.php");
                exit();

            } else {
                // Attempt user login
                $sql = "SELECT * FROM users WHERE username='$_SESSION[username]' AND password='$_SESSION[password]'";
                $result = mysqli_query($dbConnection, $sql);
                if (mysqli_num_rows($result) == 1) {
                    echo "Login successful";
                    header("Location: tickets.php");
                } else {
                    // Login failed
                    echo "Incorrect username or password";
                }
                
            }
        }
    }
}

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

login();
?>



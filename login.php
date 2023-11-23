<?php
session_start();
function login() {
    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve the username and password from the form data
        $_SESSION["username"] = $_POST['username'];
        $_SESSION["password"] = $_POST['password'];

        include 'dbConnect.php';
        
        // Validate the input
        if (empty($_SESSION["username"]) || empty($_SESSION["password"])) {
            echo "Please enter a username and password";
            session_destroy();
        } else {
            
            // Define sql query for admins table
            $sql = "SELECT * FROM admins WHERE username='$_SESSION[username]'";
            $result = mysqli_query($dbConnection, $sql);
            // echo "<script>console.log('Debug Objects: " . mysqli_num_rows($result)  . "' );</script>";
            // Attempt admin login
            if (mysqli_num_rows($result) == 1) {
                
                $row = mysqli_fetch_assoc($result);
                echo "<script>console.log('Flag Before Password_verify:' );</script>";
                if (password_verify($_SESSION["password"], $row['password'])) {
                    echo "<script>console.log('Flag AFTER Password_verify' );</script>";    
                    echo "Login successful";
                    header("Location: adminPage.php");
                    exit();
                }
                // Redirect to admin page
            } 
            else {
                // Attempt user login
                $sql = "SELECT * FROM users WHERE username='$_SESSION[username]'";
                $result = mysqli_query($dbConnection, $sql);

                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_assoc($result);
                    if (password_verify($_SESSION["password"], $row['password'])) {
                        
                        echo "Login successful";
                        header("Location: tickets.php");
                    }

                } else {
                    // Login failed
                    session_destroy();
                    echo "Incorrect username or password";

                    echo "<br>";
                    echo $sql;
                    // echo '<p>TACDQ: </p>';
                    // echo $hashed_password;
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



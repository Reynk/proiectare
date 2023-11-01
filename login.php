<?php
function login() {
    // Check if the form has been submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve the username and password from the form data
        $username = $_POST['username'];
        $password = $_POST['password'];
        echo $username;
        echo $password;


        include 'dbConnect.php';
        
        // Validate the input
        if (empty($username) || empty($password)) {
            echo "Please enter a username and password";
        } else {
            // Check if the username and password are correct
            /* TODO: IMPLEMENT CHECK AGAINST THE DB */

            // Define sql query for admins table
            $sql = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
            $result = mysqli_query($dbConnection, $sql);
            
            // Attempt admin login
            if (mysqli_num_rows($result) == 1) {
                echo "Login successful";
                // Redirect to admin page
                header("Location: adminPage.php");
                exit();

            } else {
                // Attempt user login
                $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
                $result = mysqli_query($dbConnection, $sql);
                if (mysqli_num_rows($result) == 1) {
                    echo "Login successful";
                    header("Location: userPage.php");
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



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
            $sql = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) == 1) {
                echo "Login successful";
            } else {
                echo "Incorrect username or password";
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



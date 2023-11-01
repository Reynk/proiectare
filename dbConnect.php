<?php
/* instantiate a new database connection */
$dbConnection = mysqli_connect("localhost", "root", "", "eventsdb", 3306);

// Check connection
if ($dbConnection->connect_error) {
    die("Connection failed: " . $dbConnection->connect_error);
}
?>
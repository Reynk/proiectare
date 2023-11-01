<?php
/* instantiate a new database connection */
$dbConnection = mysqli_connect("localhost", "root", "", "eventsdb", 3306);
/* define the sql query and then use it to perform a query and assign the result */
$sql = "SELECT * FROM events";
$result = mysqli_query($dbConnection, $sql);
?>
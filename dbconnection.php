<?php
//code for database connection
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name="cgs";

// Create connection
$conn = mysqli_connect($db_host, $db_user, $db_password,$db_name);
if (!$conn) {
    die("Connection failed ");
}
?>
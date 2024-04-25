<?php
session_start();
//database connection
$host="localhost";
$username="root";
$password="";
$db_name="tp-final-db";
// Create connection variable
$link = mysqli_connect($host, $username, $password, $db_name) or die("Cannot Connect");
// Check connection
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>
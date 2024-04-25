<?php
// Include the database connection file
include_once('../../db-connect.php');

// Check if the user is logged in by checking the session
$check=$_SESSION['login_id'];
$session=mysqli_query($link,"SELECT name  FROM admin WHERE id='$check' ");
$row=mysqli_fetch_array($session);
$login_session = $loged_user_name = $row['name'];
// If the user is not logged in, redirect to the main page
if(!isset($login_session)){
    header("Location:../../");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <link rel="stylesheet" href="../../sources/css/styles.css">
</head>
<body>
<header>
    <h1>School Management System</h1>
</header>
<nav>
    <ul>
        <!-- Navigation links for home, adding a student, and viewing students -->
        <li><a href="index.php">Home</a></li>
        <li><a href="student-Add.php">Add Student</a></li>
        <li><a href="student-View.php">View Student</a></li>
    </ul>
</nav>
<!-- Display a homepage image -->
<img class="homePage" src="../../assets/buildiImages/homePage.png" alt="Home Page">
</body>
</html>
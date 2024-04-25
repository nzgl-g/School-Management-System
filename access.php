<?php
//When the file included all the variables and functions are available in the file.
include_once('db-connect.php');

//Get the user ID and password from the login form
$myid = $_POST['myid'];
$mypassword = $_POST['mypassword'];

// Secure the user ID and password from SQL injection
$myid = stripslashes($myid);
$mypassword = stripslashes($mypassword);
$myid = mysqli_real_escape_string($link, $myid);
$mypassword = mysqli_real_escape_string($link, $mypassword);

// Store the user ID in a session variable
session_start();
$_SESSION['login_id'] = $myid;

//sql query to select the user type(admin,teacher,parent) from the users table
$sql = "SELECT usertype FROM users WHERE userid='$myid' and password='$mypassword'";

//RUN THE QUERY and store the result in a variable
$result = mysqli_query($link, $sql);

// Count the number of rows in the result
$count = mysqli_num_rows($result);

// Fetch the user type from the result
$type = mysqli_fetch_array($result);
$control = $type['usertype'];


// Check if the count is not 1 or the user type is not set
if ($count != 1 || !isset($control)) {
    // Redirect to the login page with a login error
    header("Location:../index.php?login=false");
} else {
    // Switch based on the user type
    switch ($control) {
        case "admin":
            // Redirect to the admin module
            header("Location:../users/admin");
            break;
        case "teacher":
            // Redirect to the teacher module
            header("Location:../users/teacher");
            break;
        case "parent":
            // Redirect to the parent module
            header("Location:../users/parent");
            break;
        default:
            // If the user type doesn't match any case, redirect to the login page with a login error
            header("Location:../index.php?login=false");
            break;
    }
}
?>
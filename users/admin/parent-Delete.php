<?php
// Include the database connection file
include_once('../../db-connect.php');

// Check if the 'id' is set in the GET request
if(isset($_GET['id'])){
    // Escape the 'id' to prevent SQL injection
    $id = mysqli_real_escape_string($link, $_GET['id']);

    // SQL query to delete the parent record from the 'parents' table
    $sql = "DELETE FROM parents WHERE id='$id'";
    // Execute the SQL query
    mysqli_query($link,$sql);

    // SQL query to delete the user record from the 'users' table
    $sql = "DELETE FROM users WHERE userid='$id'";
    // Execute the SQL query
    mysqli_query($link,$sql);

    // Redirect to the 'parent-View.php' page after deletion
    header("Location: parent-View.php");
}
?>
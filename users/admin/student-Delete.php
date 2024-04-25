<?php
// Include the database connection file
include_once('../../db-connect.php');

// Check if the 'id' is set in the GET request
if(isset($_GET['id'])){
    // Escape the 'id' to prevent SQL injection
    $studentId = mysqli_real_escape_string($link, $_GET['id']);

    // SQL query to delete the student record from the 'students' table
    $sql = "DELETE FROM students WHERE id = '$studentId'";
    // Execute the SQL query
    mysqli_query($link, $sql);

    // SQL query to delete the user record from the 'users' table
    $sql = "DELETE FROM users WHERE userid = '$studentId'";
    // Execute the SQL query
    mysqli_query($link, $sql);

    // Redirect to the 'student-View.php' page after deletion
    header("Location: student-View.php");
}
?>
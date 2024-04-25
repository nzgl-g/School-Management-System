<?php
// Include the database connection file
include_once('../../db-connect.php');

// Check if the user is logged in by checking the session
$check=$_SESSION['login_id'];
$session=mysqli_query($link,"SELECT name  FROM admin WHERE id='$check' ");
$row=mysqli_fetch_array($session);
$login_session = $loged_user_name = $row['name'];
if(!isset($login_session)){
    // If the user is not logged in, redirect to the main page
    header("Location:../../");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System - Student Registration</title>
    <link rel="stylesheet" href="../../sources/css/styles.css">
</head>
<body>
<header>
    <h1>Add Students</h1>
</header>
<?php include("navBar.php");?>
<main>
    <h2>Student Registration</h2>
    <!-- Student registration form -->
    <form action="#" method="post">
        <table>
            <!-- Form fields for student's information -->
            <tr>
                <td>Student ID:</td>
                <td><input id="studentId" type="text" name="studentId" placeholder="Enter Student ID"></td>
            </tr>
            <tr>
                <td>Student Name:</td>
                <td><input id="studentName" type="text" name="studentName" placeholder="Enter Student Name"></td>
            </tr>
            <tr>
                <td>Student Password:</td>
                <td><input id="studentPassword" type="password" name="studentPassword" placeholder="Enter Password"></td>
            </tr>
            <tr>
                <td>Student Phone:</td>
                <td><input id="studentPhone" type="text" name="studentPhone" placeholder="Enter Student Phone"></td>
            </tr>
            <tr>
                <td>Student Email:</td>
                <td><input id="studentEmail" type="text" name="studentEmail" placeholder="Enter Student Email"></td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td>
                    <input type="radio" id="male" name="gender" value="male">
                    <label for="male">Male</label><br>
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female">Female</label><br>
                </td>
            </tr>
            <tr>
                <td>Date of Birth:</td>
                <td><input id="studentDOB" type="date" name="studentDOB"></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><input id="studentAddress" type="text" name="studentAddress" placeholder="Enter Student Address"></td>
            </tr>
            <tr>
                <td>Parent ID:</td>
                <td><input id="studentParentId" type="text" name="studentParentId" placeholder="Enter Parent ID"></td>
            </tr>
            <tr>
                <td></td>
                <!-- Submit button -->
                <td><input type="submit" name="submit"value="Submit"></td>
            </tr>
        </table>
    </form>
</main>

</body>
</html>
<?php
include_once('../../db-connect.php');

// If the form is submitted, insert the new student's record
if(!empty($_POST['submit'])){
    // Get the values from the form
    $stuId = $_POST['studentId'];
    $stuName = $_POST['studentName'];
    $stuPassword = $_POST['studentPassword'];
    $stuPhone = $_POST['studentPhone'];
    $stuEmail = $_POST['studentEmail'];
    $stugender = $_POST['gender'];
    $stuDOB = $_POST['studentDOB'];
    $stuAddress = $_POST['studentAddress'];
    $stuParentId = $_POST['studentParentId'];
    // SQL query to insert the new student's record into the 'students' table
    $sql = "INSERT INTO students VALUES('$stuId','$stuName','$stuPassword','$stuPhone','$stuEmail','$stugender','$stuDOB','$stuAddress','$stuParentId');";
    // Execute the SQL query
    $success = mysqli_query($link,$sql);
    // SQL query to insert the new student's record into the 'users' table
    $sql = "INSERT INTO users VALUES('$stuId','$stuPassword','student');";
    // Execute the SQL query
    $success = mysqli_query($link,$sql);
    if(!$success) {
        die('Could not enter data: '.mysqli_error($link));
    }
    echo "Entered data successfully\n";
}
?>

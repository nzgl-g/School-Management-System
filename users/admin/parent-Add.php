<?php
// Check if the user is in the database
include_once('../../db-connect.php');

$check=$_SESSION['login_id'];
$session=mysqli_query($link,"SELECT name  FROM admin WHERE id='$check' ");
$row=mysqli_fetch_array($session);
$login_session = $loged_user_name = $row['name'];
// Check if the user is logged in by checking the session
if(!isset($login_session)){
    header("Location:../../");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System - Parent Registration</title>
    <link rel="stylesheet" href="../../sources/css/styles.css">
</head>
<body>
<header>
    <h1>Add Parents</h1>
</header>
<?php include("navBar.php");?>
<main>
    <h2>Parent Registration</h2>
    <form action="#" method="post" >
        <table>
            <tr>
                <td>Parent Id:</td>
                <td><input id="id" type="text" name="id" placeholder="Enter Id"></td>
            </tr>
            <tr>
                <td>Parent Password:</td>
                <td><input id="password" type="text" name="password" placeholder="Enter Password"></td>
            </tr>
            <tr>
                <td>Father Name:</td>
                <td><input id="fathername" type="text" name="fathername" placeholder="Enter Father Name"></td>
            </tr>
            <tr>
                <td>Mother Name:</td>
                <td><input id="mothername" type="text" name="mothername" placeholder="Enter Mother Name"></td>
            </tr>
            <tr>
                <td>Father Phone:</td>
                <td><input id="fatherphone" type="text" name="fatherphone" placeholder="Enter Father Phone"></td>
            </tr>
            <tr>
                <td>Mother Phone:</td>
                <td><input id="motherphone" type="text" name="motherphone" placeholder="Enter Mother Phone"></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><input id="address" type="text" name="address" placeholder="Enter Address"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
</main>
</body>
</html>
<?php
include_once('../../db-connect.php');

// Set the values of the form to the variables
if(!empty($_POST['submit'])){
    $id = $_POST['id'];
    $password = $_POST['password'];
    $fathername = $_POST['fathername'];
    $mothername = $_POST['mothername'];
    $fatherphone = $_POST['fatherphone'];
    $motherphone = $_POST['motherphone'];
    $address = $_POST['address'];
    $sql = "INSERT INTO parents VALUES('$id','$password','$fathername','$mothername','$fatherphone','$motherphone','$address')";
    $success = mysqli_query($link,$sql);
    if(!$success) {
        die('Could not enter data: '.mysqli_error($link));
    }
    $sql = "INSERT INTO users VALUES('$id','$password','parent')";
    $success = mysqli_query($link,$sql);
    echo "Entered data successfully\n";
}
?>

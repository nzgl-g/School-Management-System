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
        <title>School Management System - Teacher Registration</title>
        <link rel="stylesheet" href="../../sources/css/styles.css">
    </head>
    <body>
    <header>
        <h1>Add Teachers</h1>
    </header>
    <?php include("navBar.php");?>
    <main>
        <h2>Teacher Registration</h2>
        <!-- Teacher registration form -->
        <form action="#" method="post">
            <table>
                <!-- Form fields for teacher's information -->
                <tr>
                    <td>Teacher ID:</td>
                    <td><input id="teacherId" type="text" name="teacherId" placeholder="Enter Teacher ID"></td>
                </tr>
                <tr>
                    <td>Teacher Name:</td>
                    <td><input id="teacherName" type="text" name="teacherName" placeholder="Enter Teacher Name"></td>
                </tr>
                <tr>
                    <td>Teacher Password:</td>
                    <td><input id="teacherPassword" type="password" name="teacherPassword" placeholder="Enter Password"></td>
                </tr>
                <tr>
                    <td>Teacher Phone:</td>
                    <td><input id="teacherPhone" type="text" name="teacherPhone" placeholder="Enter Teacher Phone"></td>
                </tr>
                <tr>
                    <td>Teacher Email:</td>
                    <td><input id="teacherEmail" type="text" name="teacherEmail" placeholder="Enter Teacher Email"></td>
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
                    <td><input id="teacherDOB" type="date" name="teacherDOB"></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><input id="teacherAddress" type="text" name="teacherAddress" placeholder="Enter Teacher Address"></td>
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

// If the form is submitted, insert the new teacher's record
if(!empty($_POST['submit'])){
    // Get the values from the form
    $id = $_POST['id'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    // SQL query to insert the new teacher's record into the 'teachers' table
    $sql = "INSERT INTO teachers VALUES('$id','$name','$password','$phone','$email','$address','$gender','$dob');";
    // Execute the SQL query
    $success = mysqli_query($link,$sql);
    // SQL query to insert the new teacher's record into the 'users' table
    $sql = "INSERT INTO users VALUES('$id','$password','teacher');";
    // Execute the SQL query
    $success = mysqli_query($link,$sql);
    if(!$success) {
        die('Could not enter data: '.mysqli_error($link));
    }
    echo "Entered data successfully\n";
}
?>
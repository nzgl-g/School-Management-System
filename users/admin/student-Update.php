<?php
// Include the database connection file
include_once('../../db-connect.php');

// Check if the 'id' is set in the GET request or POST request
$stuId = isset($_GET['id']) ? $_GET['id'] : '';

// If the form is submitted, update the student's record
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){
    // Get the new values from the form
    $stuId = $_POST['id'];
    $stuName = $_POST['name'];
    $stuPhone = $_POST['phone'];
    $stuEmail = $_POST['email'];
    $stugender = $_POST['gender'];
    $stuDOB = $_POST['dob'];
    $stuAddress = $_POST['address'];
    $stuParentId = $_POST['parentid'];

    // SQL query to update the student's record in the 'students' table
    $sql = "UPDATE students SET name='$stuName', phone='$stuPhone', email='$stuEmail', sex='$stugender', dob='$stuDOB', address='$stuAddress', parentid='$stuParentId' WHERE id='$stuId'";
    // Execute the SQL query
    $success = mysqli_query($link,$sql);
    if(!$success) {
        die('Could not Update data: '.mysqli_error($link));
    }
    echo "Update data successfully\n";
}

// Fetch the current student's information
$sql = "SELECT * FROM students WHERE id='$stuId'";
$result = mysqli_query($link, $sql);
$student = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
    <link rel="stylesheet" href="../../sources/css/styles.css">
</head>
<body>
<header>
    <h1>Update Student</h1>
</header>
<?php include("navBar.php");?>
<!-- Update form pre-filled with the current student's information -->
<form class="updateForm" method="post" action="">
    <input type="text" name="id" placeholder="Enter Student ID" value="<?php echo isset($student['id']) ? $student['id'] : ''; ?>" required>
    <input type="text" name="name" placeholder="Enter New Name" value="<?php echo isset($student['name']) ? $student['name'] : ''; ?>">
    <input type="text" name="phone" placeholder="Enter New Phone" value="<?php echo isset($student['phone']) ? $student['phone'] : ''; ?>">
    <input type="text" name="email" placeholder="Enter New Email" value="<?php echo isset($student['email']) ? $student['email'] : ''; ?>">
    <input type="text" name="gender" placeholder="Enter New Gender" value="<?php echo isset($student['sex']) ? $student['sex'] : ''; ?>">
    <input type="text" name="dob" placeholder="Enter New DOB" value="<?php echo isset($student['dob']) ? $student['dob'] : ''; ?>">
    <input type="text" name="address" placeholder="Enter New Address" value="<?php echo isset($student['address']) ? $student['address'] : ''; ?>">
    <input type="text" name="parentid" placeholder="Enter New Parent ID" value="<?php echo isset($student['parentid']) ? $student['parentid'] : ''; ?>">
    <input type="submit" value="Update">
</form>
</body>
</html>
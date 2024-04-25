<?php
include_once('../../db-connect.php');

$teacherId = isset($_GET['id']) ? $_GET['id'] : '';

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])){
    $teacherId = $_POST['id'];
    $teacherName = $_POST['name'];
    $teacherPhone = $_POST['phone'];
    $teacherEmail = $_POST['email'];
    $teacherGender = $_POST['gender'];
    $teacherDOB = $_POST['dob'];
    $teacherAddress = $_POST['address'];

    $sql = "UPDATE teachers SET name='$teacherName', phone='$teacherPhone', email='$teacherEmail', sex='$teacherGender', dob='$teacherDOB', address='$teacherAddress' WHERE id='$teacherId'";
    $success = mysqli_query($link,$sql);
    if(!$success) {
        die('Could not Update data: '.mysqli_error($link));
    }
    echo "Update data successfully\n";
}

// Fetch teacher's current information
$sql = "SELECT * FROM teachers WHERE id='$teacherId'";
$result = mysqli_query($link, $sql);
$teacher = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Teacher</title>
    <link rel="stylesheet" href="../../sources/css/styles.css">
</head>
<body>
<header>
    <h1>Update Teacher</h1>
</header>
<?php include("navBar.php");?>
<!-- Update form -->
<form class="updateForm" method="post" action="">
    <input type="text" name="id" placeholder="Enter Teacher ID" value="<?php echo isset($teacher['id']) ? $teacher['id'] : ''; ?>" required>
    <input type="text" name="name" placeholder="Enter New Name" value="<?php echo isset($teacher['name']) ? $teacher['name'] : ''; ?>">
    <input type="text" name="phone" placeholder="Enter New Phone" value="<?php echo isset($teacher['phone']) ? $teacher['phone'] : ''; ?>">
    <input type="text" name="email" placeholder="Enter New Email" value="<?php echo isset($teacher['email']) ? $teacher['email'] : ''; ?>">
    <input type="text" name="gender" placeholder="Enter New Gender" value="<?php echo isset($teacher['sex']) ? $teacher['sex'] : ''; ?>">
    <input type="text" name="dob" placeholder="Enter New DOB" value="<?php echo isset($teacher['dob']) ? $teacher['dob'] : ''; ?>">
    <input type="text" name="address" placeholder="Enter New Address" value="<?php echo isset($teacher['address']) ? $teacher['address'] : ''; ?>">
    <input type="submit" value="Update">
</form>
</body>
</html>
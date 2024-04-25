<?php
// Include the database connection file
include_once('../../db-connect.php');

// Get the teacher's ID from the URL
$reciever_id = $_GET['id'];

// Get the sender's ID from the session
$sender_id = $_SESSION['login_id'];

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the message from the form
    $message = $_POST['message'];
    // Get the current date
    $date = date('Y-m-d');

    // SQL query to insert the message into the database
    $sql = "INSERT INTO messages (message, sender_id, reciever_id, date) VALUES ('$message', '$sender_id', '$reciever_id', '$date')";
    // Execute the SQL query
    if (mysqli_query($link, $sql)) {
        echo "Message sent successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Parent Portal-Contact Teacher</title>
    <link rel="stylesheet" href="../../sources/css/styles.css">
</head>
<body>
<header>
    <!-- Main title -->
    <h1>Parent Portal-Contact Teacher</h1>
</header>
<!-- Include the navigation bar -->
<?php include("navBar.php");?>
<!-- Message form -->
<form method="post" action="">
    <!-- Textarea for the message -->
    <textarea name="message" placeholder="Type your message here"></textarea>
    <!-- Submit button -->
    <input type="submit" value="Send">
</form>
</body>
</html>
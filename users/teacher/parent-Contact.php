<?php
include_once('../../db-connect.php');

// Get the teacher's ID from the URL
$reciever_id = $_GET['id'];

// Get the sender's ID from the session
$sender_id = $_SESSION['login_id'];

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = $_POST['message'];
    $date = date('Y-m-d'); // Get the current date

    // Insert the message into the database
    $sql = "INSERT INTO messages (message, sender_id, reciever_id, date) VALUES ('$message', '$sender_id', '$reciever_id', '$date')";
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
    <title>Teacher Portal - Parent Contact</title>
    <link rel="stylesheet" href="../../sources/css/styles.css">
</head>
<body>
<header>
    <h1>Teacher Portal - Parent Contact</h1>
</header>
<?php include("navBar.php");?>
<form method="post" action="">
    <textarea name="message" placeholder="Type your message here"></textarea>
    <input type="submit" value="Send">
</form>
</body>
</html>
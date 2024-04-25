<?php
include_once('../../db-connect.php');

// Get the parent's ID from the session
$reciever_id = $_SESSION['login_id'];

// SQL query to fetch all messages for this parent
$sql = "SELECT * FROM messages WHERE reciever_id = '$reciever_id' ORDER BY date DESC";

$result = mysqli_query($link, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Portal - View Messages</title>
    <link rel="stylesheet" href="../../sources/css/styles.css">
</head>
<body>
<header>
    <h1>Teacher Portal - View Messages</h1>
</header>
<?php include("navBar.php");?>

<!-- Messages table -->
<table>
    <tr>
        <th class="viewTable">Date</th>
        <th class="viewTable">Sender ID</th>
        <th class="viewTable">Message</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td class="viewTable"><?php echo $row['date']; ?></td>
            <td class="viewTable"><?php echo $row['sender_id']; ?></td>
            <td class="viewTable"><?php echo $row['message']; ?></td>
        </tr>
    <?php } ?>
</table>

</body>
</html>
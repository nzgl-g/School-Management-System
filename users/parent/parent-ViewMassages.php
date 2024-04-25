<?php
// Include the database connection file
include_once('../../db-connect.php');

// Get the parent's ID from the session
$reciever_id = $_SESSION['login_id'];

// SQL query to fetch all messages for this parent, sorted by date in descending order
$sql = "SELECT * FROM messages WHERE reciever_id = '$reciever_id' ORDER BY date DESC";

// Execute the SQL query
$result = mysqli_query($link, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Parent Portal - View Messages</title>
 <link rel="stylesheet" href="../../sources/css/styles.css">
</head>
<body>
<header>
    <!-- Main title -->
	<h1>Parent Portal-View Messages</h1>
</header>
<!-- Include the navigation bar -->
<?php include("navBar.php");?>

<!-- Messages table -->
<table>
 <tr>
  <!-- Table headers -->
  <th class="viewTable">Date</th>
  <th class="viewTable">Sender ID</th>
  <th class="viewTable">Message</th>
 </tr>
    <?php while($row = mysqli_fetch_assoc($result)) { ?>
  <tr>
   <!-- Display each message's information in a table row -->
   <td class="viewTable"><?php echo $row['date']; ?></td>
   <td class="viewTable"><?php echo $row['sender_id']; ?></td>
   <td class="viewTable"><?php echo $row['message']; ?></td>
  </tr>
    <?php } ?>
</table>

</body>
</html>
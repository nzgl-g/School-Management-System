<?php
// Include the database connection file
include_once('../../db-connect.php');

// Get the search query from the GET request
$search = (isset($_GET['search'])) ? $_GET['search'] : '';

// SQL query to fetch all teachers or search for a specific teacher
$sql = "SELECT * FROM teachers";
if($search != '') {
    // If a search query is provided, add a WHERE clause to the SQL query
    $sql .= " WHERE name LIKE '%$search%' OR id LIKE '%$search%'";
}

// Execute the SQL query
$result = mysqli_query($link, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System - Teacher Viewing</title>
    <link rel="stylesheet" href="../../sources/css/styles.css">
</head>
<body>
<header>
    <h1>View Teachers</h1>
</header>
<?php include("navBar.php");?>
<!-- Search form -->
<form method="get" class="searchForm" action="">
    <input type="text" class="search" name="search" placeholder="Search by teacher name or id" value="<?php echo $search; ?>">
    <input type="submit" value="Search">
</form>

<!-- Teachers table -->
<table>
    <tr>
        <!-- Table headers -->
        <th class="viewTable">ID</th>
        <th class="viewTable">Name</th>
        <th class="viewTable">Phone</th>
        <th class="viewTable">Email</th>
        <th class="viewTable">Address</th>
        <th class="viewTable">Gender</th>
        <th class="viewTable">Date Of Birth</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <!-- Display each teacher's information in a table row -->
            <td class="viewTable"><?php echo $row['id']; ?></td>
            <td class="viewTable"><?php echo $row['name']; ?></td>
            <td class="viewTable"><?php echo $row['phone']; ?></td>
            <td class="viewTable"><?php echo $row['email']; ?></td>
            <td class="viewTable"><?php echo $row['address']; ?></td>
            <td class="viewTable"><?php echo $row['sex']; ?></td>
            <td class="viewTable"><?php echo $row['dob']; ?></td>
            <!-- Update and Delete buttons -->
            <td class="viewTable"><a href="teacher-Update.php?id=<?php echo $row['id']; ?>"><button>Update</button></a></td>
            <td class="viewTable"><a href="teacher-Delete.php?id=<?php echo $row['id']; ?>"><button>Delete</button></a></td>
        </tr>
    <?php } ?>
</table>

</body>
</html>
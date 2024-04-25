<?php
// Include the database connection file
include_once('../../db-connect.php');

// Get the search query from the GET request
$search = (isset($_GET['search'])) ? $_GET['search'] : '';

// SQL query to fetch all parents or search for a specific parent
$sql = "SELECT * FROM parents";
if($search != '') {
    // If a search query is provided, add a WHERE clause to the SQL query
    $sql .= " WHERE fathername LIKE '%$search%' OR mothername LIKE '%$search%'";
}

// Execute the SQL query
$result = mysqli_query($link, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management System - Parent Viewing</title>
    <link rel="stylesheet" href="../../sources/css/styles.css">
</head>
<body>
<header>
    <h1>View Parents</h1>
</header>
<?php include("navBar.php");?>
<!-- Search form -->
<form method="get" class="searchForm" action="">
    <input type="text" class="search" name="search" placeholder="Search by parent name" value="<?php echo $search; ?>">
    <input type="submit" value="Search">
</form>

<!-- Parents table -->
<table>
    <tr>
        <!-- Table headers -->
        <th class="viewTable">ID</th>
        <th class="viewTable">Father's Name</th>
        <th class="viewTable">Mother's Name</th>
        <th class="viewTable">Father's Phone</th>
        <th class="viewTable">Mother's Phone</th>
        <th class="viewTable">Address</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <!-- Display each parent's information in a table row -->
            <td class="viewTable"><?php echo $row['id']; ?></td>
            <td class="viewTable"><?php echo $row['fathername']; ?></td>
            <td class="viewTable"><?php echo $row['mothername']; ?></td>
            <td class="viewTable"><?php echo $row['fatherphone']; ?></td>
            <td class="viewTable"><?php echo $row['motherphone']; ?></td>
            <td class="viewTable"><?php echo $row['address']; ?></td>
            <!-- Update and Delete buttons -->
            <td class="viewTable"><a href="parent-Update.php?id=<?php echo $row['id']; ?>"><button>Update</button></a></td>
            <td class="viewTable"><a href="parent-Delete.php?id=<?php echo $row['id']; ?>"><button>Delete</button></a></td>
        </tr>
    <?php } ?>
</table>

</body>
</html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<?php
session_start();
include 'connection.php';

echo "<h2>Orphans</h2>";

$query = "SELECT * FROM orphan";
$result = mysqli_query($conn, $query);
$n = mysqli_num_rows($result);

echo "<table border='1'>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Birthdate</th>
        <th>Phone Number</th>
        <th>Update</th>
        <th>Delete</th>
        <th>View More</th>
    </tr>";

for ($i = 0; $i < $n; $i++) {
    $row = mysqli_fetch_row($result);
    echo "<tr>";
    echo "<td>$row[0]</td>";
    echo "<td>$row[1] $row[2]</td>";
    echo "<td>$row[4]</td>";
    echo "<td>$row[5]</td>";

    echo "<td><a href='updateOrphanPage.php?id=$row[0]'><img src='images/update.jpg' width='40px' alt='update'/></a></td>";
    echo "<td><a href='deleteOrphan.php?id=$row[0]'><img src='images/delete.jpg' width='40px' alt='delete'/></a></td>";
    echo "<td><a href='viewOrphan.php?id=$row[0]'><img src='images/view.jpg' width='40px' alt='view'/></a></td>";

    echo "</tr>";
}

echo "</table>";

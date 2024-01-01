<?php
include("connection.php");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the search query from the URL parameter
$searchQuery = $_GET["q"];

// Perform a simple query (you might want to use prepared statements for security)
$sql = "SELECT * FROM orphan WHERE fname LIKE '%$searchQuery%' OR lname LIKE '%$searchQuery%'";
$result = mysqli_query($conn, $sql);
$n = mysqli_num_rows($result);

echo "<table border='1'>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
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

    echo "<td><a href='updateOrphanPage.php?id=$row[0]'><img src='update.jpg' alt='update'/></a></td>";
    echo "<td><a href='deleteOrphan.php?id=$row[0]'><img src='delete.jpg' alt='delete'/></a></td>";
    echo "<td><a href='viewOrphan.php?id=$row[0]'><img src='delete.jpg' alt='view'/></a></td>";

    echo "</tr>";
}
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     // Output data of each row
//     while ($row = $result->fetch_assoc()) {
//         echo $row["fname"] . "<br>";
//     }
// } else {
//     echo "No results found";
// }

$conn->close();
?>

<?php
// Replace these variables with your actual database credentials
include("connection.php");
$servername = "your_servername";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Assuming $x contains the name you want to search for
$x = mysqli_real_escape_string($conn, $_GET['Lama']); // Make sure to sanitize user input

// SQL query
$sql = "SELECT * FROM orphan WHERE fname = '$x'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error: " . mysqli_error($conn));
}

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

// Loop through the result set
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>{$row['id']}</td>";
    echo "<td>{$row['fname']} {$row['lname']}</td>";
    echo "<td>{$row['age']}</td>";
    echo "<td>{$row['phone']}</td>";

    echo "<td><a href='updateProfessor.php?id={$row['id']}'><img src='update.jpg' alt='update'/></a></td>";
    echo "<td><a href='deleteOrphan.php?id={$row['id']}'><img src='delete.jpg' alt='delete'/></a></td>";
    echo "<td><a href='viewOrphan.php?id={$row['id']}'><img src='view.jpg' alt='view'/></a></td>";

    echo "</tr>";
}

echo "</table>";

// Close the connection
mysqli_close($conn);
?>

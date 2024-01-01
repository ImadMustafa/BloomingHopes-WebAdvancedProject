<head>
<link rel="stylesheet" href="style.css">
</head>
<?php
include 'connection.php';

echo "<h2>Workers</h2>";

$query = "SELECT worker.id, worker.name, user.phone, worker.admin FROM worker JOIN user ON worker.userid = user.id";
$result = mysqli_query($conn, $query);
$n = mysqli_num_rows($result);

if ($result) {
    echo '<table border="1">';
    echo '<thead>';
    echo '<tr><th>ID</th><th>Name</th><th>Phone</th><th>Admin</th><th>Delete</th></tr>';
    echo '</thead>';
    echo '<tbody>';

    // Fetch and display each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['id']) . '</td>';
        echo '<td>' . htmlspecialchars($row['name']) . '</td>';
        echo '<td>' . htmlspecialchars($row['phone']) . '</td>';
        echo '<td>' . htmlspecialchars($row['admin']) . '</td>';
        echo "<td><a href='deleteWorker.php?id=" . htmlspecialchars($row['id']) . "'><img src='images/delete.jpg' width='40px' alt='delete'/></a></td>";
    
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    // Handle the case where the query was not successful
    echo "Error in query: " . mysqli_error($conn);
}

// echo "<table border='1'>
//     <tr>
//         <th>ID</th>
//         <th>Name</th>
//         <th>Phone Number</th>
//         <th>Update</th>
//         <th>Delete</th>
//         <th>View More</th>
//     </tr>";

// for ($i = 0; $i < $n; $i++) {
//     $row = mysqli_fetch_row($result);
//     echo "<tr>";
//     echo "<td>$row[0]</td>";
//     echo "<td>$row[1]</td>";

    // echo "<td><a href='updateProfessor.php?id=$row[0]'><img src='update.jpg' alt='update'/></a></td>";
    // echo "<td><a href='deleteOrphan.php?id=$row[0]'><img src='delete.jpg' alt='delete'/></a></td>";
    // echo "<td><a href='viewOrphan.php?id=$row[0]'><img src='delete.jpg' alt='view'/></a></td>";

//     echo "</tr>";
// }

// echo "</table>";
?>
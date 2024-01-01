<?php
include 'connection.php';
$id = $_GET['id'];
    $query = "UPDATE orphan SET donid = 1 WHERE donid = $id";
     $result2 = mysqli_query($conn, $query2);
     $query1 = "UPDATE user JOIN donater ON donater.userid = user.id SET user.donater = 0 WHERE donater.id = $id";
     $result1 = mysqli_query($conn, $query1);
     $query2 = "DELETE FROM donater WHERE id = $id";
     $result2 = mysqli_query($conn, $query2);
    header("location:index.php");

?>
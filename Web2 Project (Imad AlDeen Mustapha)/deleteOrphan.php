<?php
include 'connection.php';
$id = $_GET['id'];
$query = "DELETE FROM orphan WHERE id = $id";
$result = mysqli_query($conn, $query);
header("location:adminPage.php");
?>
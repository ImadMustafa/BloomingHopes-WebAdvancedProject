<?php
session_start();
include 'connection.php';
$email = $_SESSION['useremail'];
    //  $query = "UPDATE user JOIN worker ON worker.userid = user.id SET user.donater = 0 WHERE worker.id = $id";
    //  $result = mysqli_query($conn, $query);
    //  $query2 = "DELETE FROM worker WHERE id = $id";
    //  $result2 = mysqli_query($conn, $query2);
    // header("location:adminPage.php");

    $query = "UPDATE user SET worker = 0 WHERE email = '$email'";
     $result = mysqli_query($conn, $query);

     $name = '';
     $id = 0;

    $query = "SELECT * FROM user WHERE email= '{$_SESSION['useremail']}'";
    $result = mysqli_query($conn, $query);

    $r = mysqli_num_rows($result);
            for ($i = 0; $i < $r; $i++) {
                $row = mysqli_fetch_row($result);
                $id = $row[0];
            }

     $query2 = "DELETE FROM worker WHERE userid = $id";
     $result2 = mysqli_query($conn, $query2);
    header("location:signInPage.php");

?>
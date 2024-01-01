<?php
session_start();
include 'connection.php';
$email = $_SESSION['useremail'];
    //  $query = "UPDATE user JOIN worker ON worker.userid = user.id SET user.donater = 0 WHERE worker.id = $id";
    //  $result = mysqli_query($conn, $query);
    //  $query2 = "DELETE FROM worker WHERE id = $id";
    //  $result2 = mysqli_query($conn, $query2);
    // header("location:adminPage.php");

     $name = '';
     $id = 0;

    $query = "SELECT * FROM user WHERE email= '{$_SESSION['useremail']}'";
    $result = mysqli_query($conn, $query);

    $r = mysqli_num_rows($result);
            for ($i = 0; $i < $r; $i++) {
                $row = mysqli_fetch_row($result);
                $id = $row[0];
            }
    

    $donid = 0;        

    $query1 = "SELECT * FROM donater JOIN user ON user.id = donater.userid WHERE user.email= '{$_SESSION['useremail']}'";
    $result1 = mysqli_query($conn, $query1);
        
    $x = mysqli_num_rows($result1);
            for ($i = 0; $i < $x; $i++) {
                $y = mysqli_fetch_row($result);
                $donid = $y[0];
            }        


    $query2 = "UPDATE orphan SET donid = 1 WHERE donid = $donid";
    $result2 = mysqli_query($conn, $query2);

     $query3 = "DELETE FROM donater WHERE userid = $id";
     $result3 = mysqli_query($conn, $query3);

    $query4 = "DELETE FROM worker WHERE userid = $id";
     $result4 = mysqli_query($conn, $query4);

    $query5 = "DELETE FROM user WHERE id = $id";
     $result5 = mysqli_query($conn, $query5);


     header("location:signInPage.php");
?>
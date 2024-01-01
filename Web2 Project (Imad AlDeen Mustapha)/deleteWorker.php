<?php
include 'connection.php';

if (isset($_POST['useremail'])) {
    $useremail = $_POST['useremail'];

     $query = "UPDATE user SET worker = 0 WHERE email = '$useremail'";
     $result = mysqli_query($conn, $query);
    header("location:index.php");
} else {
    echo "Useremail is not set.";
}
?>

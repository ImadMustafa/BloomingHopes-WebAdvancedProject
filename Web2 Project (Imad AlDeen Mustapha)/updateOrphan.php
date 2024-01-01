<?php
// include("connection.php");

// // Change $_POST to $_GET
// $id = $_GET['id'];

// if (
//     isset($_GET["fname"]) && isset($_GET["lname"]) && isset($_GET["gender"]) && isset($_GET["birthdate"]) && isset($_GET["phone"]) && isset($_GET["fathername"]) && isset($_GET["mothername"]) && isset($_GET["dead"])
//     && !empty($_GET["fname"]) && !empty($_GET["lname"]) && !empty($_GET["gender"]) && !empty($_GET["birthdate"]) && !empty($_GET["phone"]) && !empty($_GET["fathername"]) && !empty($_GET["mothername"]) && !empty($_GET["dead"])
// ) {
//     extract($_GET);
//     $query = "UPDATE `orphan` SET `fname`='$fname',`lname`='$lname',`gender`='$gender',`birthdate`='$birthdate',`phone`='$phone',`fathername`='$fathername',`mothername`='$mothername',`dead`='$dead', `donid`='$donid'  WHERE id = $id";
    
//     $result = mysqli_query($conn, $query);
//     if (!$result) {
//         die("Failed!" . mysqli_error($conn));
//     }
//     header("Location:adminPage.php");
// }
?>

<?php
include("connection.php");

// Change $_GET to $_POST
$id = $_GET['id'];

if (
    isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["gender"]) && isset($_POST["birthdate"]) && isset($_POST["phone"]) && isset($_POST["fathername"]) && isset($_POST["mothername"]) && isset($_POST["dead"])
    && !empty($_POST["fname"]) && !empty($_POST["lname"]) && !empty($_POST["gender"]) && !empty($_POST["birthdate"]) && !empty($_POST["phone"]) && !empty($_POST["fathername"]) && !empty($_POST["mothername"]) && !empty($_POST["dead"])
) {
    extract($_POST);
    $query = "UPDATE `orphan` SET `fname`='$fname',`lname`='$lname',`gender`='$gender',`birthdate`='$birthdate',`phone`='$phone',`fathername`='$fathername',`mothername`='$mothername',`dead`='$dead', `donid`='$donid'  WHERE id = $id";
    
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Failed!" . mysqli_error($conn));
    }
    header("Location:adminPage.php");
}
?>


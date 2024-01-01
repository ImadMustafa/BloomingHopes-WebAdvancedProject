<?php
include("connection.php");
if (
    isset($_GET["fname"]) && isset($_GET["lname"]) && isset($_GET["gender"]) && isset($_GET["birthdate"]) && isset($_GET["phone"]) && isset($_GET["fathername"]) && isset($_GET["mothername"]) && isset($_GET["dead"])
    && !empty($_GET["fname"]) && !empty($_GET["lname"]) && !empty($_GET["gender"]) && !empty($_GET["birthdate"]) && !empty($_GET["phone"]) && !empty($_GET["fathername"]) && !empty($_GET["mothername"]) && !empty($_GET["dead"])
) {
    extract($_GET);
    // $query = "INSERT INTO professor VALUES (NULL, '$pname', $salary)";
    $query = "INSERT INTO orphan VALUES (NULL,'$fname','$lname','$gender','$birthdate', $phone, '$orphanpic' , '$fathername', '$mothername', '$dead', '$donid')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Failed!" . mysqli_error($conn));
    }
    //echo "a new orphan has been inserted!";
    header("Location:adminPage.php");
}
?>
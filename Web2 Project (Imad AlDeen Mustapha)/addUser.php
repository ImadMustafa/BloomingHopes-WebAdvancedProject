<?php
include("connection.php");
if (
    isset($_GET["fname"]) && isset($_GET["lname"]) && isset($_GET["gender"]) && isset($_GET["birthdate"]) && isset($_GET["phone"]) && isset($_GET["useremail"]) && isset($_GET["userpassword"]) 
    && !empty($_GET["fname"]) && !empty($_GET["lname"]) && !empty($_GET["gender"]) && !empty($_GET["birthdate"]) && !empty($_GET["phone"]) && !empty($_GET["useremail"]) && !empty($_GET["userpassword"])
) {
    extract($_GET);
    // $query = "INSERT INTO professor VALUES (NULL, '$pname', $salary)";
    $query = "INSERT INTO user VALUES (NULL,'$fname','$lname','$useremail','$userpassword', 'images/avatar.png' ,'$birthdate', 0 ,'$gender', $phone , 0)";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Failed!" . mysqli_error($conn));
    }
    //echo "a new user has been inserted!";
    header("Location:signInPage.php");
}
?>
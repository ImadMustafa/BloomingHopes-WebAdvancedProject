<?php
include("connection.php");

ob_start();

if (
    isset($_POST["useremail"]) && !empty($_POST["useremail"])
    && isset($_POST["userpassword"]) && !empty($_POST["userpassword"])
) {
    $useremail = $_POST["useremail"];
    $password = $_POST["userpassword"];

    $query = "SELECT * FROM user 
    WHERE email='$useremail' AND password = '$password'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 0) {
        header("Location: signInPage.php");
        exit;
    } else {
        $row = mysqli_fetch_row($result);

        session_start();

        $_SESSION["isLoggedIn"] = 1;
        $_SESSION["useremail"] = $useremail;

        if ($row[7] == 1) {
            header("Location: workerPage.php");
            exit;
        } elseif ($row[10] == 1) {
            header("Location: DonatorPage.php");
            exit;
        } else {
            header("Location: workDonatePage.php");
            exit;
        }
    }
} else {
    header("Location: signInPage.php");
    exit;
}

ob_end_flush();
?>


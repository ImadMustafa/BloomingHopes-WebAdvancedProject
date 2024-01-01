<?php

$db_hostname = 'localhost';
$db_database = 'blooming_hopes_org';
$db_username = 'root';
$db_password = '';
$conn = mysqli_connect($db_hostname,$db_username,$db_password,$db_database);

if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>

<?php

$host = "sql313.infinityfree.com";
$user = "if0_42963174";
$password = "YOUR_NEW_PASSWORD";
$database = "if0_42963174_ecommerce";

$con = mysqli_connect($host, $user, $password, $database);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
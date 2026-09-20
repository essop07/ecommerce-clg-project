<?php
// Database connection settings

if (isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST'] === 'mystore-rayhan.infinityfree.io') {
    // InfinityFree
    $host = "sql313.infinityfree.com";
    $user = "if0_42963174";
    $password = "MOTALA10";
    $database = "if0_42963174_ecommerce";
} else {
    // Local XAMPP
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "ecommerce";
}

$con = mysqli_connect($host, $user, $password, $database);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<?php
// Detect whether we're running locally (XAMPP) or on the live server
$isLocal = in_array($_SERVER['SERVER_NAME'] ?? '', ['localhost', '127.0.0.1'], true);

if ($isLocal) {
    // XAMPP
    $host     = "localhost";
    $user     = "root";
    $password = "";
    $database = "ecommerce";
} else {
    // InfinityFree
    $host     = "sql313.infinityfree.com";
    $user     = "if0_42963174";
    $password = "MOTALA10"; // <- paste it here (click the eye icon to reveal it)
    $database = "if0_42963174_ecommerce";
}

$con = mysqli_connect($host, $user, $password, $database, 3306);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_set_charset($con, "utf8mb4");
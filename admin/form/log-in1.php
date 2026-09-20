<?php
session_start();
include '../../product/config.php';

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $userpassword = $_POST['userpassword'];

    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$userpassword'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION["admin"] = $row['username'];
        header("Location: ../mystore.php");
        exit();
    } else {
        echo "<script>alert('Invalid username or password'); window.location.href='log-in.php';</script>";
    }
}
?>
<?php
session_start();
include '../../product/config.php';

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $userpassword = $_POST['userpassword'];

    $sql = "SELECT * FROM tbluser WHERE username='$username' AND userpassword='$userpassword'";
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user'] = $row['username'];
        $_SESSION['user_id'] = $row['id'];
        header("Location: ../Home.php");
        exit();
    } else {
        echo "<script>alert('Invalid username or password'); window.location.href='login.php';</script>";
    }
}
?>

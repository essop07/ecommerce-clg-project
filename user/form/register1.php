<?php
include '../../product/config.php';

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $useremail = $_POST['useremail'];
    $usernumber = $_POST['usernumber'];
    $userpassword = $_POST['userpassword'];

    $sql = "INSERT INTO tbluser (username, useremail, usernumber, userpassword) VALUES ('$username','$useremail','$usernumber','$userpassword')";
    mysqli_query($con, $sql);

    header("Location: login.php");
    exit();
}
?>

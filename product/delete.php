<?php
include 'config.php';
if(isset($_GET['id'])) {
    $id = intval($_GET['id']);
    mysqli_query($con, "DELETE FROM tblproduct WHERE id=$id");
    header("Location: viewproduct.php");
    exit();
}
?>
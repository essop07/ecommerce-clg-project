<?php
if(isset($_POST['submit']))
{
    include 'config.php';
    $Pname=$_POST["Pname"];
    $Pprice=$_POST["Pprice"];
    $Pimage=$_FILES["Pimage"];
    $image_loc=$_FILES["Pimage"]["tmp_name"];
    $image_name=$_FILES["Pimage"]["name"];
    $image_des="Uploadimage/".$image_name;
    move_uploaded_file($image_loc,"Uploadimage/".$image_name);
    $Pcategory=$_POST["Pages"];
    $Pquantity=$_POST["Pquantity"];
    //insert product
    mysqli_query($con,"INSERT INTO tblproduct (Pname,Pprice,Pimage,Pcategory,Pquantity)VALUES('$Pname','$Pprice','$image_des','$Pcategory','$Pquantity')");
    header("Location: index.php");
}
?>
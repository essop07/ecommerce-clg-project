<?php
session_start();
include '../product/config.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $total_amount = $_POST['total_amount'];
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $customer_address = $_POST['customer_address'];
    $customer_phone = $_POST['customer_phone'];
    $payment_method = $_POST['payment_method'];
    $status = "Order Placed";

    $sql = "INSERT INTO oder (customer_name, customer_email, customer_address, customer_phone, total_amount, payment_method, status)
            VALUES ('$customer_name','$customer_email','$customer_address','$customer_phone','$total_amount','$payment_method','$status')";
    mysqli_query($con, $sql);
    $order_id = mysqli_insert_id($con);

    if(isset($_SESSION['cart'])) {
        foreach($_SESSION['cart'] as $item) {
            $pname = $item['product_name'];
            $pprice = $item['product_price'];
            $pqty = $item['product_quantity'];
            mysqli_query($con, "INSERT INTO order_items (order_id, product_name, product_price, product_quantity)
                VALUES ($order_id, '$pname', '$pprice', '$pqty')");
        }
    }

    // Clear cart after order is placed
    unset($_SESSION['cart']);

    header("Location: thank_you.php?order_id=" . $order_id);
    exit();
}
?>
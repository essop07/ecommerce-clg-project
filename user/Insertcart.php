<?php
session_start();

if(!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Add new item to cart
if(isset($_POST['addcart'])) {
    $_SESSION['cart'][] = array(
        'product_name' => $_POST['Pname'],
        'product_price' => $_POST['Pprice'],
        'product_quantity' => $_POST['Pquantity']
    );
    header("Location: Home.php");
    exit();
}

// Update quantity of an existing cart item
if(isset($_POST['update'])) {
    foreach($_SESSION['cart'] as $key => $value) {
        if($value['product_name'] == $_POST['Pname']) {
            $_SESSION['cart'][$key]['product_quantity'] = $_POST['Pquantity'];
        }
    }
    header("Location: viewcart.php");
    exit();
}

// Remove an item from cart
if(isset($_POST['remove'])) {
    foreach($_SESSION['cart'] as $key => $value) {
        if($value['product_name'] == $_POST['item']) {
            unset($_SESSION['cart'][$key]);
        }
    }
    $_SESSION['cart'] = array_values($_SESSION['cart']);
    header("Location: viewcart.php");
    exit();
}
?>
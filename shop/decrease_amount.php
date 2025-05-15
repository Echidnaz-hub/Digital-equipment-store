<?php
    session_start();
    $product_id = $_POST['product_id'];
    if ($_SESSION['cart'.$product_id]['quantity'] > 1) {
        $_SESSION['cart'.$product_id]['quantity'] -= 1;
    }
    echo $product_id;
    header('Location: cart.php');
?>
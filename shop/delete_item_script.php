<?php
    session_start();
    $product_id = $_POST['product_id'];
    echo $product_id;
    unset($_SESSION['cart'.$product_id]);
    echo $product_id;
    header('Location: cart.php');
?>
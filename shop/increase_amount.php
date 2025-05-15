<?php
    session_start();
    $product_id = $_POST['product_id'];
    echo $product_id;
    $_SESSION['cart'.$product_id]['quantity'] += 1;
    header('Location: cart.php');
?>
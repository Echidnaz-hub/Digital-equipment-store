<?php
    session_start();
    $product_id = $_GET['product_id'];

    $connect = mysqli_connect('localhost', 'root', '', 'phoneshop');
    $result = mysqli_query($connect, "SELECT * FROM `products` WHERE `id` = '$product_id'");
    $product = mysqli_fetch_assoc($result);

    $_SESSION['cart'.$product_id] = [
        "id" => $product_id,
        "name" => $product['name'],
        "price" => $product['price'],
        "image" => $product['image'],
        "quantity" => 1,
    ];
    header('Location: cart.php');
?>
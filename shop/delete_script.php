<?php
    session_start();

    $id = $_POST['user_id'];
    $connect = mysqli_connect('localhost', 'root', '', 'phoneshop');
    $delete_product = mysqli_query($connect, "DELETE FROM products WHERE `products`.`id` = $id");

    header('Location: admin.php');
?>
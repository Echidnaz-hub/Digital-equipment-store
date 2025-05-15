<?php
    session_start();

    $amount = $_POST['amount'];
    $user_id = $_SESSION['user']['id'];

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $connect = mysqli_connect('localhost', 'root', '', 'phoneshop');
    $create_order = mysqli_query($connect, "INSERT INTO `orders` (`id`, `user_id`, `created_at`, `price`) VALUES (NULL, '$user_id', NOW(), '$amount')");
    $all_query = mysqli_query($connect, "SELECT * FROM `orders`");
    foreach ($all_query as $value) {
        $last_id = array_shift(array_values($value));
    }
    echo $last_id;
    for ($i == 1; $i <= 200; $i++) {
        if (isset($_SESSION['cart'.$i])) {
            $name = $_SESSION['cart'.$i]['name'];
            $price = $_SESSION['cart'.$i]['price'];
            $image = $_SESSION['cart'.$i]['image'];
            $quantity = $_SESSION['cart'.$i]['quantity'];
            $connect = mysqli_connect('localhost', 'root', '', 'phoneshop');
            $order_product = mysqli_query($connect, "INSERT INTO `order_items` (`id`, `order_id`, `name`, `price`, `image`, `quantity`) VALUES (NULL, '$last_id', '$name', '$price', '$image', '$quantity')");
            echo $order_product;
        }
    }
?>
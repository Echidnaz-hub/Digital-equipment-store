<?php
    session_start();

    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image'];
    $image_name = $image['name'];
    $id = $_POST['id'];

    $connect = mysqli_connect('localhost', 'root', '', 'phoneshop');
    $check_user = mysqli_query($connect, "UPDATE `products` SET `name` = '$name', `price` = '$price', `image` = '$image_name' WHERE `products`.`id` = $id;");
    if(isset($_FILES['image'])){
        move_uploaded_file($_FILES['image']['tmp_name'], "media/". $_FILES['image']['name']);
    } else {
        echo "image not found!";
    }

    header('Location: admin.php');
?>
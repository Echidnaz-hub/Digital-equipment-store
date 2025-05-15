<?php
    session_start();

    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image'];
    $image_name = $image['name'];
    $connect = mysqli_connect('localhost', 'root', '', 'phoneshop');
    $check_user = mysqli_query($connect, "INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES (NULL, '$name', '$price', '$image_name');");
    if(isset($_FILES['image'])){
        move_uploaded_file($_FILES['image']['tmp_name'], "media/". $_FILES['image']['name']);
    } else {
        echo "image not found!";
    }
    // file_put_contents($image);
    
    $_SESSION['added'] = 'Продукт добавлен';

    header('Location: admin.php');
?>
<?php
    session_start();

    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);
    $connect = mysqli_connect('localhost', 'root', '', 'phoneshop');
    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");
    
    if (mysqli_num_rows($check_user) > 0) {
        $user = mysqli_fetch_assoc($check_user);
        $_SESSION['user'] = [
            "id" => $user['id'],
            "email" => $user['email'],
            "password" => $user['password'],
            "status" => $user['status'],
        ];

        header('Location: index.php');
    } else {
        $_SESSION['login_message'] = 'Неверный логин или пароль';
        header('Location: login.php');
    }
?>
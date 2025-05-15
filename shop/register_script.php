<?php

    session_start();

    $fio = $_POST['fio'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($email == 'admin@samohod.ru' && $password == 'QWEasd123') {
        $status = 'admin';
    } else {
        $status = 'user';
    }
    
    if (strlen($password) < 6) {
        $_SESSION['register_message'] = 'Минимальная длина пароля - 6 символов';
        echo $_SESSION['register_message'];
        header("Location: register.php");
    } else {
        $connect = mysqli_connect('localhost', 'root', '', 'phoneshop');
        $password = md5($password);
        $user = mysqli_query($connect, "INSERT INTO `users` (`id`, `fio`, `email`, `password`, `created_at`, `status`) VALUES (NULL, '$fio', '$email', '$password', NOW(), '$status');");
        header("Location: login.php");
    }
?>
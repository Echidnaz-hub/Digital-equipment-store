<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"> 
    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="style.css">
    <script src="validation.js" defer></script>
    <title>Магазин «Самоход»</title>
</head>
<body>
    <div class="wrapper">
        <div class="content">
            <header class="header">
                <div class="header__upper">
                    <div class="header__container">
                        <div class="header__info">
                            <div class="header__email">
                                <img src="images/email.png" alt=""> <a href="mailto:asia_trade@internet.ru" class="header__href">samohod@gmail.ru</a>
                            </div>
                            <?php 
                                if (!isset($_SESSION['user'])) { ?>
                                <div class="header__phone">
                                    <a href="register.php">Регистрация</a>&nbsp;
                                    |&nbsp;<a href="login.php">Авторизация</a>
                                </div>
                            <?php 
                                } else if (isset($_SESSION['user'])) {
                                    if ($_SESSION['user']['status'] == 'admin') { ?> 
                                <div class="header__phone">
                                    <a href="admin.php">Панель</a>&nbsp;
                                    |&nbsp;<a href="logout.php">Выйти</a>
                                </div>
                             <?php 
                                }} if (isset($_SESSION['user'])) {
                                    if ($_SESSION['user']['status'] == 'user') { ?>
                                ?>
                                <div class="header__cart">
                                    <a href="cart.php">Корзина</a>&nbsp;
                                    |&nbsp;<a href="logout.php">Выход</a>
                                </div>
                                <?php 
                                    }}
                                ?>
                        </div>
                    </div>
                </div>
                <div class="header__lower">
                    <div class="header__container">
                        <div class="header__company">
                            <a href="index.php" class="header__logo">
                                <img src="images/logo.png" alt="" class="header__apple">
                                <span class="header__name">Магазин «Самоход»</span>
                            </a>
                            <div class="header__label">
                                Оптовая торговля цифровой техникой
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header__container">
                    <nav class="header__nav">
                        <a href="#phone" class="header__link">Телефоны</a>
                        <a href="#tablet" class="header__link">Планшеты</a>
                        <a href="#laptop" class="header__link">Ноутбуки</a>
                        <a href="#display" class="header__link">Мониторы</a>
                    </nav>
                </div>
            </header>
            <section>
                <div class="main">
                    <div class="main__container">
                        <div class="main__title" id="about">
                            Вход
                        </div>
                        <div class="body__data">
                        <form action="login_script.php" method="POST" class="body__form">
                            <div class="body__field">
                                <input type="email" class="body__input" name="email" placeholder="Email" require>
                            </div>
                            <div class="body__field">
                                <input type="password" class="body__input" name="password" placeholder="Пароль" require>
                            </div>
                            <div class="body__btn">
                                <button type="submit" class="body__button">Войти</button>
                            </div>
                            <div class="body__gap">
                            <?php 
                                if (isset($_SESSION['login_message'])) { 
                                    echo $_SESSION['login_message'];
                                    unset($_SESSION['login_message']);
                                ?> 
                            <?php } ?>
                            </div>
                            <div class="body__register">
                                <a href="register.php" class="body__link_register">Регистрация</a>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </section>
        </div>
        <footer class="footer">
            <div class="footer__container">
                <div class="footer__content">
                    <div class="footer__copyright">
                        <p>2023 © Магазин «Самоход»</p>
                        <p>Все права защищены</p>
                    </div>
                    <div class="footer__info">
                        <div class="footer__other">
                            <div class="footer__address">
                                г. Барнаул, ул. Трактовая, д. 74Д
                            </div>
                            <div class="footer__email">
                                <a href="mailto:asia_trade@internet.ru" class="footer__mail">samohod@gmail.ru</a>
                            </div>
                            <div class="footer__schedule">
                                Прием заявок с 09:00 до 17:00
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
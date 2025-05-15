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
    <script src="menu.js" defer></script>
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
                <div class="search">
                    <div class="search__container">
                        <div class="search__list">
                            <a href="add_product.php"><img src="images/add.png" alt="" class="search__add"></a>
                            <div class="search__bar">
                                <div class="search__indicator search__indicator_1">
                                    id
                                </div>
                                <div class="search__indicator search__indicator_2">
                                    название
                                </div>
                                <div class="search__indicator search__indicator_3">
                                    стоимость
                                </div>
                                <div class="search__indicator search__indicator_4">
                                    изображение
                                </div>
                            </div>    
                            <?php
                                $connect = mysqli_connect('localhost', 'root', '', 'phoneshop');
                                $products = mysqli_query($connect, "SELECT * FROM `products`");
                                while ($product = mysqli_fetch_assoc($products)) {
                                ?>
                                <div class="search__user">                      
                                    <div class="search__id"><?php echo $product['id']?></div>
                                    <div class="search__email"><?php echo $product['name']?></div>
                                    <div class="search__password"><?php echo $product['price']?> ₽</div>
                                    <div class="search__pic"><img src="media/<?php echo $product['image']?>" alt=""></div>
                                    <a href="change_product.php?id=<?= $product['id'] ?>">
                                    <input type="hidden" name="user_id" value=<?php echo $product['id']?>>
                                    <button class="search__change"><img src="images/pencil.png" alt=""></button>
                                    </a>
                                    <form action="delete_script.php" method="POST">
                                    <input type="hidden" name="user_id" value=<?php echo $product['id']?>>
                                    <button class="search__delete">✕</button>
                                    </form>
                                </div>
                            <?php
                                }
                            ?>
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
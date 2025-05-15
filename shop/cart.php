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
                <div class="main">
                    <div class="main__container">
                        <div class="main__title" id="about">
                            Корзина
                        </div>
                        <div class="main__cart gap">
                            <div class="main__items">
                                <?php
                                $amount = 0;
                                $count = 0;
                                for ($j = 1; $j <= 200; $j++) {
                                    if (isset($_SESSION['cart'.$j])) {
                                        $maximal = $j;
                                    } else if ($j == 200 && (!isset($maximal))) {
                                        $maximal = 0;
                                    }
                                }
                                for ($i = 1; $i < $maximal + 1; $i++) {
                                    if (!isset($_SESSION['cart'.$i])) {
                                        continue;
                                    } else {
                                        $amount += $_SESSION['cart'.$i]['quantity'] * $_SESSION['cart'.$i]['price'];
                                        $count += 1;
                                    }
                                    ?>
                                    <div class="main__item">
                                        <div class="main__thumb">
                                            <img src="media/<?php echo $_SESSION['cart'.$i]['image']?>" alt="">
                                        </div>
                                        <div class="main__alias">       
                                            <?php echo $_SESSION['cart'.$i]['name']; ?>      
                                        </div>
                                        <div class="main__cost">
                                        <?php echo $_SESSION['cart'.$i]['price']; ?> ₽   
                                        </div>
                                        <div class="main__change">
                                        <form action="decrease_amount.php" method="POST">
                                            <input type="hidden" name="product_id" value="<?php echo $i ?>">
                                            <button>-</button>
                                        </form>
                                            <input type="text" value="<?php echo $_SESSION['cart'.$i]['quantity'] ?>" readonly>
                                        <form action="increase_amount.php" method="POST">
                                            <input type="hidden" name="product_id" value="<?php echo $i ?>">
                                            <button>+</button>
                                        </form>
                                        </div>
                                        <div class="main__delete">
                                            <form action="delete_item_script.php" method="POST">
                                                <input type="hidden" name="product_id" value="<?php echo $i ?>">
                                                <button>Удалить</button>
                                            </form>
                                        </div>
                                    </div>
                                <?php
                                    }
                                ?>
                            </div>
                            <div class="main__registration">
                                <div class="main__submit">
                                    <form action="order_script.php" method="POST">
                                        <input type="hidden" name="amount" value="<?php echo $amount ?>">
                                        <button type="submit">Перейти к оформлению</button>
                                    </form>
                                </div>
                                <div class="main__details">
                                    <div class="main__bar">
                                        <div class="main__label">
                                            Ваша корзина
                                        </div>
                                        <div class="main__result">
                                            <?php echo $count; ?> товаров
                                        </div>
                                    </div>

                                    <div class="main__bar">
                                        <div class="main__label">
                                            Стоимость
                                        </div>
                                        <div class="main__result">
                                            <?php echo $amount; ?> руб
                                        </div>
                                    </div>
                                </div>
                            </div>
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
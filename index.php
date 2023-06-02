<?php 
include 'data/products.php';

$products = $productsData;
if (isset($_GET['category'])) {
    $products = [];
    $activeCategory = $_GET['category'];
    foreach ($productsData as $item) {
        if (in_array($activeCategory, $item['categories'])) {
            $products[] = $item;
        }
    }
}
?>
<?php include 'layout/head.php' ?>

<div class="container">
    <div class="catalog">
        <div class="catalog__img">
            <img loading="lazy" src="/img/header-img.png" alt="">
        </div>
        <div class="catalog__sale">
            <p>ЛИШЕ СЬОГОДНІ ЗНИЖКА -50%</p>
        </div>

        <div class="catalog__wrapper catalog__wrapper-activ">
            <?php if (!empty($products)) : ?>
                <?php foreach ($products as $item) : ?>
                    <?php include 'layout/product-item.php' ?>
                <?php endforeach ?>
            <?php else : ?>
                <p>---</p>
            <?php endif ?>
        </div>
    </div>
</div>
<div class="popup">
            <div class="popup__container">
                <div class="popup__wrapper">
                    <div class="formbox">
                                <div class="formbox-text">
                                    <span>Замовте зараз</span>
                                    <p>та наш менеджер перездвонить Вам за 10 хвилин!</p>
                                </div>
                                <form id="order_form"  class="main-order-form main-form" action="zakaz.php" method="post">
                                    <input class="field" name="name" type="text" placeholder="Ваше ім'я" required>
                                    <input class="field" name="phone" type="tel" placeholder="Ваш телефон" required>
                                    <button class="pay">Замовити зараз</button>
                                </form>
                                <button class="close-button"><img src="img/close.png" alt=""></button>
                    </div>
                    
                </div>
            </div>
        </div>
<?php include 'layout/footer.php' ?>

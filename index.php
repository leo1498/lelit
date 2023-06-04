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
            <img loading="lazy" src="img/header-img.png" alt="">
        </div>
        <div class="catalog__sale">
            <p>
                ЛИШЕ СЬОГОДНІ ЗНИЖКА -50%
            </p>
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

<?php include 'layout/footer.php' ?>
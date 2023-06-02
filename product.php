<?php
include 'data/products.php';

$id = $_GET['id'];

foreach ($productsData as $product) {
    if (isset($product['code']) && $product['code'] === $id) {
        $product = $product;
        break;
    }
}
?>

<?php include 'layout/head.php' ?>

<div class="container">
    <div class="article">
        <div class="article__slider">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php if ($product['img']) : ?>
                        <?php foreach ($product['img'] as $image) : ?>
                            <div class="swiper-slide">
                                <img src="<?php echo $image ?>" alt="">
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>

        <div class="article__cart">
            <div class="article__cart_name"><?php echo $product['title'] ?></div>
            <div class="article__cart_wrapper">
                <div class="article__cart_wrapper-charac">
                    <table class="charac">
                        <h6>Характеристики</h6>
                        <tbody>
                            <?php if ($product['specification']['completeness']) : ?>
                                <tr>
                                    <th>Комплектність</th>
                                    <td><?php echo $product['specification']['completeness'] ?></td>
                                </tr>
                            <?php endif ?>
                            <?php if ($product['specification']['brand']) : ?>
                                <tr>
                                    <th>Виробник</th>
                                    <td><?php echo $product['specification']['completeness'] ?></td>
                                </tr>
                            <?php endif ?>
                            <?php if ($product['specification']['packaging']) : ?>
                                <tr>
                                    <th>Упаковка</th>
                                    <td><?php echo $product['specification']['packaging'] ?></td>
                                </tr>
                            <?php endif ?>
                            <?php if ($product['specification']['material']) : ?>
                                <tr>
                                    <th>Склад</th>
                                    <td><?php echo $product['specification']['material'] ?></td>
                                </tr>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
                <div class="article__cart_wrapper-size">
                    <table class="charac">
                        <h6>Розміри</h6>
                        <tbody>
                            <?php if ($product['specification']['size_duvetcover']) : ?>
                                <tr>
                                    <th>Підковдра</th>
                                    <td><?php echo $product['specification']['size_duvetcover'] ?></td>
                                </tr>
                            <?php endif ?>
                            <?php if ($product['specification']['size_sheet']) : ?>
                                <tr>
                                    <th>Простирадло</th>
                                    <td><?php echo $product['specification']['size_sheet'] ?></td>
                                </tr>
                            <?php endif ?>
                            <?php if ($product['specification']['size_duvetcover']) : ?>
                                <tr>
                                    <th>Наволочка</th>
                                    <td><?php echo $product['specification']['size_duvetcover'] ?></td>
                                </tr>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="article__cart_price">
                <span><?php echo $product['price'] ?> грн</span>
            </div>
            <button 
                class="article__cart_button add-to-cart"
                data-name="<?php echo $item['code'] ?>"
                data-price="<?php echo $product['price'] ?>" 
                data-img='<?php echo $product['img'][0] ?>'
            >
                Купити
            </button>
        </div>
    </div>
</div>

<?php include 'layout/footer.php' ?>
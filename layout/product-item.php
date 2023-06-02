<div class="catalog__item">
    <a href="/product.php?id=<?php echo $item['code'] ?>" class="catalog__item_header">
        <span><?php echo $item['title'] ?></span>
    </a>
    <a href="/product.php?id=<?php echo $item['code'] ?>"  class="catalog__item_img">
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php if ($item['img']) : ?>
                    <?php foreach ($item['img'] as $image) : ?>
                        <div class="swiper-slide">
                            <img loading="lazy" src="<?php echo $image ?>" alt="">
                        </div>
                    <?php endforeach ?>
                <?php endif ?>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </a>
    <div class="catalog__item_bottom">
        <?php if ($item['specification']['material']) : ?>
            <div class="bottom__for">
                <div class="bottom__for_icon"></div>
                <div class="bottom__for_text">
                    <span>Матеріал</span><br>
                    <b><?php echo $item['specification']['material'] ?></b>
                </div>
            </div>
        <?php endif ?>
        <?php if ($item['specification']['size_duvetcover']) : ?>
            <div class="bottom__for">
                <div class="bottom__for_icon-2"></div>
                <div class="bottom__for_text">
                    <span> Розмір підковдри</span>
                    <b><?php echo $item['specification']['size_duvetcover'] ?></b>
                </div>
            </div>
        <?php endif ?>
        <?php if ($item['specification']['size_sheet']) : ?>
            <div class="bottom__for">
                <div class="bottom__for_icon-3"></div>
                <div class="bottom__for_text">
                    <span> Розмір простирадла</span>
                    <b><?php echo $item['specification']['size_sheet'] ?></b>
                </div>
            </div>
        <?php endif ?>
        <?php if ($item['specification']['size_pillowcase']) : ?>
            <div class="bottom__for">
                <div class="bottom__for_icon-4"></div>
                <div class="bottom__for_text">
                    <span> Розмір наволочок</span>
                    <b><?php echo $item['specification']['size_pillowcase'] ?></b>
                </div>
            </div>
        <?php endif ?>
    </div>
    <div class="catalog__item_price">
        <div class="price__bl">
            <div class="price__bl_old">
                <span class="s1"><?php echo $item['price_old'] ?></span>
                <span class="s2">грн.</span>
            </div>
            <div class="price__bl_new">
                <span class="s1"><?php echo $item['price'] ?></span>
                <span class="s2">грн.</span>
            </div>
        </div>
        <button
            class="button add-to-cart" 
            data-name="<?php echo $item['code'] ?>" 
            data-price="<?php echo $item['price'] ?>" 
            data-img='<?php echo $item['img'][0] ?>'
        >
            Купити
        </button>
    </div>
</div>

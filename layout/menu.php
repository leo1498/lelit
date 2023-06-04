<?php include 'data/categories.php' ?>
<?php
    $category = isset($_GET['category']) ? $_GET['category'] : null;
?>

<header class="header">
    <div class="header__body">
        <a href="#" class="header__logo">
            <img src="img/logo.png" alt="">
        </a>
        <nav class="header__menu">
            <ul class="header__menu_list">
                <?php foreach ($categoriesData as $item) : ?>
                    <li class="header__menu_link">
                        <a 
                            href="/?category=<?php echo $item['url'] ?>" 
                            class="header__menu_item <?php echo $category == $item['url'] ? 'header__menu_item-activ' : '' ?>"
                        >
                            <?php echo $item['title'] ?>
                        </a>
                    </li>
                <?php endforeach ?>
            </ul>
        </nav>
        
    </div>
    
    <nav class="header__menu-mobile">
        <ul class="header__menu_list">
            <?php foreach ($categoriesData as $item) : ?>
                <li class="header__menu_link">
                    <a 
                        href="?category=<?php echo $item['url'] ?>" 
                        class="header__menu_item <?php $category == $item['url'] ? 'header__menu_item-activ' : '' ?>"
                    >
                        <?php echo $item['title'] ?>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>
    </nav>
</header>

<?php

use Modules\Stogare;

$category = $data['category'];
$user = $data['user'];
$viewMost = $data['viewMost'];
$products = $data['products'];
include(APP_DIR . '/resources/views/layouts/client/header.php') ?>
<div class="header">

    <div class="header-banner">

        <div class="row container ">

            <div class="col">

                <div class="content">
                    <span class="subtitle">

                        In this season, find the best

                    </span>

                    <h1>Sports equipment collections </h1>

                    <div class="btn">

                        <button>

                            Start your search

                        </button>

                    </div>
                </div>

            </div>

            <div class="image">
                <img src="<?= APP_URL ?>public/assets/banner-model.png" alt="">
            </div>

        </div>

    </div>

</div>
<main class="main container">
    <div class="no-border category">
        <div class="section-title_wapper">
            <span class="">
                <i class="fa-solid fa-tag"></i> Category
            </span>
            <h2 class="title text-3xl">
                Browser by category
            </h2>
        </div>
        <div class="click-slider">
            <div class="click-next">
                <button class="slider-arrow prve-arrow">
                    <i class="fa-solid fa-arrow-left"></i>
                </button>
                <button class="slider-arrow next-arrow">
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
            <div class="click-list">
                <div class="click-track">
                    <?php foreach ($category as $item) { ?>
                        <a href="shop/<?= $item['id'] ?>/category" class="click-slide">

                            <img src="<?= APP_URL ?>public/upload/<?= $item['imager'] ?>" alt="" draggable="false">
                            <h6 href="shop/<?= $item['id'] ?>/category"><?= $item['name'] ?></h6>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="same-product">
        <div class="section-title_wapper">
            <span>
                <i class="fa-regular fa-eye"></i> Views
            </span>
            <h2 class="title text-3xl">
                Truy cập nhiều nhất
            </h2>
        </div>
        <div class="no-border products-slider">
            <div class="click-next">
                <button class="slider-products_arrow prve-products_arrow">
                    <i class="fa-solid fa-arrow-left"></i>
                </button>
                <button class="slider-products_arrow next-products_arrow">
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
            <div class="product-list">
                <div class="product-track">
                    <?php foreach ($viewMost as $item) { ?>
                        <form class="product-form" action="" method="post">
                            <div class="product-card">
                                <div class="product-thumbnail">
                                    <?php if ($item['discount'] != 0 || $item['discount'] != null) { ?>
                                        <div class="discount">
                                            <i class="fa-solid fa-tag"></i>
                                            <span>-<?= intval(($item['discount'] / $item['price']) * 100) ?>%</span>
                                        </div>
                                    <?php } ?>
                                    <a href="<?= APP_URL ?>product/<?= $item['id'] ?>/detail" onclick="setView(<?= $item['id'] ?>)"></a>
                                    <img src="<?= APP_URL ?><?= Stogare::url($item['imager']) ?>" alt="">
                                    <div class="action">
                                        <?php if (isset($item['variant'])) { ?>
                                            <div class="select-option">
                                                S
                                            </div>
                                            <div class="select-option">
                                                M
                                            </div>
                                            <div class="select-option">
                                                XL
                                            </div>
                                            <div class="select-option">
                                                XXL
                                            </div>
                                        <?php } else { ?>
                                            <div class="add-cart no-atributive">
                                                <i class="fa-solid fa-cart-shopping"></i>
                                                <span>Add to cart</span>
                                            </div>
                                            <div class="quick-view no-atributive">
                                                <i class="fa-solid fa-expand"></i>
                                                <span>Quick view</span>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="show-info">
                                    <div class="variant">
                                        <?php if (isset($item['variant'])) { ?>
                                            <div class="border-atributive sky-blue">
                                                <input type="radio" name="1" id="sky-blue" checked> <!-- chèn thêm id của product ở đây -->
                                                <label for="sky-blue" class="atributive"> <!-- thẻ label thì trỏ tới id đó -->
                                                    <i class="fa-solid fa-palette"></i>
                                                </label>
                                            </div>

                                            <div class="border-atributive green">
                                                <input type="radio" name="1" id="green">
                                                <label for="green" class="atributive">
                                                    <i class="fa-solid fa-palette"></i>
                                                </label>
                                            </div>

                                            <div class="border-atributive orange">
                                                <input type="radio" name="1" id="orange">
                                                <label for="orange" class="atributive">
                                                    <i class="fa-solid fa-palette"></i>
                                                </label>
                                            </div>

                                            <div class="border-atributive red">
                                                <input type="radio" name="1" id="red">
                                                <label for="red" class="atributive">
                                                    <i class="fa-solid fa-palette"></i>
                                                </label>
                                            </div>

                                            <div class="border-atributive Yellow">
                                                <input type="radio" name="1" id="Yellow">
                                                <label for="Yellow" class="atributive">
                                                    <i class="fa-solid fa-palette"></i>
                                                </label>
                                            </div>

                                            <div class="border-atributive violet">
                                                <input type="radio" name="1" id="violet">
                                                <label for="violet" class="atributive">
                                                    <i class="fa-solid fa-palette"></i>
                                                </label>
                                            </div>

                                            <div class="border-atributive pink">
                                                <input type="radio" name="1" id="pink">
                                                <label for="pink" class="atributive">
                                                    <i class="fa-solid fa-palette"></i>
                                                </label>
                                            </div>
                                        <?php } ?>
                                    </div>

                                    <div class="product-content">
                                        <h2>
                                            <?= $item['name'] ?>
                                        </h2>
                                        <p>

                                        </p>
                                    </div>

                                    <div class="product-status">
                                        <div class="price">
                                            <?= number_format($item['price'] - $item['discount'], 0, ',', '.') ?><u>đ</u>
                                            <?php if ($item['discount'] != null && $item['discount'] >= 10000) { ?>
                                                <sup><s style="color:red;"><span style="color:red;"><?= number_format($item['price'], 0, ',', '.') ?><u>đ</u></span></s></sup>
                                            <?php } ?>
                                        </div>
                                        <div class="rating">
                                            <i class="fa-solid fa-star"></i>
                                            <span>4.9 (<?= $item['view'] ?> review)</span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
    <div class="no-border products">
        <div class="section-title_wapper">
            <span>
                <i class="fa-solid fa-cart-shopping"></i> New
            </span>
            <h2 class="title text-3xl">
                Sản phẩm mới nhất
            </h2>
        </div>
        <div class="product-list">
            <div class="product-track">

                <?php foreach ($products as $product) { ?>
                    <form action="" method="post">
                        <div class="product-card">
                            <div class="product-thumbnail">
                                <?php if ($product['discount'] != 0 && $product['discount'] != null) { ?>
                                    <div class="discount">
                                        <i class="fa-solid fa-tag"></i>
                                        <span>-<?= intval($product['discount'] / $product['price'] * 100) ?>%</span>
                                    </div>
                                <?php } ?>
                                <a href="<?= APP_URL ?>product/<?= $product['id'] ?>/detail" onclick="setView(<?= $product['id'] ?>)"></a>
                                <img src="<?= APP_URL ?><?= Stogare::url($product['imager']) ?>" alt="">
                                <div class="action">
                                    <?php if (isset($product['variant'])) { ?>
                                        <div class="select-option">
                                            S
                                        </div>
                                        <div class="select-option">
                                            M
                                        </div>
                                        <div class="select-option">
                                            XL
                                        </div>
                                        <div class="select-option">
                                            XXL
                                        </div>
                                    <?php } else { ?>
                                        <div class="add-cart no-atributive">
                                            <i class="fa-solid fa-cart-shopping"></i>
                                            <span>Add to cart</span>
                                        </div>
                                        <div class="quick-view no-atributive">
                                            <i class="fa-solid fa-expand"></i>
                                            <span>Quick view</span>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="show-info">
                                <div class="variant">
                                    <?php if (isset($product['variant'])) { ?>
                                        <div class="border-atributive sky-blue">
                                            <input type="radio" name="1" id="sky-blue" checked> <!-- chèn thêm id của product ở đây -->
                                            <label for="sky-blue" class="atributive"> <!-- thẻ label thì trỏ tới id đó -->
                                                <i class="fa-solid fa-palette"></i>
                                            </label>
                                        </div>

                                        <div class="border-atributive green">
                                            <input type="radio" name="1" id="green">
                                            <label for="green" class="atributive">
                                                <i class="fa-solid fa-palette"></i>
                                            </label>
                                        </div>

                                        <div class="border-atributive orange">
                                            <input type="radio" name="1" id="orange">
                                            <label for="orange" class="atributive">
                                                <i class="fa-solid fa-palette"></i>
                                            </label>
                                        </div>

                                        <div class="border-atributive red">
                                            <input type="radio" name="1" id="red">
                                            <label for="red" class="atributive">
                                                <i class="fa-solid fa-palette"></i>
                                            </label>
                                        </div>

                                        <div class="border-atributive Yellow">
                                            <input type="radio" name="1" id="Yellow">
                                            <label for="Yellow" class="atributive">
                                                <i class="fa-solid fa-palette"></i>
                                            </label>
                                        </div>

                                        <div class="border-atributive violet">
                                            <input type="radio" name="1" id="violet">
                                            <label for="violet" class="atributive">
                                                <i class="fa-solid fa-palette"></i>
                                            </label>
                                        </div>

                                        <div class="border-atributive pink">
                                            <input type="radio" name="1" id="pink">
                                            <label for="pink" class="atributive">
                                                <i class="fa-solid fa-palette"></i>
                                            </label>
                                        </div>
                                    <?php } ?>
                                </div>

                                <div class="product-content">
                                    <h2>
                                        <?= $product['name'] ?>
                                    </h2>
                                    <p>

                                    </p>
                                </div>

                                <div class="product-status">
                                    <div class="price">
                                        <?= number_format($product['price'] - $product['discount'], 0, ',', '.') ?><u>đ</u>
                                        <?php if ($product['discount'] != null && $product['discount'] >= 10000) { ?>
                                            <sup><s style="color:red;"><span style="color:red;"><?= number_format($product['price'], 0, ',', '.') ?><u>đ</u></span></s></sup>
                                        <?php } ?>
                                    </div>
                                    <div class="rating">
                                        <i class="fa-solid fa-star"></i>
                                        <span>4.9 (98 review)</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                <?php } ?>

            </div>
        </div>
    </div>
</main>

<script>
    function setView(id) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "http://duan_mau.pro/365shop/setview/" + id, true);
        xmlhttp.send();
    }
</script>
<script src="<?= APP_URL ?>public/js/home.js"></script>
<?php include(APP_DIR . '/resources/views/layouts/client/footer.php') ?>
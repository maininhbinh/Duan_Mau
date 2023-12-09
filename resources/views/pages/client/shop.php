<?php

use Modules\Stogare;

if (isset($data['category'])) {
    $category = $data['category'];
}
$products = $data['products'];

include(APP_DIR . '/resources/views/layouts/client/header.php') ?>
<div class="container">
    <main class="shop">
        <?php if (isset($data['search'])) { ?>
            <div class="shop-title">
                <h2>
                    Tìm kiếm: <?= $data['keywork'] ?>
                </h2>
            </div>
        <?php } ?>
        <div class="shop-products">
            <?php if (!isset($data['search'])) { ?>
                <div class="shop-filter">
                    <?php if (isset($_SESSION['btn']['clear']) && $_SESSION['btn']['clear'] == true) { ?>
                        <form action="" method="get" class="clear">
                            <button name="clear" type="submit" class="button-clear_filter">
                                <span>clear</span>
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </form>
                    <?php } ?>
                    <div class="filter-category">

                        <div class="category-list">

                            <button class="category-button_filter">
                                Category
                                <i class="fa-solid fa-arrow-down"></i>
                            </button>
                            <form class="show-category" action="" method="get">
                                <div class="category">
                                    <div class="row-category">
                                        <input type="checkbox" name="" id="all" value="">
                                        <label for="all">All category</label>
                                    </div>
                                    <div class="border"></div>
                                    <?php foreach ($category as $item) { ?>
                                        <div class="row-category">
                                            <input type="checkbox" name="item[]" id="<?= $item['name'] ?>" value="<?= $item['id'] ?>" <?= isset($data['item']) && in_array($item['id'], $data['item']) ? 'checked' : '' ?>>
                                            <label for="<?= $item['name'] ?>"><?= $item['name'] ?></label>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="submit-filter_category">
                                    <form action="" method="get" class="clear">
                                        <button name="clear" type="submit" class="button-clear_filter">
                                            <span>clear</span>
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </form>
                                    <button class="button-submit" type="submit">
                                        Apply
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="filter-price">
                        <div class="price-list">
                            <button class="price-button_filter">
                                Xắp xếp theo giá
                                <i class="fa-solid fa-arrow-down"></i>
                            </button>
                            <form class="price-sort_fillter" action="" method="get">
                                <div class="sort">
                                    <div class="row-price">
                                        <input type="radio" name="order" id="all" value="">
                                        <label for="all">All price</label>
                                    </div>
                                    <div class="border"></div>
                                    <div class="row-price">
                                        <input type="radio" name="order" id="desc" value="desc" <?= $data['order'] == 'desc' ? 'checked' : '' ?>>
                                        <label for="desc">sắp xếp từ cao tới thấp</label>
                                    </div>
                                    <div class="row-price">
                                        <input type="radio" name="order" id="asc" value="asc" <?= $data['order'] == 'asc' ? 'checked' : '' ?>>
                                        <label for="asc">sắp xếp từ thấp tới cao</label>
                                    </div>
                                </div>
                                <div class="submit-filter_price">
                                    <form action="" method="get" class="clear">
                                        <button name="clear" type="submit" class="button-clear_filter">
                                            <span>clear</span>
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </form>
                                    <button class="button-submit" type="submit">
                                        Apply
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="show-products">
                <div class="product-list">
                    <div class="product-track">
                        <?php foreach ($products as $product) {
                            $description = html_entity_decode($product['description']);
                        ?>
                            <form action="" method="post">
                                <div class="product-card">
                                    <div class="product-thumbnail">
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
                                                <?= number_format($product['price'], 0, ',', '.') ?><u>đ</u>
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
        </div>
    </main>
</div>
<script>
    function setView(id) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "http://duan_mau.pro/365shop/setview/" + id, true);
        xmlhttp.send();
    }
</script>
<script src="<?= APP_URL ?>public/js/shop.js"></script>
<?php include(APP_DIR . '/resources/views/layouts/client/footer.php') ?>
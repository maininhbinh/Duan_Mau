<?php

use Modules\Stogare;

$productSame = $data['productSame'];
$product = $data['product'];
include(APP_DIR . '/resources/views/layouts/client/header.php') ?>
<div class="container detail-product">
    <div class="main-detail">
        <div class="thumbnail-product">
            <div class="detail-thumbnail_product">
                <?php if ($product['discount'] != 0 && $product['discount'] != null) { ?>
                    <div class="discount">
                        <i class="fa-solid fa-tag"></i>
                        <span>-<?= intval($product['discount'] / $product['price'] * 100) ?>%</span>
                    </div>
                <?php } ?>
                <img src="<?= APP_URL ?><?= Stogare::url($product['imager']) ?>" alt="">
            </div>
        </div>
        <div class="info-product">
            <div class="detail-info_product">
                <div class="name-product">
                    <h2>
                        <?= $product['name'] ?>
                    </h2>
                </div>
                <div class="price_product">
                    <span class="price">
                        <?= number_format($product['price'], 0, ',', '.') ?><u>đ</u>
                    </span>
                    <div class="space"></div>
                    <div class="raiting">
                        <i class="fa-solid fa-star"></i>

                        <div class="detail-raiting">
                            <span>4.9</span>
                            <span>·</span>
                            <span><?= $product['view'] ?> reviews</span>
                        </div>
                    </div>
                </div>
                <div class="variant">
                    <div class="color">
                        <div class="name-atributive">
                            <span>Color:</span>
                        </div>
                        <div class="atributive-color">

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

                        </div>
                    </div>
                    <div class="size">
                        <div class="name-atributive">
                            <span>Size:</span>
                        </div>
                        <div class="atributive-size">
                            <div class="border-atributive_size">
                                <input type="radio" name="size" id="m">
                                <label for="m">M</label>
                            </div>
                            <div class="border-atributive_size">
                                <input type="radio" name="size" id="S">
                                <label for="S">S</label>
                            </div>
                            <div class="border-atributive_size">
                                <input type="radio" name="size" id="L">
                                <label for="L">L</label>
                            </div>
                            <div class="border-atributive_size">
                                <input type="radio" name="size" id="XL">
                                <label for="XL">XL</label>
                            </div>
                            <div class="border-atributive_size">
                                <input type="radio" name="size" id="2XL">
                                <label for="2XL">2XL</label>
                            </div>
                            <div class="border-atributive_size">
                                <input type="radio" name="size" id="3XL">
                                <label for="3XL">3XL</label>
                            </div>
                        </div>
                    </div>

                    <div class="order-shopping">
                        <div class="quantity-control" data-quantity="">
                            <button class="quantity-btn down">
                                <svg viewBox="0 0 409.6 409.6">
                                    <g>
                                        <g>
                                            <path d="M392.533,187.733H17.067C7.641,187.733,0,195.374,0,204.8s7.641,17.067,17.067,17.067h375.467 c9.426,0,17.067-7.641,17.067-17.067S401.959,187.733,392.533,187.733z" />
                                        </g>
                                    </g>
                                </svg>
                            </button>
                            <input type="number" class="quantity-input" value="1" step="1" min="1" max="" name="quantity">
                            <button class="quantity-btn up">
                                <svg viewBox="0 0 426.66667 426.66667">
                                    <path d="m405.332031 192h-170.664062v-170.667969c0-11.773437-9.558594-21.332031-21.335938-21.332031-11.773437 0-21.332031 9.558594-21.332031 21.332031v170.667969h-170.667969c-11.773437 0-21.332031 9.558594-21.332031 21.332031 0 11.777344 9.558594 21.335938 21.332031 21.335938h170.667969v170.664062c0 11.777344 9.558594 21.335938 21.332031 21.335938 11.777344 0 21.335938-9.558594 21.335938-21.335938v-170.664062h170.664062c11.777344 0 21.335938-9.558594 21.335938-21.335938 0-11.773437-9.558594-21.332031-21.335938-21.332031zm0 0" />
                                </svg>
                            </button>
                        </div>
                        <button type="submit" class="add-cart">
                            <i class="fa-solid fa-cart-arrow-down"></i>
                            Add to cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="border"></div>
        <div class="description">
            <p>
                <?= html_entity_decode($product['description']) ?>
            </p>
        </div>
    </div>
    <div class="same-product">
        <div class="section-title_wapper">
            <span>
                <i class="fa-solid fa-cart-shopping"></i> New
            </span>
            <h2 class="title text-3xl">
                Sản phẩm cùng loại
            </h2>
        </div>
        <div class="no-border products-slider">
            <div class="click-next">
                <button class="slider-arrow prve-arrow">
                    <i class="fa-solid fa-arrow-left"></i>
                </button>
                <button class="slider-arrow next-arrow">
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
            <div class="product-list">
                <div class="product-track">

                    <?php foreach ($productSame as $item) { ?>
                        <form action="" method="post">
                            <div class="product-card">
                                <div class="product-thumbnail">
                                    <?php if ($item['discount'] != 0 && $item['discount'] != null) { ?>
                                        <div class="discount">
                                            <i class="fa-solid fa-tag"></i>
                                            <span>-<?= intval($item['discount'] / $item['price'] * 100) ?>%</span>
                                        </div>
                                    <?php } ?>
                                    <a href="<?= APP_URL ?>product/<?= $item['id'] ?>/detail"></a>
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
                                            <?= number_format($item['price'], 0, ',', '.') ?><u>đ</u>
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
</div>
<script src="<?= APP_URL ?>public/js/detail.js"></script>
<?php include(APP_DIR . '/resources/views/layouts/client/footer.php') ?>
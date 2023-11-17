<?php include(APP_DIR . '/resources/views/layouts/client/nav.php') ?>
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
            <span>
                <i class="fa-solid fa-tag"></i> Category
            </span>
            <h2 class="title">
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
                    <div class="click-slide">
                        <img src="<?= APP_URL ?>public/assets/category/elec-1.webp" alt="" draggable="false">
                        <h6>Computer</h6>
                    </div>
                    <div class="click-slide">
                        <img src="<?= APP_URL ?>public/assets/banner-kid.png" alt="img" draggable="false">
                        <h6>kids</h6>
                    </div>
                    <div class="click-slide">
                        <img src="<?= APP_URL ?>public/assets/category/elec-2.webp" alt="img" draggable="false">
                        <h6>Laptop</h6>
                    </div>
                    <div class="click-slide">
                        <img src="<?= APP_URL ?>public/assets/category/elec-11.webp" alt="img" draggable="false">
                        <h6>Headphones</h6>
                    </div>
                    <div class="click-slide">
                        <img src="<?= APP_URL ?>public/assets/category/elec-4.webp" alt="img" draggable="false">
                        <h6>Camera & Photosdfsdf</h6>
                    </div>
                    <div class="click-slide">
                        <img src="<?= APP_URL ?>public/assets/category/elec-5.webp" alt="img" draggable="false">
                        <h6>kids</h6>
                    </div>
                    <div class="click-slide">
                        <img src="<?= APP_URL ?>public/assets/category/elec-11.webp" alt="img" draggable="false">
                        <h6>Headphones</h6>
                    </div>
                    <div class="click-slide">
                        <img src="<?= APP_URL ?>public/assets/category/elec-4.webp" alt="img" draggable="false">
                        <h6>Camera & Photosdfsdf</h6>
                    </div>
                    <div class="click-slide">
                        <img src="<?= APP_URL ?>public/assets/category/elec-5.webp" alt="img" draggable="false">
                        <h6>kids</h6>
                    </div>
                    <div class="click-slide">
                        <img src="<?= APP_URL ?>public/assets/category/elec-11.webp" alt="img" draggable="false">
                        <h6>Headphones</h6>
                    </div>
                    <div class="click-slide">
                        <img src="<?= APP_URL ?>public/assets/category/elec-4.webp" alt="img" draggable="false">
                        <h6>Camera & Photosdfsdf</h6>
                    </div>
                    <div class="click-slide">
                        <img src="<?= APP_URL ?>public/assets/category/elec-5.webp" alt="img" draggable="false">
                        <h6>kids</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="no-border products">
        <div class="section-title_wapper">
            <span>
                <i class="fa-solid fa-cart-shopping"></i> Products
            </span>
            <h2 class="title">
                Browser by Products
            </h2>
        </div>
        <div class="product-list">
            <div class="product-track">

                <form action="" method="post">
                    <div class="product-card">
                        <div class="product-thumbnail">
                            <a href="<?= APP_URL ?>product/detail"></a>
                            <img src="<?= APP_URL ?>public/images/product-1.png" alt="">
                            <div class="action">
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
                            </div>
                        </div>
                        <div class="show-info">
                            <div class="variant">

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
                            </div>

                            <div class="product-content">
                                <h2>
                                    Leather Glove
                                </h2>
                                <p>Perfect mint green</p>
                            </div>

                            <div class="product-status">
                                <div class="price">
                                    $42
                                </div>
                                <div class="rating">
                                    <i class="fa-solid fa-star"></i>
                                    <span>4.9 (98 review)</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>

                <form action="" method="post">
                    <div class="product-card">
                        <div class="product-thumbnail">
                            <a href="<?= APP_URL ?>product/detail"></a>
                            <img src="<?= APP_URL ?>public/images/product-1.png" alt="">
                            <div class="action">
                                <div class="add-cart no-atributive">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                    <span>Add to cart</span>
                                </div>
                                <div class="quick-view no-atributive">
                                    <i class="fa-solid fa-expand"></i>
                                    <span>Quick view</span>
                                </div>
                            </div>
                        </div>
                        <div class="show-info">
                            <div class="variant">

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
                            </div>

                            <div class="product-content">
                                <h2>
                                    Leather Gloves
                                </h2>
                                <p>Perfect mint green</p>
                            </div>

                            <div class="product-status">
                                <div class="price">
                                    $42
                                </div>
                                <div class="rating">
                                    <i class="fa-solid fa-star"></i>
                                    <span>4.9 (98 review)</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>

                <form action="" method="post">
                    <div class="product-card">
                        <div class="product-thumbnail">
                            <a href="<?= APP_URL ?>product/detail"></a>
                            <img src="<?= APP_URL ?>public/images/product-1.png" alt="">
                            <div class="action">
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
                            </div>
                        </div>
                        <div class="show-info">
                            <div class="variant">

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
                            </div>

                            <div class="product-content">
                                <h2>
                                    Leather Gloves
                                </h2>
                                <p>Perfect mint green</p>
                            </div>

                            <div class="product-status">
                                <div class="price">
                                    $42
                                </div>
                                <div class="rating">
                                    <i class="fa-solid fa-star"></i>
                                    <span>4.9 (98 review)</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>

                <form action="" method="post">
                    <div class="product-card">
                        <div class="product-thumbnail">
                            <a href="<?= APP_URL ?>product/detail"></a>
                            <img src="<?= APP_URL ?>public/images/product-1.png" alt="">
                            <div class="action">
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
                            </div>
                        </div>
                        <div class="show-info">
                            <div class="variant">

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
                            </div>

                            <div class="product-content">
                                <h2>
                                    Leather Gloves
                                </h2>
                                <p>Perfect mint green</p>
                            </div>

                            <div class="product-status">
                                <div class="price">
                                    $42
                                </div>
                                <div class="rating">
                                    <i class="fa-solid fa-star"></i>
                                    <span>4.9 (98 review)</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>

                <form action="" method="post">
                    <div class="product-card">
                        <div class="product-thumbnail">
                            <a href="<?= APP_URL ?>product/detail"></a>
                            <img src="<?= APP_URL ?>public/images/product-1.png" alt="">
                            <div class="action">
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
                            </div>
                        </div>
                        <div class="show-info">
                            <div class="variant">

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
                            </div>

                            <div class="product-content">
                                <h2>
                                    Leather Gloves
                                </h2>
                                <p>Perfect mint green</p>
                            </div>

                            <div class="product-status">
                                <div class="price">
                                    $42
                                </div>
                                <div class="rating">
                                    <i class="fa-solid fa-star"></i>
                                    <span>4.9 (98 review)</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>

                <form action="" method="post">
                    <div class="product-card">
                        <div class="product-thumbnail">
                            <a href="<?= APP_URL ?>product/detail"></a>
                            <img src="<?= APP_URL ?>public/images/product-1.png" alt="">
                            <div class="action">
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
                            </div>
                        </div>
                        <div class="show-info">
                            <div class="variant">

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
                            </div>

                            <div class="product-content">
                                <h2>
                                    Leather Gloves
                                </h2>
                                <p>Perfect mint green</p>
                            </div>

                            <div class="product-status">
                                <div class="price">
                                    $42
                                </div>
                                <div class="rating">
                                    <i class="fa-solid fa-star"></i>
                                    <span>4.9 (98 review)</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>

                <form action="" method="post">
                    <div class="product-card">
                        <div class="product-thumbnail">
                            <a href="<?= APP_URL ?>product/detail"></a>
                            <img src="<?= APP_URL ?>public/images/product-1.png" alt="">
                            <div class="action">
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
                            </div>
                        </div>
                        <div class="show-info">
                            <div class="variant">

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
                            </div>

                            <div class="product-content">
                                <h2>
                                    Leather Gloves
                                </h2>
                                <p>Perfect mint green</p>
                            </div>

                            <div class="product-status">
                                <div class="price">
                                    $42
                                </div>
                                <div class="rating">
                                    <i class="fa-solid fa-star"></i>
                                    <span>4.9 (98 review)</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>

                <form action="" method="post">
                    <div class="product-card">
                        <div class="product-thumbnail">
                            <a href="<?= APP_URL ?>product/detail"></a>
                            <img src="<?= APP_URL ?>public/images/product-1.png" alt="">
                            <div class="action">
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
                            </div>
                        </div>
                        <div class="show-info">
                            <div class="variant">

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
                            </div>

                            <div class="product-content">
                                <h2>
                                    Leather Gloves
                                </h2>
                                <p>Perfect mint green</p>
                            </div>

                            <div class="product-status">
                                <div class="price">
                                    $42
                                </div>
                                <div class="rating">
                                    <i class="fa-solid fa-star"></i>
                                    <span>4.9 (98 review)</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>

                <form action="" method="post">
                    <div class="product-card">
                        <div class="product-thumbnail">
                            <a href="<?= APP_URL ?>product/detail"></a>
                            <img src="<?= APP_URL ?>public/images/product-1.png" alt="">
                            <div class="action">
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
                            </div>
                        </div>
                        <div class="show-info">
                            <div class="variant">

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
                            </div>

                            <div class="product-content">
                                <h2>
                                    Leather Gloves
                                </h2>
                                <p>Perfect mint green</p>
                            </div>

                            <div class="product-status">
                                <div class="price">
                                    $42
                                </div>
                                <div class="rating">
                                    <i class="fa-solid fa-star"></i>
                                    <span>4.9 (98 review)</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>

                <form action="" method="post">
                    <div class="product-card">
                        <div class="product-thumbnail">
                            <a href="<?= APP_URL ?>product/detail"></a>
                            <img src="<?= APP_URL ?>public/images/product-1.png" alt="">
                            <div class="action">
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
                            </div>
                        </div>
                        <div class="show-info">
                            <div class="variant">

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
                            </div>

                            <div class="product-content">
                                <h2>
                                    Leather Gloves
                                </h2>
                                <p>Perfect mint green</p>
                            </div>

                            <div class="product-status">
                                <div class="price">
                                    $42
                                </div>
                                <div class="rating">
                                    <i class="fa-solid fa-star"></i>
                                    <span>4.9 (98 review)</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</main>
<script src="<?= APP_URL ?>public/js/home.js"></script>
<?php include(APP_DIR . '/resources/views/layouts/client/footer.php') ?>
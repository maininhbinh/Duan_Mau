<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="shortcut icon" href="images/favicon-32x32.png" type="image/png" />
  <!-- ====== Boxicons ====== -->
  <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
  <!-- ====== Swiper CSS ====== -->
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <!-- ====== Custom CSS ====== -->
  <link rel="stylesheet" href="<?= APP_URL ?>public/css/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Fashion Shop</title>
</head>

<body>
  <nav class="navbar">

    <div class="row container d-flex">

      <div class="logo">

        <img src="<?= APP_URL ?>public/images/logo.svg" alt="" />

      </div>

      <div class="nav-list d-flex">

        <a href="<?= APP_URL ?>">Home</a>
        <a href="">Shop</a>

        <div class="close">

          <i class="bx bx-x"></i>

        </div>

        <a class="user-link">Login</a>

      </div>

      <div class="icons d-flex">

        <div class="icon  d-flex">

          <button class="click-icon click-user">
            <i class="bx bx-user"></i>
          </button>

          <div class="profile">

            <div class="border-profile">
              <div class="profile-content">
                <div class="info">
                  <div class="avatar">
                    <img src="<?= APP_URL ?>public/images/avatar/image-8.webp" alt="">
                  </div>
                  <div class="info-content">
                    <h4>Eden Smith</h4>
                    <p>Los Agneles</p>
                  </div>
                </div>

                <div class="border"></div>

                <a class="my account">
                  <i class="fa-solid fa-user"></i>
                  <p>My account</p>
                </a>

                <a class="my order">
                  <i class="fa-solid fa-bag-shopping"></i>
                  <p>My order</p>
                </a>

                <div class="border"></div>

                <a href="" class="logout">
                  <i class="fa-solid fa-right-from-bracket"></i>
                  <p>Logout</p>
                </a>

              </div>
            </div>

          </div>

        </div>

        <div class="icon d-flex">

          <button class="click-icon">
            <i class="bx bx-bell"></i>
          </button>

          <span></span>

        </div>

        <div class="icon user-icon d-flex">

          <button class="click-icon">
            <a href="/checkout">
              <i class="fa-solid fa-basket-shopping"></i>
            </a>
          </button>

        </div>

      </div>

      <!-- Hamburger -->

      <div class="hamburger">

        <i class="bx bx-menu-alt-right"></i>

      </div>

    </div>

    <div class="closeMark">

    </div>

  </nav>
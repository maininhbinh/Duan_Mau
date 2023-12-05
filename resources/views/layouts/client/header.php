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
  <link rel="stylesheet" href="<?= APP_URL ?>public/css/comment.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Fashion Shop</title>
</head>

<body>
  <nav class="navbar">

    <div class="row container d-flex">

      <a href="<?= APP_URL ?>" class="logo">

        <img class="h-12 w-12" src="<?= APP_URL ?>/public/images/admin/app-logo.svg" alt="logo" />
        <p class="text-xl font-semibold uppercase text-slate-700 dark:text-navy-100">
          365shop
        </p>
      </a>

      <div class="nav-list d-flex">

        <a href="<?= APP_URL ?>">Home</a>
        <a href="<?= APP_URL ?>shop">Shop</a>

        <div class="close">

          <i class="bx bx-x"></i>

        </div>

        <a class="user-link">Login</a>

      </div>

      <div class="icons d-flex">
        <form action="<?= APP_URL ?>shop/search" method="get" class="search">
          <input type="text" name="keywork" id="">
          <button type="submit">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </form>

        <div class="icon  d-flex">

          <button class="click-icon click-user">
            <i class="bx bx-user"></i>
          </button>

          <div class="profile">

            <div class="border-profile">
              <div class="profile-content">
                <?php

                use Modules\Stogare;

                if (isset($_SESSION['user'])) { ?>
                  <div class="info">
                    <div class="avatar">
                      <img src=" <?= $_SESSION['user']['avatar'] == null ? APP_URL . 'public/images/avatar/user.png' :  APP_URL . Stogare::url($_SESSION['user']['avatar']) ?>" alt="">
                    </div>
                    <div class="info-content">
                      <h4><?= $_SESSION['user']['name'] ?></h4>
                      <p><?= $_SESSION['user']['address'] == null || $_SESSION['user']['address'] == '' ? '...'   : $_SESSION['user']['address'] ?></p>
                    </div>
                  </div>

                  <div class="border"></div>

                  <a class="my account" href="<?= APP_URL ?>profile/<?= $_SESSION['user']['id'] ?>">
                    <i class="fa-solid fa-user"></i>
                    <p>My account</p>
                  </a>

                  <a class="my order">
                    <i class="fa-solid fa-bag-shopping"></i>
                    <p>My order</p>
                  </a>

                  <div class="border"></div>

                  <a href="<?= APP_URL ?>logout" class="logout" onclick="return confirm('bạn có muốn đăng xuất không?')">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <p>Logout</p>
                  </a>
                <?php } else { ?>
                  <a href="<?= APP_URL ?>signup" class="signup">
                    <i class="fa-solid fa-user-plus"></i>
                    <p>signup</p>
                  </a>

                  <a href="<?= APP_URL ?>signin" class="signin">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <p>signin</p>
                  </a>
                <?php } ?>

                <?php if (isset($_SESSION['user']) && $_SESSION['user']['id_role'] == 1) { ?>
                  <a href="<?= APP_URL ?>admin/dashboard" class="signin">
                    <i class="fa-solid fa-user-tie"></i>
                    <p>Quản trị</p>
                  </a>
                <?php } ?>

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

      </div>

      <!-- Hamburger -->

      <div class="hamburger">

        <i class="bx bx-menu-alt-right"></i>

      </div>

    </div>

    <div class="closeMark">

    </div>

  </nav>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
      rel="shortcut icon"
      href="images/favicon-32x32.png"
      type="image/png"
    />
    <!-- ====== Boxicons ====== -->
    <link
      href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css"
      rel="stylesheet"
    />
    <!-- ====== Swiper CSS ====== -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
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

          <a href="<?= APP_URL?>">Home</a>
          <a href="">Shop</a>

          <div class="close">

              <i class="bx bx-x"></i>

          </div>
          
          <a class="user-link">Login</a>

      </div>

      <div class="icons d-flex">

          <div class="icon d-flex"><i class="bx bx-search"></i></div>

          <div class="icon user-icon d-flex">

              <i class="bx bx-user"></i>

          </div>

          <div class="icon d-flex">

              <i class="bx bx-bell"></i>

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
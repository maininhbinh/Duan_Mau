<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from lineone.piniastudio.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 18 Nov 2023 16:31:28 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <!-- Meta tags  -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />

    <title>admin</title>
    <link rel="icon" type="image/png" href="<?= APP_URL ?>/public/images/admin/favicon.png" />

    <!-- CSS Assets -->
    <link rel="stylesheet" href="<?= APP_URL ?>public/css/app.css" />

    <!-- Javascript Assets -->
    <script src="<?= APP_URL ?>public/js/admin.js" defer></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
    <script>
        /**
         * THIS SCRIPT REQUIRED FOR PREVENT FLICKERING IN SOME BROWSERS
         */
        localStorage.getItem("_x_darkMode_on") === "true" &&
            document.documentElement.classList.add("dark");
    </script>
</head>

<body x-data class="is-header-blur" x-bind="$store.global.documentBody">
    <!-- App preloader-->
    <?php include(APP_DIR . '/resources/views/components/admin/preloader.php') ?>

    <!-- Page Wrapper -->
    <div id="root" class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900" x-cloak>
        <!-- Sidebar -->

        <?php include(APP_DIR . '/resources/views/components/admin/sidebar.php') ?>

        <!-- App Header Wrapper-->
        <?php include(APP_DIR . '/resources/views/components/admin/nav.php') ?>
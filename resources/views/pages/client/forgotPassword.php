<!doctype html>
<html lang="en">

<!-- Mirrored from lineone.piniastudio.com/pages-login-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 18 Nov 2023 16:32:38 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= APP_URL ?>public/css/app.css" />
</head>

<body x-data class="is-header-blur">

    <!-- Page Wrapper -->

    <div id="root" class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900">
        <main class="grid w-full grow grid-cols-1 place-items-center">
            <div class="w-full max-w-[26rem] p-4 sm:px-5">
                <div class="text-center">
                    <img class="mx-auto h-16 w-16" src="<?= APP_URL ?>public/images/admin/app-logo.svg" alt="logo" />
                    <div class="mt-4">
                        <h2 class="text-2xl font-semibold text-slate-600 dark:text-navy-100">
                            Quên mật khẩu
                        </h2>
                        <p class="text-slate-400 dark:text-navy-300">
                            Điền email để lấy lại mật khẩu
                        </p>
                    </div>
                </div>
                <form action="<?= APP_URL ?>otp" method="POST" class="card mt-5 rounded-lg p-5 lg:p-7">
                    <?php
                    if (isset($_SESSION['message']['error'])) { ?>
                        <div class="alert rounded-lg border border-error px-4 py-4 m-5 text-error">
                            <?php foreach ($_SESSION['message']['error'] as $message) { ?>
                                <div class="flex space-x-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    <p> <?= $message ?> </p>
                                </div>
                            <?php } ?>
                        </div>

                    <?php
                        unset($_SESSION['message']);
                    } else if (isset($_SESSION['message']['success'])) { ?>
                        <div class="alert flex rounded-lg border border-success/30 bg-success/10 py-4 px-4 m-5  text-success sm:px-5">
                            <?= $_SESSION['message']['success']  ?>
                        </div>
                    <?php
                        unset($_SESSION['message']);
                    } ?>
                    <label class="block">
                        <span>Email:</span>
                        <span class="relative mt-1.5 flex">
                            <input class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent" placeholder="Enter Email" type="email" name="email" />
                            <span class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </span>
                        </span>
                        <a href="<?= APP_URL ?>signin" class="text-xs text-slate-400 transition-colors line-clamp-1 hover:text-slate-800 focus:text-slate-800 dark:text-navy-300 dark:hover:text-navy-100 dark:focus:text-navy-100">signin</a>
                    </label>
                    <button class="btn mt-5 w-full bg-primary font-medium text-white hover:bg-primary-focus focus:bg-primary-focus active:bg-primary-focus/90 dark:bg-accent dark:hover:bg-accent-focus dark:focus:bg-accent-focus dark:active:bg-accent/90">
                        Gửi
                    </button>
                </form>
            </div>
        </main>
    </div>

</body>

<!-- Mirrored from lineone.piniastudio.com/pages-login-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 18 Nov 2023 16:32:38 GMT -->

</html>
<?php

use Modules\Stogare;

$user = $data['user']; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://bootstrapdemos.adminmart.com/modernize/dist/assets/css/styles.css" />
    <title>365shop</title>
</head>

<body>
    <div class="container-fluid">
        <div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">Account Setting</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="<?= APP_URL ?>">Home</a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">Account Setting</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab" tabindex="0">
                        <div class="row">
                            <div class="col-lg-6 d-flex align-items-stretch">
                                <div class="card w-100 position-relative overflow-hidden">
                                    <form action="<?= APP_URL ?>profile/<?= $user['id'] ?>/upload" method="post" enctype="multipart/form-data" class="card-body p-4">
                                        <h5 class="card-title fw-semibold">Thay đổi thông tin</h5>
                                        <p class="card-subtitle mb-4">Thay đổi thông tin của bạn ở đây</p>
                                        <?php
                                        if (isset($_SESSION['message']['uploadError'])) { ?>
                                            <div class="alert alert-danger">
                                                <?php foreach ($_SESSION['message']['uploadError'] as $message) { ?>
                                                    <div class="d-flex align-items-center text-danger ">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="5%" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                        </svg>
                                                        <p class="my-auto mx-1"> <?= $message ?> </p>
                                                    </div>
                                                <?php } ?>
                                            </div>

                                        <?php
                                            unset($_SESSION['message']);
                                        } else if (isset($_SESSION['message']['upload'])) { ?>
                                            <div class="alert alert-success text-success">
                                                <?= $_SESSION['message']['upload']  ?>
                                            </div>
                                        <?php
                                            unset($_SESSION['message']);
                                        } ?>
                                        <div class="text-center">
                                            <img src="<?= APP_URL ?><?= $user['avatar'] == null  ? 'public/images/avatar/user.png'  : Stogare::url($user['avatar']) ?>" alt="" class="img-fluid rounded-circle" width="120" height="120">
                                            <div class="d-flex align-items-center justify-content-center my-4 gap-3">
                                                <label class="btn btn-primary" for="avatar">
                                                    Upload
                                                    <input type="file" name="avatar" id="avatar" class="d-none">
                                                </label>
                                                <button type="submit" class="btn btn-outline-info" onclick=" return confirm('bạn có chắc chắn muốn lưu không?')">save</button>
                                                <a href="<?= APP_URL ?>profile/<?= $user['id'] ?>/deleteimg" class="btn btn-outline-danger" onclick=" return confirm('bạn có chắc chắn muốn xóa không?')">delete</a>
                                            </div>
                                            <p class="mb-0">
                                                đinh dạng png, jpg, jpeg, pdf, webp. tối đa 10mb
                                            </p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-stretch">
                                <div class="card w-100 position-relative overflow-hidden">
                                    <div class="card-body p-4">
                                        <h5 class="card-title fw-semibold">Thay đổi mật khẩu</h5>
                                        <p class="card-subtitle mb-4">Thay đổi mật khẩu vui lòng xác nhận mật khẩu ở đây</p>
                                        <form action="<?= APP_URL ?>profile/<?= $user['id'] ?>/password" method="post">
                                            <?php
                                            if (isset($_SESSION['message']['error'])) { ?>
                                                <div class="alert alert-danger">
                                                    <?php foreach ($_SESSION['message']['error'] as $message) { ?>
                                                        <div class="d-flex align-items-center text-danger ">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="1%" viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                            </svg>
                                                            <p class="my-auto mx-1"> <?= $message ?> </p>
                                                        </div>
                                                    <?php } ?>
                                                </div>

                                            <?php
                                                unset($_SESSION['message']);
                                            } else if (isset($_SESSION['message']['success'])) { ?>
                                                <div class="alert alert-success text-success">
                                                    <?= $_SESSION['message']['success']  ?>
                                                </div>
                                            <?php
                                                unset($_SESSION['message']);
                                            } ?>
                                            <div class="mb-4">
                                                <label for="exampleInputPassword1" class="form-label fw-semibold">Current Password</label>
                                                <input type="password" class="form-control" id="exampleInputPassword1" name="currentPassword">
                                            </div>
                                            <div class="mb-4">
                                                <label for="exampleInputPassword2" class="form-label fw-semibold">New Password</label>
                                                <input type="password" class="form-control" id="exampleInputPassword2" name="newPassword">
                                            </div>
                                            <div class="">
                                                <label for="exampleInputPassword3" class="form-label fw-semibold">Confirm Password</label>
                                                <input type="password" class="form-control" id="exampleInputPassword3" name="confirmPassword">
                                            </div>
                                            <div class="col-12">
                                                <div class="d-flex align-items-center justify-content-end mt-4 gap-3">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                    <button type="reset" class="btn bg-danger-subtle text-danger">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="card w-100 position-relative overflow-hidden mb-0">
                                    <div class="card-body p-4">
                                        <h5 class="card-title fw-semibold">Thông tin cá nhân</h5>
                                        <p class="card-subtitle mb-4">Để thay đổi thông tin cả nhân, hãy chỉnh sửa và lưu trữ ở đây</p>
                                        <form action="<?= APP_URL ?>profile/<?= $user['id'] ?>" method="post">
                                            <?php
                                            if (isset($_SESSION['message']['profileError'])) { ?>
                                                <div class="alert alert-danger">
                                                    <?php foreach ($_SESSION['message']['profileError'] as $message) { ?>
                                                        <div class="d-flex align-items-center text-danger ">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="5%" viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                            </svg>
                                                            <p class="my-auto mx-1"> <?= $message ?> </p>
                                                        </div>
                                                    <?php } ?>
                                                </div>

                                            <?php
                                                unset($_SESSION['message']);
                                            } else if (isset($_SESSION['message']['profile'])) { ?>
                                                <div class="alert alert-success text-success">
                                                    <?= $_SESSION['message']['profile']  ?>
                                                </div>
                                            <?php
                                                unset($_SESSION['message']);
                                            } ?>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <label for="exampleInputtext" class="form-label fw-semibold">Tên</label>
                                                        <input type="text" name="name" class="form-control" id="exampleInputtext" value="<?= $user['name'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-4">
                                                        <label for="exampleInputtext3" class="form-label fw-semibold">Số điện thoại</label>
                                                        <input type="text" name="phone" class="form-control" id="exampleInputtext3" value="<?= $user['phone'] ?>" placeholder="...">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="">
                                                        <label for="exampleInputtext4" class="form-label fw-semibold">Địa chỉ</label>
                                                        <input type="text" name="address" class="form-control" id="exampleInputtext4" value="<?= $user['address'] ?>" placeholder="...">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="d-flex align-items-center justify-content-end mt-4 gap-3">
                                                        <button class="btn btn-primary">Save</button>
                                                        <button class="btn bg-danger-subtle text-danger">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/js/app.min.js"></script>
    <script src="https://bootstrapdemos.adminmart.com/modernize/dist/assets/js/app.init.js"></script>
</body>

</html>
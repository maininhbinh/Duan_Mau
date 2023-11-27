<?php

namespace App\Controllers\Client;

use App\Models\Client\UserModel;
use Modules\core;
use Modules\Stogare;

class ClientController
{

    const PATH_UPLOAD = 'avatar';

    public $user;

    public function __construct()
    {
        $this->user = new UserModel;
    }

    public function signup()
    {
        return view('pages.client.signup');
    }

    public function signin()
    {
        return view('pages/client/signin');
    }

    public function setSignup()
    {
        $check = true;

        $name = htmlspecialchars(strip_tags(trim($_POST['name'] ?? '')));
        $email = htmlspecialchars(strip_tags(trim($_POST['email'] ?? '')));
        $password = htmlspecialchars(strip_tags(trim($_POST['password'] ?? '')));
        $repeatPassword = htmlspecialchars(strip_tags(trim($_POST['repeatPassword'] ?? '')));


        if (empty($name) || empty($email) || empty($password) || empty($repeatPassword)) {
            $_SESSION['message']['error'][] = 'không được để trống';
            $check = false;
        }


        if (preg_match("/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/", $email) !== 1) {
            $_SESSION['message']['error'][] = 'email sai định dạng';
            $check = false;
        }

        if ($this->user->checkEmail($email)) {
            $_SESSION['message']['error'][] = 'email đã được đăng kí';
            $check = false;
        }


        if ($password !== $repeatPassword) {
            $_SESSION['message']['error'][] = 'mật khẩu không khớp';
            $check = false;
        }

        if (preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/", $password) !== 1) {
            $_SESSION['message']['error'][] = 'mật khẩu phải có cả chữ, số và chữ viết hoa';
            $check = false;
        }

        if ($check != true) {
            header('location: signup');
            exit();
        } else {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $this->user->addAccount($name, $email, $password, 2, 0);
            $_SESSION['message']['success'] = 'tạo tài khoản thành công';
            header('location: signup');
            exit();
        }
    }

    public function setSignin()
    {
        $check = true;
        $email = htmlspecialchars(strip_tags(trim($_POST['email'] ?? '')));
        $password = htmlspecialchars(strip_tags(trim($_POST['password'] ?? '')));

        $data = $this->user->checkEmail($email);
        $hashedPassword = isset($data['password']) ? $data['password'] : '';


        if (!$data || !password_verify($password, $hashedPassword)) {
            $_SESSION['message']['error'][] = 'tài khoản hoặc mật khẩu không chính xác';
            $check = false;
        }

        if (!$check) {
            header('location: signin');
            exit();
        } else {
            $_SESSION['user']['id'] = $data['id'];
            $_SESSION['user']['name'] = $data['name'];
            $_SESSION['user']['phone'] = $data['phone'];
            $_SESSION['user']['avatar'] = $data['avatar'];
            $_SESSION['user']['address'] = $data['address'];
            $_SESSION['user']['id_role'] = $data['id_role'];

            header('location: signin');
            exit();
        }
    }

    public function logOut()
    {
        unset($_SESSION['user']);
        header('location: ' . APP_URL);
        exit();
    }

    public function profile($id)
    {
        $user = $this->user->getOneUser($id);
        return view('pages.client.profile', compact('user'));
    }

    public function uploadImage($id)
    {
        $checkImage = true;
        $user = $this->user->getOneUser($id);

        $old_imager = $user['avatar'];
        $imager = $_FILES['avatar'];

        if (empty($imager['name'])) {
            $_SESSION['message']['uploadError'][] = 'bạn chưa tải ảnh!';
            $checkImage = false;
        }

        if (!empty($imager['name'])) {
            $name_file = Stogare::put(self::PATH_UPLOAD, $imager);
        } else {
            $name_file = $old_imager;
        }

        if (!empty($imager['name']) && !$name_file) {
            $_SESSION['message']['uploadError'][] = 'tải tệp tin thất bại';
            $checkImage = false;
        }

        if (!$checkImage) {
            header("location: " . $_SERVER['HTTP_REFERER']);
            exit;
        } else {

            $this->user->updateAvatar($name_file, $id);

            if (!empty($imager['name']) && Stogare::exits($old_imager)) {
                Stogare::delete($old_imager);
            }
            $_SESSION['message']['upload'] = 'update thành công';
            header("location: " . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }

    public function deleteImage($id)
    {
        $checkImage = true;
        $user = $this->user->getOneUser($id);

        if (empty($user['avatar']) && Stogare::exits($user['avatar'])) {
            $_SESSION['message']['uploadError'][] = 'không có ảnh để xóa';
            $checkImage = false;
        }

        if (!$checkImage) {
            header("location: " . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            $this->user->updateAvatar(null, $id);
            Stogare::delete($user['avatar']);

            $_SESSION['message']['upload'] = 'xóa thành công';
            $checkImage = false;
            header("location: " . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }

    public function changePassword($id)
    {
        $checkPassword = true;
        $user = $this->user->getOneUser($id);
        $password = isset($user['password']) ? $user['password'] : '';
        $currentPassword = htmlspecialchars(strip_tags(trim($_POST['currentPassword'] ?? '')));
        $newPassword = htmlspecialchars(strip_tags(trim($_POST['newPassword'])));
        $confirmPassword = htmlspecialchars(strip_tags(trim($_POST['confirmPassword'])));

        if (!password_verify($currentPassword, $password)) {
            $_SESSION['message']['error'][] = 'mật khẩu không chính xác';
            $checkPassword = false;
        }

        if (empty($currentPassword) || empty($newPassword) || empty($confirmPassword)) {
            $_SESSION['message']['error'][] = 'các trường không được để trống';
            $checkPassword = false;
        }

        if (preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/", $newPassword) !== 1) {
            $_SESSION['message']['error'][] = 'mật khẩu mới phải có cả chữ, số và chữ viết hoa';
            $checkPassword = false;
        }

        if ($newPassword !== $confirmPassword) {
            $_SESSION['message']['error'][] = 'mật khẩu không khớp';
            $checkPassword = false;
        }

        if (!$checkPassword) {
            header("location: " . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $_SESSION['message']['success'] = 'thay đổi mật khẩu thành công';
            $this->user->updatePassword($newPassword, $id);
            header("location: " . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }

    public function updateProfile($id)
    {
        $checkProfile = true;
        $user = $this->user->getOneUser($id);

        $name = htmlspecialchars(strip_tags(trim($_POST['name'] ?? '')));
        $phone = htmlspecialchars(strip_tags(trim($_POST['phone'])));
        $address = htmlspecialchars(strip_tags(trim($_POST['address'])));

        if (empty($name)) {
            $_SESSION['message']['profileError'][] = 'trường tên không được để trống';
            $checkProfile = false;
        }

        if (!preg_match('/^(0|\+84)(3[2-9]|5[2689]|7[06789]|8[1-9]|9[0-9])\d{7}$/', $phone)) {
            $_SESSION['message']['profileError'][] = 'số điện thoại không hợp lệ';
            $checkProfile = false;
        }

        if (!$checkProfile) {
            header("location: " . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            $_SESSION['message']['profile'] = 'cập nhập thông tin thành công';
            $this->user->updateProfile($name, $phone, $address, $id);
            header("location: " . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }
}

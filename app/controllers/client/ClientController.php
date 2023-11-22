<?php

namespace App\Controllers\Client;

use App\Models\Client\UserModel;
use Modules\core;

class ClientController
{
    use core;

    public $user;

    public function __construct()
    {
        $this->user = new UserModel;
    }

    public function signup()
    {
        return $this->view('pages.client.signup');
    }

    public function signin()
    {
        return $this->view('pages/client/signin');
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
            $_SESSION['user']['email'] = $data['email'];
            $_SESSION['user']['phone'] = $data['phone'];
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
}

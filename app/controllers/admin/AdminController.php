<?php

namespace App\Controllers\Admin;

use App\Models\Admin\AdminModel;
use Modules\Stogare;

class AdminController
{

    public $admin;
    const PATH_UPLOAD = 'category';

    public function __construct()
    {
        $this->admin = new AdminModel();
    }

    public function dashboard()
    {
        $users = $this->admin->getAllUser();
        return view('pages.admin.dashboard', compact('users'));
    }

    public function category()
    {
        $category = $this->admin->getAllCategory();
        return view('pages.admin.category', compact('category'));
    }

    public function categoryCreate()
    {
        return view('pages.admin.categoryForm');
    }

    public function categoryStore()
    {
        $checkCategory = true;

        $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
        $imager = $_FILES['imager'];

        if (!$name) {
            $_SESSION['message']['error'][] = 'bạn không được để trống trường name';
            $checkCategory = false;
        }

        if (empty($imager['name'])) {
            $_SESSION['message']['error'][] = 'bạn không được để trống ảnh';
            $checkCategory = false;
        }

        if (!$checkCategory) {
            header("location: " . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            $name_file = Stogare::put(self::PATH_UPLOAD, $imager);
            $this->admin->addCategory($name, $name_file);
            $_SESSION['message']['success'] = 'thêm danh mục thành công';
            header("location: " . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }


    public function categoryEdit($id)
    {
        $category = $this->admin->getOneCategory($id);

        return view('pages.admin.categoryForm', compact('category'));
    }

    public function categoryUpdate($id)
    {
        $checkCategory = true;
        $category = $this->admin->getOneCategory($id);

        $id = $category['id'];
        $old_imager = $category['imager'];

        $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
        $imager = $_FILES['imager'];

        if (!$name) {
            $_SESSION['message']['error'][] = 'bạn không được để trống trường name';
            $checkCategory = false;
        }

        if (!empty($imager['name'])) {
            $name_file = Stogare::put(self::PATH_UPLOAD, $imager);
        } else {
            $name_file = $old_imager;
        }

        if (!$name_file) {
            $_SESSION['message']['error'][] = 'tải tệp tin thất bại';
            $checkCategory = false;
        }

        if (!$checkCategory) {
            header("location: " . $_SERVER['HTTP_REFERER']);
            exit;
        } else {

            $this->admin->updateCategory($name, $name_file, $id);

            if (!empty($imager['name']) && Stogare::exits($old_imager)) {
                Stogare::delete($old_imager);
            }
            $_SESSION['message']['success'] = 'update thành công';
            header("location: " . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }

    public function categoryInActive($id)
    {
        $this->admin->inActiveCategory($id);
        $_SESSION['message']['success'] = 'in_active thành công';
        header("location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public function categoryActive($id)
    {
        $this->admin->activeCategory($id);
        $_SESSION['message']['success'] = 'active thành công';
        header("location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }
}

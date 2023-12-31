<?php

namespace App\Controllers\Admin;

use App\Models\Admin\AdminModel;
use Exception;
use Modules\Stogare;

class AdminController
{

    public $admin;
    const PATH_UPLOAD_CATEGORY = 'category';
    const PATH_UPLOAD_PRODUCT = 'products';

    public function __construct()
    {
        $this->admin = new AdminModel();
    }

    public function dashboard()
    {
        $thongke = $this->admin->statistical();
        $labels = [];
        $percent = [];
        $colorPercent = ["#4ade80", "#f43f5e", "#a855f7", "#ffcce0","#4f5665", "#8c71db"];
        foreach($thongke as $item){
            $labels[] = $item['name'];
            $percent[] = ceil($item['percent']);

            $randomIndex = rand(0, count($colorPercent) - 1);

            $randomColors[] = $colorPercent[$randomIndex];
        }
        $sumProduct = $this->admin->sumProduct();
        $users = $this->admin->getAllUser();
        $statisticalProduct = $this->admin->statisticalProduct();
        $statisticalUser = $this->admin->statisticalUser();
        $statisticalCategory = $this->admin->statisticalCategory();
        $statisticalView = $this->admin->statisticalView();
        return view('pages.admin.dashboard', compact('users', 'statisticalProduct', 'statisticalUser', 'statisticalCategory', 'statisticalView', 'labels', 'percent', 'randomColors', 'sumProduct'));
    }

    public function category()
    {
        $per_page = 10;
        $page = 1;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        $_SESSION['page'] = $page;
        $start = ($page - 1) * $per_page;
        $countPage = $this->admin->pageCategory()['countPage'];
        $maxPage = ceil($countPage / $per_page);
        $category = $this->admin->getPerPageCategory($start, $per_page);
        return view('pages.admin.category', compact('category', 'maxPage'));
    }

    public function categoryCreate()
    {
        $category_id = array_column($this->admin->getAllCategory(), 'name', 'id');
        return view('pages.admin.categoryForm', compact('category_id'));
    }

    public function categoryStore()
    {
        $checkCategory = true;

        $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
        $parent = !empty(trim($_POST['id_category'])) ? htmlspecialchars(strip_tags(trim($_POST['id_category']))) : null;
        $imager = $_FILES['imager'];
        $name_file = '';

        if (!empty($this->admin->getOneCategory($parent))) {
            $checkHasCategory = $this->admin->getOneCategory($parent);
            if ($checkHasCategory['is_delete'] == 1) {
                $_SESSION['message']['error'][] = 'category hiện không hoạt động';
                $checkCategory = false;
            }
        }

        if (!$name) {
            $_SESSION['message']['error'][] = 'bạn không được để trống trường name';
            $checkCategory = false;
        }

        if ($parent == null  && empty($imager['name'])) {
            $_SESSION['message']['error'][] = 'bạn không được để trống ảnh';
            $checkCategory = false;
        }

        if (!empty($imager['name'])) {
            $name_file = Stogare::put(self::PATH_UPLOAD_CATEGORY, $imager);
            if (!$name_file) {
                $_SESSION['message']['error'][] = 'tải tệp tin thất bại';
                $checkCategory = false;
            }
        }



        if (!$checkCategory) {
            header("location: " . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            $this->admin->addCategory($name, $parent, $name_file);
            $_SESSION['message']['success'] = 'thêm danh mục thành công';
            header("location: " . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }


    public function categoryEdit($id)
    {
        $category = $this->admin->getOneCategory($id);
        $category_id = array_column($this->admin->getAllCategory(), 'name', 'id');
        return view('pages.admin.categoryForm', compact('category', 'category_id'));
    }

    public function categoryUpdate($id)
    {
        $checkCategory = true;
        $category = $this->admin->getOneCategory($id);
        $parent = !empty(trim($_POST['id_category'])) ? htmlspecialchars(strip_tags(trim($_POST['id_category']))) : null;

        $id = $category['id'];
        $old_imager = $category['imager'];
        $name_file = '';

        $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
        $imager = $_FILES['imager'];

        if (!$name) {
            $_SESSION['message']['error'][] = 'bạn không được để trống trường name';
            $checkCategory = false;
        }

        if (!empty($imager['name'])) {
            $name_file = Stogare::put(self::PATH_UPLOAD_CATEGORY, $imager);
            if (!$name_file) {
                $_SESSION['message']['error'][] = 'tải tệp tin thất bại';
                $checkCategory = false;
            }
        } else {
            $name_file = $old_imager;
        }

        if ($parent == null && empty($name_file)) {
            $_SESSION['message']['error'][] = 'bạn không được để trống ảnh';
            $checkCategory = false;
        }

        if (!$checkCategory) {
            header("location: " . $_SERVER['HTTP_REFERER']);
            exit;
        } else {

            $this->admin->updateCategory($name, $parent, $name_file, $id);

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

    public function categoryRemoveImg($id)
    {
        $check = true;
        $category = $this->admin->getOneCategory($id);

        if ($category['id_parent'] == null) {
            $_SESSION['message']['error'][] = 'không thể xóa ảnh nếu danh mục không có danh mục cha';
            $check = false;
        }

        if (!Stogare::exits($category['imager'])) {
            $check = false;
        }

        if (!$check) {
            header("location: " . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            $this->admin->removeImgCategory($id);
            Stogare::delete($category['imager']);
            $_SESSION['message']['success'] = 'xóa ảnh thành công';
            header("location: " . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }

    public function product()
    {
        $per_page = 10;
        $page = 1;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        $_SESSION['page'] = $page;
        $start = ($page - 1) * $per_page;
        $countPage = $this->admin->pageProduct()['countPage'];
        $maxPage = ceil($countPage / $per_page);
        $products = $this->admin->getPerPageProduct($start, $per_page);
        view('pages.admin.product', compact('products', 'maxPage'));
    }

    public function productCreate()
    {
        $category = array_column($this->admin->getAllCategory(), 'name', 'id');

        return view('pages.admin.productForm', compact('category'));
    }

    public function productStore()
    {
        $checkProduct = true;

        $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
        $id_category = $_POST['id_category'];
        $quantity_stock = htmlspecialchars(strip_tags(trim($_POST['quantity_stock'])));
        $price = htmlspecialchars(strip_tags(trim($_POST['price'])));
        $description = htmlspecialchars($_POST['description']);
        $discount = htmlspecialchars(strip_tags(trim($_POST['discount'] == '' ? 0 : $_POST['discount'])));

        $imager = $_FILES['imager'];

        if (empty($name) || empty($id_category) || empty($quantity_stock) || empty($price) || empty($description)) {
            $_SESSION['message']['error'][] = 'bạn không được để trống';
            $checkProduct = false;
        }

        if ($price < 10000) {
            $_SESSION['message']['error'][] = 'trường price phải lới hơn hoặc bằng 10.000đ';
            $checkProduct = false;
        }

        if ($quantity_stock < 1) {
            $_SESSION['message']['error'][] = 'trường quantity phải lới hơn hoặc bằng 1';
            $checkProduct = false;
        }

        if ($discount >= $price) {
            $_SESSION['message']['error'][] = 'discount không được lớn hơn trường price';
            $checkProduct = false;
        }

        if (!empty($discount) && $discount < 10000) {
            $_SESSION['message']['error'][] = 'trường discount phải lới hơn hoặc bằng 10.000đ';
            $checkProduct = false;
        }

        if (!is_numeric($price) || !is_numeric($quantity_stock)) {
            $_SESSION['message']['error'][] = 'trường price, quantity và discount phải là số';
            $checkProduct = false;
        }

        if (empty($imager['name'])) {
            $_SESSION['message']['error'][] = 'bạn không được để trống ảnh';
            $checkProduct = false;
        }

        if (!empty($imager['name'])) {
            $name_file = Stogare::put(self::PATH_UPLOAD_CATEGORY, $imager);
            if (!$name_file) {
                $_SESSION['message']['error'][] = 'tải tệp tin thất bại';
                $checkProduct = false;
            }
        }

        if (!$checkProduct) {
            header("location: " . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            $this->admin->addProduct($id_category, $name, $name_file, $description, $quantity_stock, $price, $discount);
            $_SESSION['message']['success'] = 'thêm sản phầm thành công';
            header("location: " . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }

    public function productEdit($id)
    {
        $category = array_column($this->admin->getAllCategory(), 'name', 'id');
        $product = $this->admin->editProduct($id);
        return view('pages.admin.productForm', compact('category', 'product'));
    }

    public function productUpdate($id)
    {
        $checkProduct = true;

        $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
        $id_category = $_POST['id_category'];
        $quantity_stock = htmlspecialchars(strip_tags(trim($_POST['quantity_stock'])));
        $price = htmlspecialchars(strip_tags(trim($_POST['price'])));
        $description = htmlspecialchars($_POST['description']);
        $discount = htmlspecialchars(strip_tags(trim($_POST['discount'] == '' ? 0 : $_POST['discount'])));
        $product = $this->admin->editProduct($id);
        $old_imager = $product['imager'];
        $imager = $_FILES['imager'];

        if (empty($name) || empty($id_category) || empty($quantity_stock) || empty($price) || empty($description)) {
            $_SESSION['message']['error'][] = 'bạn không được để trống';
            $checkProduct = false;
        }

        if ($price < 10000) {
            $_SESSION['message']['error'][] = 'trường price phải lới hơn hoặc bằng 10.000đ';
            $checkProduct = false;
        }

        if ($quantity_stock < 1) {
            $_SESSION['message']['error'][] = 'trường quantity phải lới hơn hoặc bằng 1';
            $checkProduct = false;
        }

        if ($discount >= $price) {
            $_SESSION['message']['error'][] = 'discount không được lớn hơn trường price';
            $checkProduct = false;
        }

        if (!empty($discount) && $discount < 10000) {
            $_SESSION['message']['error'][] = 'trường discount phải lới hơn hoặc bằng 10.000đ';
            $checkProduct = false;
        }

        if (!is_numeric($price) || !is_numeric($quantity_stock)) {
            $_SESSION['message']['error'][] = 'trường price, quantity và discount phải là số';
            $checkProduct = false;
        }

        if (!empty($imager['name'])) {
            $name_file = Stogare::put(self::PATH_UPLOAD_CATEGORY, $imager);
            if (!$name_file) {
                $_SESSION['message']['error'][] = 'tải tệp tin thất bại';
                $checkProduct = false;
            }
        } else {
            $name_file = $old_imager;
        }

        if (!$checkProduct) {
            header("location: " . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            $this->admin->updateProduct($id_category, $name, $name_file, $description, $quantity_stock, $price, $discount, $id);
            $_SESSION['message']['success'] = 'update sản phẩm thành công phầm thành công';
            header("location: " . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }

    public function productDelete($id)
    {
        $this->admin->deleteProduct($id);
        $_SESSION['message']['success'] = 'xóa thành công';
        header("location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public function user()
    {
        $per_page = 10;
        $page = 1;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        $_SESSION['page'] = $page;
        $start = ($page - 1) * $per_page;
        $countPage = $this->admin->pageUser()['countPage'];
        $maxPage = ceil($countPage / $per_page);
        $users = $this->admin->getPerPageUser($start, $per_page);
        return view('pages.admin.user', compact('users', 'maxPage'));
    }

    public function userInActive($id)
    {
        $this->admin->userInActive($id);
        $_SESSION['message']['success'] = 'chặn thành công';
        header("location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public function userActive($id)
    {
        $this->admin->userActive($id);
        $_SESSION['message']['success'] = 'gỡ chặn thành công';
        header("location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public function role($id)
    {
        $this->admin->role($id);
        $_SESSION['message']['success'] = 'cấp quyền thành công';
        header("location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public function comment()
    {
        $per_page = 10;
        $page = 1;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        $_SESSION['page'] = $page;
        $start = ($page - 1) * $per_page;
        $countPage = $this->admin->pageComment()['countPage'];
        $maxPage = ceil($countPage / $per_page);
        $comment = $this->admin->getPerPageComment($start, $per_page);
        return view('pages.admin.comment', compact('comment', 'maxPage'));
    }

    public function commentDelete($id)
    {
        $this->admin->commentDelete($id);
        $_SESSION['message']['success'] = 'xóa thành công';
        header("location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public function statistical(){
        
    }
}

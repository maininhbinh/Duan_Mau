<?php

namespace App\Controllers;

use App\Models\HomeModel;
use Modules\core;

class HomeController
{
    public $home;

    public function __construct()
    {
        $this->home = new HomeModel();
    }

    public function index()
    {
        $products = $this->home->getNewProduct();
        $category = $this->home->getAllCategoryParent();
        $viewMost = $this->home->viewMost();
        $user = $this->home->getAllUser();
        return view('pages.client.home', compact('category', 'user', 'products', 'viewMost'));
    }

    public function detailProduct($id)
    {
        $product = $this->home->getOneProduct($id);
        $productSame = $this->home->getProductSame($id, $product['id_category']);
        return view('pages.client.detail-product', compact('product', 'productSame'));
    }

    public function shop()
    {
        $item = [];
        $checkFilter = false;

        if (isset($_GET['clear'])) {
            unset($_GET['item']);
        }

        if (isset($_GET['item'])) {
            $item = $_GET['item'];
            $products = $this->home->filterCategory($item);
            $checkFilter = true;
        }

        if (!empty($_GET['search'])) {
            $products = $this->home->filterName($_GET['search']);
            $checkFilter = true;
        }

        if (!$checkFilter) {
            $products = $this->home->getALLProduct();
            unset($_SESSION['btn']);
        } else {
            $_SESSION['btn']['clear'] = true;
        }

        $category = $this->home->getAllCategory();
        return view('pages.client.shop', compact('products', 'category', 'item'));
    }

    public function setView($id)
    {
        $this->home->setView($id);
    }
}

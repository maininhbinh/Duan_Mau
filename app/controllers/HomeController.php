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
        $products = $this->home->getALLProduct();
        $category = $this->home->getAllCategory();
        $user = $this->home->getAllUser();
        return view('pages.client.home', compact('category', 'user', 'products'));
    }

    public function detailProduct($id)
    {
        $product = $this->home->getOneProduct($id);
        $productSame = $this->home->getProductSame($id, $product['id_category']);
        return view('pages.client.detail-product', compact('product', 'productSame'));
    }
}

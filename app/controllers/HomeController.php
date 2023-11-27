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
        // $user = 
        $category = $this->home->getAllCategory();
        $user = $this->home->getAllUser();
        return view('pages.client.home', compact('category', 'user'));
    }

    public function detailProduct()
    {
        return view('pages.client.detail-product');
    }
}

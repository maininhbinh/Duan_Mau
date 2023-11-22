<?php

namespace App\Controllers;

use Modules\core;

class HomeController
{
    use core;

    public function __construct()
    {
    }

    public function index()
    {

        return $this->view('pages.client.home');
    }

    public function detailProduct()
    {
        return $this->view('pages.client.detail-product');
    }
}

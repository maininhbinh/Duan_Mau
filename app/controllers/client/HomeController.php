<?php 
namespace App\Controllers\Client;

class HomeController {

    public function __construct()
    {
        
    }

    public function index(){
        
        return include(APP_DIR .'/resources/views/pages/client/home.php');
    }

    public function detailProduct(){
        return include(APP_DIR. '/resources/views/pages/client/detail-product.php');
    }
}
?>
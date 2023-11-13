<?php 
namespace App\Controllers;

class HomeController {

    public function __construct()
    {
        
    }

    public function index(){
        return include(APP_DIR .'/resources/views/pages/client/home.php');
    }
}
?>
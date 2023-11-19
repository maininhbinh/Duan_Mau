<?php

namespace App\controllers\Admin;

class admin
{

    public function dashboard()
    {
        return include(APP_DIR . '/resources/views/pages/admin/dashboard.php');
    }
}

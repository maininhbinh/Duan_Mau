<?php

namespace App\Controllers\Admin;

use Modules\core;

class AdminController
{
    use core;

    public function dashboard()
    {
        return $this->view('pages.admin.dashboard');
    }
}

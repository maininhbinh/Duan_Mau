<?php

namespace App\Models;

use App\Models\model;

class HomeModel extends model
{
    public $category = 'category';
    public $user = 'user';
    public function getAllCategory()
    {
        $sql = "SELECT * FROM $this->category WHERE is_delete != 1";

        $this->setQuery($sql);
        return $this->loadAllRow();
    }

    public function getAllUser()
    {
        $sql = "SELECT * FROM $this->user";
        $this->setQuery($sql);
        return $this->loadAllRow();
    }
}

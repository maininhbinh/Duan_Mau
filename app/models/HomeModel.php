<?php

namespace App\Models;

use App\Models\model;

class HomeModel extends model
{
    public $category = 'category';
    public $user = 'user';
    public $products = 'products';
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

    public function getALLProduct()
    {
        $sql = "SELECT * FROM $this->products";
        $this->setQuery($sql);
        return $this->loadAllRow();
    }

    public function getOneProduct($id)
    {
        $sql = "SELECT * FROM $this->products WHERE id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }

    public function getProductSame($id, $category)
    {
        $sql = "SELECT * FROM $this->products WHERE id_category = ? and id != ?";
        $this->setQuery($sql);
        return $this->loadAllRow([$category, $id]);
    }
}

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

    public function getAllCategoryParent()
    {
        $sql = "SELECT * FROM $this->category WHERE is_delete != 1 and id_parent is null";

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

    public function getNewProduct()
    {
        $sql = "SELECT * FROM $this->products ORDER BY id DESC limit 12";
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

    public function filterCategory($values)
    {
        $placeholders = implode(',', array_fill(0, count($values), '?'));
        $sql = "SELECT * FROM $this->products WHERE id_category in ($placeholders)";
        $this->setQuery($sql);
        return $this->loadAllRow($values);
    }

    public function filterName($name)
    {

        $sql = "SELECT * FROM $this->products WHERE name like ?";
        $this->setQuery($sql);
        return $this->loadAllRow(['%' . $name . '%']);
    }

    public function setView($id)
    {
        $sql = "UPDATE $this->products SET view = view + 1 WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }

    public function viewMost()
    {
        $sql = "SELECT * from $this->products ORDER BY `view` DESC LIMIT 10";
        $this->setQuery($sql);
        return $this->loadAllRow();
    }
}

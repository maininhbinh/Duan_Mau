<?php

namespace App\Models\Admin;

use App\Models\model;

class AdminModel extends Model
{
    public $user = 'user';
    public $category = 'category';
    public $products = 'products';

    public function getAllUser()
    {
        $sql = "SELECT * FROM $this->user WHERE id_role != 1";
        $this->setQuery($sql);
        return $this->loadAllRow();
    }

    public function getAllCategory()
    {
        $sql = "SELECT * FROM $this->category";

        $this->setQuery($sql);
        return $this->loadAllRow();
    }

    public function addCategory($name, $imager)
    {
        $sql = "INSERT INTO $this->category(name, imager, is_delete) values(?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$name, $imager, 0]);
    }

    public function getOneCategory($id)
    {
        $sql = "SELECT * FROM $this->category WHERE id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }

    public function updateCategory($name, $imager, $id)
    {
        $sql = "UPDATE $this->category SET name = ?, imager = ? WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$name, $imager, $id]);
    }

    public function inActiveCategory($id)
    {
        $sql = "UPDATE $this->category SET is_delete = ? WHERE id = ?";

        $this->setQuery($sql);
        return $this->execute([1, $id]);
    }

    public function activeCategory($id)
    {
        $sql = "UPDATE $this->category SET is_delete = ? WHERE id = ?";

        $this->setQuery($sql);
        return $this->execute([0, $id]);
    }

    public function getAllProduct()
    {
        $sql = "SELECT $this->products.*, $this->category.name as category_name FROM $this->products JOIN $this->category ON $this->products.id_category = $this->category.id WHERE $this->products.is_delete != 1";

        $this->setQuery($sql);

        return $this->loadAllRow();
    }

    public function addProduct($id_category, $name, $imager, $description, $quantity_stock, $price)
    {
        $sql = "INSERT INTO $this->products(id_category, name, imager, description, quantity_stock, price, is_delete) values (?,?,?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id_category, $name, $imager, $description, $quantity_stock, $price, 0]);
    }
}

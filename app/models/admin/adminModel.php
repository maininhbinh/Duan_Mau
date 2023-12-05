<?php

namespace App\Models\Admin;

use App\Models\model;

class AdminModel extends Model
{
    public $user = 'user';
    public $category = 'category';
    public $products = 'products';

    public function getPdo()
    {
        return $this->pdo;
    }

    public function getAllUser()
    {
        $sql = "SELECT * FROM $this->user WHERE id_role != 1";
        $this->setQuery($sql);
        return $this->loadAllRow();
    }

    public function getAllCategory()
    {
        $sql = "SELECT * FROM $this->category WHERE is_delete != 1";

        $this->setQuery($sql);
        return $this->loadAllRow();
    }

    public function getAllCategoryJoin()
    {
        $sql = "SELECT children.*, parent.name as parent_name FROM $this->category as children LEFT JOIN $this->category as parent ON children.id_parent = parent.id";

        $this->setQuery($sql);
        return $this->loadAllRow();
    }

    public function addCategory($name, $parent, $imager)
    {
        $sql = "INSERT INTO $this->category(name, imager, id_parent, is_delete) values(?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$name, $imager, $parent, 0]);
    }

    public function getOneCategory($id)
    {
        $sql = "SELECT * FROM $this->category WHERE id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }

    public function updateCategory($name, $parent, $imager, $id)
    {
        $sql = "UPDATE $this->category SET name = ?, imager = ?, id_parent = ? WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$name, $imager, $parent, $id]);
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

    public function removeImgCategory($id)
    {
        $sql = "UPDATE $this->category SET imager = ? WHERE id = ?";

        $this->setQuery($sql);
        return $this->execute(['', $id]);
    }

    public function getAllProduct()
    {
        $sql = "SELECT $this->products.*, $this->category.name as category_name FROM $this->products JOIN $this->category ON $this->products.id_category = $this->category.id WHERE $this->products.is_delete != 1";

        $this->setQuery($sql);

        return $this->loadAllRow();
    }

    public function addProduct($id_category, $name, $imager, $description, $quantity_stock, $price, $discount)
    {
        $sql = "INSERT INTO $this->products(id_category, name, imager, description, view, quantity_stock, price, discount, is_delete) values (?,?,?,?,?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id_category, $name, $imager, $description, 0, $quantity_stock, $price, $discount, 0]);
    }
}

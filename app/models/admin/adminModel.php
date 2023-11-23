<?php

namespace App\Models\Admin;

use App\Models\model;

class AdminModel extends Model
{
    public $user = 'user';
    public $category = 'category';

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
        $sql = "INSERT INTO $this->category(name, imager) values(?,?)";
        $this->setQuery($sql);
        return $this->execute([$name, $imager]);
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
}

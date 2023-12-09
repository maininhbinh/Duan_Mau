<?php

namespace App\Models\Admin;

use App\Models\model;

class AdminModel extends Model
{
    public $user = 'user';
    public $category = 'category';
    public $products = 'products';
    public $comment = 'comment';

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

    public function getPerPageUser($start, $perPage)
    {
        $sql = "SELECT * FROM $this->user WHERE id_role != 1 LIMIT $start, $perPage";
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

    public function getPerPageCategory($start, $perPage)
    {
        $sql = "SELECT children.*, parent.name as parent_name FROM $this->category as children LEFT JOIN $this->category as parent ON children.id_parent = parent.id LIMIT $start, $perPage";

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

    public function getPerPageProduct($start, $perPage)
    {
        $sql = "SELECT $this->products.*, $this->category.name as category_name FROM $this->products JOIN $this->category ON $this->products.id_category = $this->category.id WHERE $this->products.is_delete != 1 LIMIT $start, $perPage";

        $this->setQuery($sql);

        return $this->loadAllRow();
    }

    public function addProduct($id_category, $name, $imager, $description, $quantity_stock, $price, $discount)
    {
        $sql = "INSERT INTO $this->products(id_category, name, imager, description, view, quantity_stock, price, discount, is_delete) values (?,?,?,?,?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id_category, $name, $imager, $description, 0, $quantity_stock, $price, $discount, 0]);
    }

    public function editProduct($id)
    {
        $sql = "SELECT * FROM $this->products WHERE id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }

    public function updateProduct($id_category, $name, $imager, $description, $quantity_stock, $price, $discount, $id)
    {
        $sql = "UPDATE $this->products SET id_category = ?, name = ?, imager = ?, description = ?, quantity_stock = ?, discount = ?, price = ? WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id_category, $name, $imager, $description, $quantity_stock, $discount, $price, $id]);
    }

    public function deleteProduct($id)
    {
        $sql = "UPDATE $this->products set is_delete = ? WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([1, $id]);
    }

    public function userInActive($id)
    {
        $sql = "UPDATE $this->user SET is_delete = ? WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([1, $id]);
    }
    public function userActive($id)
    {
        $sql = "UPDATE $this->user SET is_delete = ? WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([0, $id]);
    }

    public function statisticalProduct()
    {
        $sql = "SELECT count(id) as product FROM $this->products where is_delete != 1";
        $this->setQuery($sql);
        return $this->loadRow();
    }
    public function statisticalUser()
    {
        $sql = "SELECT count(id) as user FROM $this->user where is_delete != 1";
        $this->setQuery($sql);
        return $this->loadRow();
    }
    public function statisticalCategory()
    {
        $sql = "SELECT count(id) as category FROM $this->category where is_delete != 1";
        $this->setQuery($sql);
        return $this->loadRow();
    }
    public function statisticalView()
    {
        $sql = "SELECT SUM(view) as view FROM $this->products";
        $this->setQuery($sql);
        return $this->loadRow();
    }

    public function role($id)
    {
        $sql = "UPDATE $this->user SET id_role = ? where id = ?";
        $this->setQuery($sql);
        return $this->execute([1, $id]);
    }

    public function getAllcomment()
    {
        $sql = "SELECT $this->comment.*, $this->user.name as nameUser, $this->products.name as nameProduct FROM $this->comment join $this->user on $this->comment.id_user = $this->user.id and $this->user.id_role != 1 join $this->products on $this->comment.id_product = $this->products.id";
        $this->setQuery($sql);
        return $this->loadAllRow();
    }
    public function getPerPageComment($start, $perPage)
    {
        $sql = "SELECT $this->comment.*, $this->user.name as nameUser, $this->products.name as nameProduct FROM $this->comment join $this->user on $this->comment.id_user = $this->user.id and $this->user.id_role != 1 join $this->products on $this->comment.id_product = $this->products.id LIMIT $start, $perPage ";
        $this->setQuery($sql);
        return $this->loadAllRow();
    }

    public function commentDelete($id)
    {
        $sql = "DELETE FROM $this->comment WHERE id = ?";
        $this->setQuery($sql);
        return $this->loadAllRow([$id]);
    }

    public function pageProduct()
    {
        $sql = "SELECT count(id) as countPage FROM $this->products WHERE is_delete != 1";
        $this->setQuery($sql);
        return $this->loadRow();
    }
    public function pageCategory()
    {
        $sql = "SELECT count(id) as countPage FROM $this->category WHERE is_delete != 1";
        $this->setQuery($sql);
        return $this->loadRow();
    }
    public function pageUser()
    {
        $sql = "SELECT count(id) as countPage FROM $this->user WHERE is_delete != 1";
        $this->setQuery($sql);
        return $this->loadRow();
    }
    public function pageComment()
    {
        $sql = "SELECT count(id) as countPage FROM $this->comment";
        $this->setQuery($sql);
        return $this->loadRow();
    }
}

<?php

namespace App\Models;

use App\Models\model;

class HomeModel extends model
{
    public $category = 'category';
    public $user = 'user';
    public $products = 'products';
    public $comment = 'comment';
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

    public function getAllProductByIdParent($id)
    {
        $sql = "SELECT $this->products.* FROM $this->products join $this->category on $this->products.id_category = $this->category.id where $this->category.id = ? or $this->category.id_parent = ? and $this->category.is_delete != 1";
        $this->setQuery($sql);
        return $this->loadAllRow([$id, $id]);
    }

    public function getAllCategoryByIdParent($id)
    {
        $sql = "SELECT * FROM $this->category WHERE id_parent = ? and is_delete != 1";
        $this->setQuery($sql);
        return $this->loadAllRow([$id]);
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
        $sql = "SELECT * FROM $this->products WHERE quantity_stock > ? ORDER BY id DESC limit 12";
        $this->setQuery($sql);
        return $this->loadAllRow([1]);
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
        $sql = "UPDATE $this->products SET view = view + ? WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([1, $id]);
    }

    public function viewMost()
    {
        $sql = "SELECT * from $this->products WHERE quantity_stock > ? ORDER BY `view` DESC LIMIT 10";
        $this->setQuery($sql);
        return $this->loadAllRow([1]);
    }

    public function filterSortDesc()
    {
        $sql = "SELECT * FROM $this->products ORDER BY price desc";
        $this->setQuery($sql);
        return $this->loadAllRow();
    }

    public function filterSortAsc()
    {
        $sql = "SELECT * FROM $this->products ORDER BY price asc";
        $this->setQuery($sql);
        return $this->loadAllRow();
    }

    public function filterSortDescByIdParent($id)
    {
        $sql = "SELECT $this->products.* FROM $this->products join $this->category on $this->products.id_category = $this->category.id where $this->category.id = ? or $this->category.id_parent = ? ORDER BY price desc";
        $this->setQuery($sql);
        return $this->loadAllRow([$id, $id]);
    }

    public function filterSortAscByIdParent($id)
    {
        $sql = "SELECT $this->products.* FROM $this->products join $this->category on $this->products.id_category = $this->category.id where $this->category.id = ? or $this->category.id_parent = ? ORDER BY price asc";
        $this->setQuery($sql);
        return $this->loadAllRow([$id, $id]);
    }

    public function postComment($comment, $idProduct, $idUser, $date)
    {
        $sql = "INSERT INTO $this->comment(id_user, id_product, comment, date) values (?,?,?,?)";

        $this->setQuery($sql);
        return $this->execute([$idUser, $idProduct, $comment, $date]);
    }

    public function getCommentByProduct()
    {
        $sql = "SELECT $this->comment.*,  $this->user.name, $this->user.avatar  FROM $this->comment JOIN $this->user on $this->comment.id_user = $this->user.id JOIN $this->products on $this->comment.id_product = $this->products.id";
        $this->setQuery($sql);
        return $this->loadAllRow();
    }
}

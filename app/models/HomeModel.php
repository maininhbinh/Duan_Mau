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
        $sql = "SELECT $this->products.* FROM $this->products join $this->category on $this->products.id_category = $this->category.id where $this->category.id = ? and $this->products.is_delete != 1 or $this->category.id_parent = ?";
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
        $sql = "SELECT * FROM $this->products where is_delete != 1";
        $this->setQuery($sql);
        return $this->loadAllRow();
    }

    public function getNewProduct()
    {
        $sql = "SELECT * FROM $this->products WHERE quantity_stock > ? and is_delete != 1 ORDER BY id DESC limit 12";
        $this->setQuery($sql);
        return $this->loadAllRow([1]);
    }

    public function getOneProduct($id)
    {
        $sql = "SELECT * FROM $this->products WHERE id = ? and is_delete != 1";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }

    public function getProductSame($id, $category)
    {
        $sql = "SELECT * FROM $this->products WHERE id_category = ? and id != ? and is_delete != 1";
        $this->setQuery($sql);
        return $this->loadAllRow([$category, $id]);
    }

    public function filterCategory($values)
    {
        $placeholders = implode(',', array_fill(0, count($values), '?'));
        $sql = "SELECT * FROM $this->products WHERE is_delete != 1 and id_category in ($placeholders)";
        $this->setQuery($sql);
        return $this->loadAllRow($values);
    }

    public function filterName($name)
    {
        $sql = "SELECT * FROM $this->products WHERE name like ? and is_delete != 1";
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
        $sql = "SELECT * from $this->products WHERE quantity_stock > ? and is_delete != 1 ORDER BY `view` DESC LIMIT 10";
        $this->setQuery($sql);
        return $this->loadAllRow([1]);
    }

    public function filterSortDesc()
    {
        $sql = "SELECT * FROM $this->products where is_delete != 1 ORDER BY price desc";
        $this->setQuery($sql);
        return $this->loadAllRow();
    }

    public function filterSortAsc()
    {
        $sql = "SELECT * FROM $this->products where is_delete != 1 ORDER BY price asc";
        $this->setQuery($sql);
        return $this->loadAllRow();
    }

    public function filterSortDescByIdParent($id)
    {
        $sql = "SELECT $this->products.* FROM $this->products join $this->category on $this->products.id_category = $this->category.id where $this->category.id = ? and $this->products.is_delete != 1 or $this->category.id_parent = ? ORDER BY price desc";
        $this->setQuery($sql);
        return $this->loadAllRow([$id, $id]);
    }

    public function filterSortAscByIdParent($id)
    {
        $sql = "SELECT $this->products.* FROM $this->products join $this->category on $this->products.id_category = $this->category.id where $this->category.id = ? and $this->products.is_delete != 1 or $this->category.id_parent = ?  ORDER BY price asc";
        $this->setQuery($sql);
        return $this->loadAllRow([$id, $id]);
    }

    public function postComment($comment, $idProduct, $idUser, $date)
    {
        $sql = "INSERT INTO $this->comment(id_user, id_product, comment, date) values (?,?,?,?)";

        $this->setQuery($sql);
        return $this->execute([$idUser, $idProduct, $comment, $date]);
    }

    public function getCommentByProduct($id)
    {
        // $sql = "SELECT c1.*, u1.name, u1.avatar, c2.comment as replyComment, c2.id as replyId, c2.id_user as replyUser, c2.id_product as replyProduct, c2.date as replyDate, u2.name as replyUserName, u2.avatar as replyUserAvatar  FROM $this->comment as c1 LEFT JOIN $this->comment as c2 on c2.id_reply = c1.id join $this->user as u1 on c1.id_user = u1.id join $this->products on c1.id_product = $this->products.id join $this->user as u2 on c2.id_user = u2.id WHERE c1.id_reply is null";
        $sql = "SELECT $this->comment.*,$this->user.name, $this->user.avatar  FROM $this->comment join $this->user on $this->comment.id_user = $this->user.id WHERE $this->comment.id_product = ?";
        $this->setQuery($sql);
        return $this->loadAllRow([$id]);
    }

    public function replyComment($comment, $idProduct, $idUser, $idReply, $date)
    {
        $sql = "INSERT INTO $this->comment(id_user, id_product, comment, id_reply, date) values (?,?,?,?,?)";

        $this->setQuery($sql);
        return $this->loadAllRow([$idUser, $idProduct, $comment, $idReply, $date]);
    }

    public function deleteComment($id)
    {
        $sql = "DELETE FROM $this->comment WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
}

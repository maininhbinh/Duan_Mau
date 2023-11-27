<?php

namespace App\Models\Client;

use App\Models\model;

class UserModel extends Model
{
    public $user = 'user';

    public function addAccount($name, $email, $password, $id_role, $is_delete)
    {
        $sql = "INSERT INTO $this->user(name, email, password, id_role, is_delete) values(?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$name, $email, $password, $id_role, $is_delete]);
    }

    public function getAllUser()
    {
        $sql = "SELECT * FROM $this->user";
        $this->setQuery($sql);
        return $this->loadAllRow();
    }

    public function getOneUser($id)
    {
        $sql = "SELECT * FROM $this->user WHERE id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }

    public function checkEmail($email)
    {
        $sql = "SELECT * FROM $this->user WHERE email = ?";
        $this->setQuery($sql);
        $data = $this->loadRow([$email]);

        return $data;
    }

    public function checkPass($password)
    {
        $sql = "SELECT * FROM $this->user WHERE password = ?";
        $this->setQuery($sql);
        $data = $this->loadRow([$password]);

        return $data;
    }

    public function updateAvatar($nameFile, $id)
    {
        $sql = "UPDATE $this->user SET avatar = ? WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$nameFile, $id]);
    }

    public function updatePassword($newPassword, $id)
    {
        $sql = "UPDATE $this->user SET password = ? WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$newPassword, $id]);
    }

    public function updateProfile($name, $phone, $address, $id)
    {
        $sql = "UPDATE $this->user SET name = ?, phone = ?, address = ? WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$name, $phone, $address, $id]);
    }
}

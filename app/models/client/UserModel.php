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

    public function getUser()
    {
        $sql = "SELECT * FROM $this->user";
        $this->setQuery($sql);
        return $this->loadAllRow();
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
}

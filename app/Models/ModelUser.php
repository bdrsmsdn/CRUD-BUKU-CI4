<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['id_user', 'username', 'password', 'level'];

    public function getUser($user)
    {
        return $this->where('username', $user)->first();
    }

    public function findId($id)
    {
        return $this->where([$this->primaryKey => $id])->first();
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPenerbit extends Model
{
    protected $table = "penerbit";
    protected $primaryKey = "id_penerbit";
    protected $allowedFields = ['id_penerbit', 'penerbit', 'alamat', 'kota', 'telepon'];

    public function getPenerbit()
    {
        return $this->findAll();
    }

    public function addPenerbit($data)
    {
        return $this->db->table('penerbit')->insert($data);
    }

    public function findId($id)
    {
        return $this->where([$this->primaryKey => $id])->first();
    }

    public function updatePenerbit($id, $data)
    {
        return $this->where([$this->primaryKey => $id])->set($data)->update();
    }
}
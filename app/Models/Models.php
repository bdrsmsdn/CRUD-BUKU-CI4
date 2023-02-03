<?php

namespace App\Models;

use CodeIgniter\Model;

class Models extends Model
{
    protected $table = "buku";
    protected $primaryKey = "id_buku";
    protected $allowedFields = ['id_buku', 'kategori', 'nama', 'harga', 'stok', 'id_penerbit'];

    public function getBuku()
    {
         return $this->db->table('buku')
         ->join('penerbit', 'buku.id_penerbit = penerbit.id_penerbit')
         ->get()->getResultArray();  
    }

    public function getBukubyStok()
    {
         return $this->db->table('buku')
         ->join('penerbit', 'buku.id_penerbit = penerbit.id_penerbit')
         ->orderBy('stok', 'ASC')
         ->get()->getResultArray();  
    }

    public function searchBuku($search)
    {
    return $this->db->table('buku')
    ->join('penerbit', 'buku.id_penerbit = penerbit.id_penerbit')
    ->like('nama', $search)
    ->get()->getResultArray();
    }

    public function addBuku($data)
    {
        return $this->db->table('buku')->insert($data);
    }

    public function findId($id)
    {
        return $this->where([$this->primaryKey => $id])->first();
    }

    public function saveBuku($data)
    {
        return $this->insert($data);
    }

    public function updateBuku($id, $data)
    {
        return $this->where([$this->primaryKey => $id])->set($data)->update();
    }

    public function deleteBuku($id)
    {
        return $this->where([$this->primaryKey => $id])->delete();
    }
}
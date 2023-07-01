<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTransaksi extends Model
{
    protected $table = "transaksi";
    protected $primaryKey = "id_transaksi";
    protected $allowedFields = ['id_transaksi', 'id_user', 'id_buku', 'jumlah'];

    public function getTransaksi()
    {
        return $this->findAll();
    }

    public function addTransaksi($data)
    {
        return $this->db->table('transaksi')->insert($data);
    }

    public function findId($id)
    {
        return $this->where([$this->primaryKey => $id])->first();
    }

    public function updateTransaksi($id, $data)
    {
        return $this->where([$this->primaryKey => $id])->set($data)->update();
    }

    public function getTransaksiWithBuku($id_user)
    {
        return $this->select('transaksi.*, buku.nama AS nama_buku')
            ->join('buku', 'buku.id_buku = transaksi.id_buku')
            ->where('transaksi.id_user', $id_user)
            ->findAll();
    }
}

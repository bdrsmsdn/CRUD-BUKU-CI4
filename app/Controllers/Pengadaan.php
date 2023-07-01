<?php

namespace App\Controllers;

use App\Models\Models;

class Pengadaan extends BaseController
{
    protected $model;
    protected $modelt;
    function __construct()
    {
        $this->model = new \App\Models\Models();
        $this->modelt = new \App\Models\ModelTransaksi();
    }
    public function index()
    {
        $data['dataPengadaan'] = $this->model->getBukubyStok();
        return view('admin/pengadaan_view', $data);
    }

    public function index2()
    {
        $id = session()->get('id_user');
        $data['transaksi'] = $this->modelt->getTransaksiWithBuku($id);
        return view('user/mybook_view', $data);
    }
}

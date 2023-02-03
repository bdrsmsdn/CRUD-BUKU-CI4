<?php

namespace App\Controllers;
use App\Models\Models;

class Pengadaan extends BaseController
{
    protected $model;
    function __construct()
    {
        $this->model = new \App\Models\Models();
    }
    public function index()
    {
        $data['dataPengadaan'] = $this->model->getBukubyStok();
        return view('pengadaan_view', $data);
    }
}

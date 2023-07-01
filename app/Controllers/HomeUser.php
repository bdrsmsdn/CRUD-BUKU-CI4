<?php

namespace App\Controllers;

use App\Models\Models;

class Home extends BaseController
{
    protected $model;
    function __construct()
    {
        $this->model = new \App\Models\Models();
    }
    public function index()
    {
        $model = new Models;
        $katakunci = $this->request->getGet('katakunci');
        if ($katakunci) {
            $pencarian = $this->model->searchBuku($katakunci);
        } else {
            $pencarian = $this->model->getBuku();
        }
        $data['katakunci'] = $katakunci;
        $data['dataBuku'] = $pencarian;
        return view('user/home_view', $data);
    }
}

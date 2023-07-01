<?php

namespace App\Controllers;

class User extends BaseController
{
    protected $model;
    protected $modelp;
    protected $modelt;
    function __construct()
    {
        $this->model = new \App\Models\Models();
        $this->modelp = new \App\Models\ModelPenerbit();
        $this->modelt = new \App\Models\ModelTransaksi();
    }

    public function editbuku($id)
    {
        return json_encode($this->model->findId($id));
    }

    public function update()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'jumlah' => [
                'label' => 'Jumlah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                ]
            ],
        ];

        $validasi->setRules($aturan);
        if ($validasi->withRequest($this->request)->run()) {
            $id_buku = $this->request->getPost('id_buku');
            $id_user = $this->request->getPost('id_user');
            $jumlah = $this->request->getPost('jumlah');

            $data = [
                'id_buku' => $id_buku,
                'id_user' => $id_user,
                'jumlah' => $jumlah,
            ];

            $this->modelt->addTransaksi($data);
            // return redirect()->to('/admin');
            $hasil['sukses'] = 'Berhasil Membeli Buku';
            $hasil['error'] = true;
        } else {
            $hasil['sukses'] = false;
            $hasil['error'] = $validasi->listErrors();
        }

        return json_encode($hasil);
    }
}

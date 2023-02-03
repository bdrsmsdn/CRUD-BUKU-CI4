<?php

namespace App\Controllers;

class Admin extends BaseController
{
    protected $model;
    protected $modelp;
    function __construct()
    {
        $this->model = new \App\Models\Models();
        $this->modelp = new \App\Models\ModelPenerbit();
    }

    public function editbuku($id)
    {
        return json_encode($this->model->findId($id));
    }    

    public function addbuku()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'nama' => [
                'label' => 'Judul',
                'rules' => 'required|min_length[1]',
                'errors' => [
                    'required' => '{field} harus diisi!',
                    'min_length' => 'Jumlah minimal karakter untuk field {field} adalah 1 karakter.'
                    ]
                ],
            'no_buku' => [
                'label' => 'ID Buku',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                    ]
                ],
            'kategori' => [
                'label' => 'kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                    ]
                ],
            'harga' => [
                'label' => 'Harga',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                    ]
                ],
            'stok' => [
                'label' => 'Stok',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                    ]
                ],
            'id_penerbit' => [
                'label' => 'id_penerbit',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                    ]
                ],
            ];

        $validasi->setRules($aturan);
        if($validasi->withRequest($this->request)->run()){
            $id_buku = $this->request->getPost('no_buku');
            $kategori = $this->request->getPost('kategori');
            $nama = $this->request->getPost('nama');
            $harga = $this->request->getPost('harga');
            $stok = $this->request->getPost('stok');
            $id_penerbit = $this->request->getPost('id_penerbit');

            $data = [
                'no_buku' => $id_buku,
                'kategori' => $kategori,
                'nama' => $nama,
                'harga' => $harga,
                'stok' => $stok,
                'id_penerbit' => $id_penerbit
            ];

            $this->model->addBuku($data);

            $hasil['sukses'] = 'Berhasil menambahkan buku';
            $hasil['error'] = true;
        } else {
            $hasil['sukses'] = false;
            $hasil['error'] = $validasi->listErrors();
        }
        
        return json_encode($hasil);
    }

    public function index()
    {        
        $katakunci = $this->request->getGet('katakunci');
        if ($katakunci) {
            $pencarian = $this->model->searchBuku($katakunci);
        } else {
            $pencarian = $this->model->getBuku();
        }
        $data['katakunci'] = $katakunci;
        $data['dataBuku'] = $pencarian;

        $data['penerbit'] = $this->modelp->getPenerbit();
        return view('admin_view', $data);
    }

    public function update()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'nama' => [
                'label' => 'Judul',
                'rules' => 'required|min_length[1]',
                'errors' => [
                    'required' => '{field} harus diisi!',
                    'min_length' => 'Jumlah minimal karakter untuk field {field} adalah 1 karakter.'
                    ]
                ],
            'no_buku' => [
                'label' => 'ID Buku',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                    ]
                ],
            'kategori' => [
                'label' => 'kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                    ]
                ],
            'harga' => [
                'label' => 'Harga',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                    ]
                ],
            'stok' => [
                'label' => 'Stok',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                    ]
                ],
            'id_penerbit' => [
                'label' => 'id_penerbit',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                    ]
                ],
            ];

        $validasi->setRules($aturan);
        if($validasi->withRequest($this->request)->run()){
            $id_buku = $this->request->getPost('id_buku');
            $no_buku = $this->request->getPost('no_buku');
            $kategori = $this->request->getPost('kategori');
            $nama = $this->request->getPost('nama');
            $harga = $this->request->getPost('harga');
            $stok = $this->request->getPost('stok');
            $id_penerbit = $this->request->getPost('id_penerbit');

            $data = [
                'id_buku' => $id_buku,
                'no_buku' => $no_buku,
                'kategori' => $kategori,
                'nama' => $nama,
                'harga' => $harga,
                'stok' => $stok,
                'id_penerbit' => $id_penerbit
            ];
        
            $this->model->updateBuku($id_buku, $data);
            // return redirect()->to('/admin');
            $hasil['sukses'] = 'Berhasil mengedit buku';
            $hasil['error'] = true;
        } else {
            $hasil['sukses'] = false;
            $hasil['error'] = $validasi->listErrors();
        }
    
    return json_encode($hasil);
    }

    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->to('/admin');
    }

    public function addpenerbit()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'penerbit' => [
                'label' => 'Nama Penerbit',
                'rules' => 'required|min_length[1]',
                'errors' => [
                    'required' => '{field} harus diisi!',
                    'min_length' => 'Jumlah minimal karakter untuk field {field} adalah 1 karakter.'
                    ]
                ],
            'no_penerbit' => [
                'label' => 'ID Penerbit',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                    ]
                ],
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                    ]
                ],
            'kota' => [
                'label' => 'Kota',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                    ]
                ],
            'telepon' => [
                'label' => 'Telepon',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                    ]
                ],
            ];

        $validasi->setRules($aturan);
        if($validasi->withRequest($this->request)->run()){
            $no_penerbit = $this->request->getPost('no_penerbit');
            $penerbit = $this->request->getPost('penerbit');
            $alamat = $this->request->getPost('alamat');
            $kota = $this->request->getPost('kota');
            $telepon = $this->request->getPost('telepon');

            $data = [
                'no_penerbit' => $no_penerbit,
                'penerbit' => $penerbit,
                'alamat' => $alamat,
                'kota' => $kota,
                'telepon' => $telepon,
            ];

            $this->modelp->addPenerbit($data);

            $hasil['sukses'] = 'Berhasil menambahkan penerbit';
            $hasil['error'] = true;
        } else {
            $hasil['sukses'] = false;
            $hasil['error'] = $validasi->listErrors();
        }
        
        return json_encode($hasil);
    }

    public function deletepenerbit($id)
    {
        $this->modelp->delete($id);
        return redirect()->to('/admin');
    }

    public function editpenerbit($id)
    {
        return json_encode($this->modelp->findId($id));
    }

    public function updatepenerbit()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'penerbit' => [
                'label' => 'Nama Penerbit',
                'rules' => 'required|min_length[1]',
                'errors' => [
                    'required' => '{field} harus diisi!',
                    'min_length' => 'Jumlah minimal karakter untuk field {field} adalah 1 karakter.'
                    ]
                ],
            'no_penerbit' => [
                'label' => 'ID Penerbit',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                    ]
                ],
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                    ]
                ],
            'kota' => [
                'label' => 'Kota',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                    ]
                ],
            'telepon' => [
                'label' => 'Telepon',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                    ]
                ],
            ];

        $validasi->setRules($aturan);
        if($validasi->withRequest($this->request)->run()){
            $id_penerbit = $this->request->getPost('id_penerbit');
            $no_penerbit = $this->request->getPost('no_penerbit');
            $penerbit = $this->request->getPost('penerbit');
            $alamat = $this->request->getPost('alamat');
            $kota = $this->request->getPost('kota');
            $telepon = $this->request->getPost('telepon');

            $data = [
                'id_penerbit' => $id_penerbit,
                'no_penerbit' => $no_penerbit,
                'penerbit' => $penerbit,
                'alamat' => $alamat,
                'kota' => $kota,
                'telepon' => $telepon,
            ];
        
            $this->modelp->updatePenerbit($id_penerbit, $data);
            // return redirect()->to('/admin');
            $hasil['sukses'] = 'Berhasil mengedit penerbit';
            $hasil['error'] = true;
        } else {
            $hasil['sukses'] = false;
            $hasil['error'] = $validasi->listErrors();
        }
        return json_encode($hasil);
    }
}
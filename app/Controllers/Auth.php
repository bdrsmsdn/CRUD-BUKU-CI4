<?php

namespace App\Controllers;

use App\Models\ModelUser;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function index()
    {
        return view('login'); // Tampilkan halaman login
    }

    public function process()
    {
        $userModel = new ModelUser();

        // Ambil data dari form login
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Cari pengguna berdasarkan username
        $user = $userModel->getUser($username);

        if ($user) {
            // Verifikasi password
            if ($password === $user['password']) {
                // Password cocok, buat sesi login
                $this->createUserSession($user);

                // Arahkan ke dashboard sesuai level pengguna
                switch ($user['level']) {
                    case 1:
                        return redirect()->to('/admin/home');
                    case 2:
                        return redirect()->to('/user/home');
                }
            } else {
                // Password tidak cocok
                session()->setFlashdata('error', 'Kata sandi salah!');
                return redirect()->to('/');
            }
        } else {
            // Pengguna tidak ditemukan
            session()->setFlashdata('error', 'username tidak ditemukan!');
            return redirect()->to('/');
        }
    }

    private function createUserSession($user)
    {
        // Buat sesi login dengan data pengguna
        $userData = [
            'id_user' => $user['id_user'],
            'username' => $user['username'],
            'level' => $user['level'],
            'isLoggedIn' => true
        ];

        session()->set($userData);
    }

    public function logout()
    {
        // Hapus sesi login dan arahkan ke halaman login
        session()->destroy();
        return redirect()->to('/');
    }
}

<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function authenticate()
    {
        // Mendapatkan data form
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();

        // Mencari user berdasarkan email
        $user = $userModel->where('email', $email)->first();

        if ($user) {
            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                // Login berhasil, buat session
                session()->set('user_id', $user['id']);
                session()->set('user_name', $user['name']);
                return redirect()->to('/dashboard');
            } else {
                // Password salah
                session()->setFlashdata('error', 'Password salah!');
                return redirect()->back();
            }
        } else {
            // Email tidak ditemukan
            session()->setFlashdata('error', 'Email tidak ditemukan!');
            return redirect()->back();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}

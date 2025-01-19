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
        $session = session();
        $model = new UserModel();

        $validation = \Config\Services::validation();
        $validation->setRules([
            'email' => 'required|valid_email',
            'password' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            $session->setFlashdata('error', $validation->getErrors());
            return redirect()->back()->withInput();
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $user = $model->where('email', $email)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $session->set([
                    'user_id' => $user['id'],
                    'user_name' => $user['name'],
                    'role' => $user['role'],
                    'sub_wilayah' => $user['sub_wilayah'],
                    'foto' => $user['foto'],
                    'isLoggedIn' => true
                ]);

                return $this->redirectBasedOnRole($user['role']);
            } else {
                $session->setFlashdata('error', 'Password salah! Silakan coba lagi.');
                return redirect()->back();
            }
        } else {
            $session->setFlashdata('error', 'Email tidak ditemukan! Silakan periksa kembali.');
            return redirect()->back();
        }
    }

    private function redirectBasedOnRole($role)
    {
        if ($role == 1) {
            return redirect()->to('admin/');
        } elseif ($role == 2) {
            return redirect()->to('/user/dashboard');
        } elseif ($role == 3) {
            return redirect()->to('admin/');
        }

        return redirect()->to('/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('message', 'Anda telah berhasil logout.');
    }
}

<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $userModel = new UserModel();
        $users = $userModel->findAll(); // Mengambil semua data pengguna

        // Mengirim data ke view
        return view('Manajement', ['users' => $users]);
    }

    public function create()
    {
        $userId = $this->request->getPost('userId');
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'role' => $this->request->getPost('role'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        // Jika userId ada, berarti kita melakukan update
        if ($userId) {
            // Proses update data
            $this->userModel->update($userId, $data);
        } else {
            // Proses create data
            $this->userModel->save($data);
        }

        return redirect()->to('admin/user');
    }

    public function edit($id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id); // Menemukan user berdasarkan ID
        return $this->response->setJSON($user); // Pastikan data direspon dalam format JSON
    }

    public function update($id)
    {
        // Ambil data yang dikirimkan melalui POST
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $role = $this->request->getPost('role');
        $password = $this->request->getPost('password');

        // Validasi dan update data pengguna
        $userModel = new UserModel();

        // Jika password kosong, biarkan password lama tetap ada
        $data = [
            'name' => $name,
            'email' => $email,
            'role' => $role,
        ];

        if (!empty($password)) {
            // Hash password jika ada perubahan
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $userModel->update($id, $data);

        // Redirect atau kembali setelah update berhasil
        return redirect()->to('admin/user');
    }


    public function delete($id)
    {
        $userModel = new UserModel();
        $userModel->delete($id); // Menghapus data pengguna berdasarkan ID
        return redirect()->to('admin/user');
    }
}

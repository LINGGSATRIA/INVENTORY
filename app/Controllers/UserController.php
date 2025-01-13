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
        $users = $this->userModel->findAll(); // Mengambil semua data pengguna

        // Mengirim data ke view
        return view('Manajement', ['users' => $users]);
    }

    public function create()
    {
        // Ambil data dari form
        $userId = $this->request->getPost('userId');
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $role = $this->request->getPost('role');
        $sub_wilayah = $this->request->getPost('sub_wilayah');
        $password = $this->request->getPost('password');

        // Upload foto jika ada
        $photo = $this->request->getFile('foto');
        $photoPath = '..img/default.jpg'; // Foto default jika tidak ada foto yang di-upload

        if ($photo && $photo->isValid() && !$photo->hasMoved()) {
            // Mengubah nama foto menjadi kombinasi ID pengguna dan timestamp
            $newFileName = $userId . '_' . time() . '.' . $photo->getExtension();
            $photoPath = 'uploads/' . $newFileName;
            $photo->move(ROOTPATH . 'public/adminfoto/uploads', $newFileName);  // Menyimpan foto di folder 'public/uploads'
        }

        // Cek jika salah satu field kosong
        if (empty($name) || empty($email) || empty($role) || empty($sub_wilayah) || empty($password)) {
            return redirect()->back()->with('error', 'Semua field harus diisi.');
        }

        // Siapkan data
        $data = [
            'name' => $name,
            'email' => $email,
            'role' => $role,
            'sub_wilayah' => $sub_wilayah,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'foto' => $photoPath, // Menyimpan path foto
        ];

        // Jika userId ada, berarti kita melakukan update
        if ($userId) {
            // Proses update data
            $this->userModel->update($userId, $data);
        } else {
            // Proses create data
            $this->userModel->save($data);
        }

        return redirect()->to('admin/user')->with('success', 'Data pengguna berhasil disimpan.');
    }

    public function edit($id)
    {
        $user = $this->userModel->find($id); // Menemukan user berdasarkan ID

        // Jika foto tidak ada dalam database, set foto default
        if (empty($user['foto'])) {
            $user['foto'] = '../img/undraw_profile_2.svg'; // Foto default jika tidak ada foto
        }

        return $this->response->setJSON($user); // Pastikan data direspon dalam format JSON
    }

    public function update($id)
    {
        // Ambil data yang dikirimkan melalui POST
        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $role = $this->request->getPost('role');
        $sub_wilayah = $this->request->getPost('sub_wilayah');
        $password = $this->request->getPost('password');

        // Ambil data pengguna dari database berdasarkan ID
        $user = $this->userModel->find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan.');
        }

        // Upload foto jika ada file baru yang diunggah
        $photo = $this->request->getFile('foto');
        $photoPath = $user['foto']; // Default ke foto lama

        if ($photo && $photo->isValid() && !$photo->hasMoved()) {
            // Menghapus foto lama jika ada file baru
            if (!empty($user['foto']) && file_exists(ROOTPATH . 'public/' . $user['foto'])) {
                unlink(ROOTPATH . 'public/' . $user['foto']);
            }

            // Mengubah nama foto menjadi kombinasi ID pengguna dan timestamp
            $newFileName = $id . '_' . time() . '.' . $photo->getExtension();
            $photoPath = 'uploads/' . $newFileName;
            $photo->move(ROOTPATH . 'public/adminfoto/uploads', $newFileName);  // Menyimpan foto di folder 'public/uploads'
        }

        // Validasi input wajib
        if (empty($name) || empty($email) || empty($role) || empty($sub_wilayah)) {
            return redirect()->back()->with('error', 'Semua field harus diisi kecuali password.');
        }

        // Siapkan data untuk diperbarui
        $data = [
            'name' => $name,
            'email' => $email,
            'role' => $role,
            'sub_wilayah' => $sub_wilayah,
            'foto' => $photoPath, // Tetapkan foto lama atau baru
        ];

        if (!empty($password)) {
            // Hash password jika ada perubahan
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        // Proses update
        $this->userModel->update($id, $data);

        return redirect()->to('admin/user')->with('success', 'Data pengguna berhasil diperbarui.');
    }


    public function delete($id)
    {
        $this->userModel->delete($id); // Menghapus data pengguna berdasarkan ID
        return redirect()->to('admin/user')->with('success', 'Data pengguna berhasil Dihapus.');
    }
}

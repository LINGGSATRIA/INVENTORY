<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';  // Nama tabel di database
    protected $primaryKey = 'id';  // Primary key tabel
    protected $allowedFields = ['name', 'email', 'role', 'password', 'foto'];  // Kolom yang diizinkan
    protected $useTimestamps = true;  // Menggunakan timestamp jika ada

    // Hash password sebelum menyimpan data
    public function insertUser($data)
    {
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        return $this->save($data);
    }
}

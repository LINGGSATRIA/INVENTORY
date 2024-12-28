<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';  // Sesuaikan dengan nama tabel Anda
    protected $primaryKey = 'id';
    protected $allowedFields = ['email', 'password', 'name'];
    protected $useTimestamps = true;

    // Menambahkan hashing password sebelum menyimpan data
    public function insertUser($data)
    {
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        return $this->save($data);
    }
}

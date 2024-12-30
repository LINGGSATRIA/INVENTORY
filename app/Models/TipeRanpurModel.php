<?php

namespace App\Models;

use CodeIgniter\Model;

class TipeRanpurModel extends Model
{
    protected $table = 'tipe_ranpur';
    protected $primaryKey = 'id';
    protected $allowedFields = ['tipe_ranpur'];
    public function getOrCreate($data)
    {
        // Cari data berdasarkan parameter
        $existingData = $this->where($data)->first();

        if ($existingData) {
            // Jika data ditemukan, kembalikan ID-nya
            return $existingData[$this->primaryKey];
        } else {
            // Jika data tidak ditemukan, tambahkan data baru dan kembalikan ID-nya
            return $this->insert($data, true); // Parameter true mengembalikan ID
        }
    }
}

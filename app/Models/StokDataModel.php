<?php

namespace App\Models;

use CodeIgniter\Model;

class StokDataModel extends Model
{
    protected $table = 'kategori_stok'; // Nama tabel
    protected $primaryKey = 'id'; // Primary key tabel
    protected $allowedFields = ['id_kategori', 'id_tipe_ranpur', 'deskripsi']; // Kolom yang diizinkan untuk diisi

    public function getOrCreate($data)
    {
        $existingData = $this->where($data)->first();

        if ($existingData) {
            return $existingData[$this->primaryKey];
        } else {
            return $this->insert($data, true);
        }
    }
}

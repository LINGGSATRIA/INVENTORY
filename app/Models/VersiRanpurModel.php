<?php

namespace App\Models;

use CodeIgniter\Model;

class VersiRanpurModel extends Model
{
    protected $table = 'versi_ranpur';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_versi'];

    /**
     * Fungsi untuk mendapatkan ID versi ranpur yang ada atau membuat versi baru jika tidak ditemukan.
     *
     * @param string $versiRanpur Nama versi ranpur.
     * @return int ID versi ranpur.
     */
    public function getOrCreate($versiRanpur)
    {
        // Cari data berdasarkan nama_versi
        $existingData = $this->where('nama_versi', $versiRanpur)->first();

        if ($existingData) {
            // Jika data ditemukan, kembalikan ID-nya
            return $existingData[$this->primaryKey];
        } else {
            // Jika data tidak ditemukan, tambahkan data baru dan kembalikan ID-nya
            return $this->insert(['nama_versi' => $versiRanpur], true); // Parameter true untuk mengembalikan ID
        }
    }
}

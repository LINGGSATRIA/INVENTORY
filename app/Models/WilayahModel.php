<?php

namespace App\Models;

use CodeIgniter\Model;

class WilayahModel extends Model
{
    protected $table = 'wilayah';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'nama_wilayah'];
    protected $useTimestamps = false;

    /**
     * Fungsi untuk mendapatkan ID wilayah yang ada atau membuat wilayah baru jika tidak ditemukan.
     *
     * @param string $namaWilayah Nama wilayah.
     * @return int ID wilayah.
     */
    public function getOrCreate($namaWilayah)
    {
        // Cari data berdasarkan nama_wilayah
        $existingData = $this->where('nama_wilayah', $namaWilayah)->first();

        if ($existingData) {
            // Jika data ditemukan, kembalikan ID-nya
            return $existingData[$this->primaryKey];
        } else {
            // Jika data tidak ditemukan, tambahkan data baru dan kembalikan ID-nya
            return $this->insert(['nama_wilayah' => $namaWilayah], true); // Parameter true untuk mengembalikan ID
        }
    }
}

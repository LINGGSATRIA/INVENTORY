<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    protected $table = 'kategori'; // Nama tabel di database
    protected $primaryKey = 'id'; // Primary key tabel
    protected $allowedFields = ['nama_kategori']; // Kolom yang dapat diisi melalui insert atau update

    /**
     * Method untuk mendapatkan atau membuat kategori baru berdasarkan nama.
     * @param string $namaKategori Nama kategori
     * @return int ID kategori yang ditemukan atau baru dibuat
     */
    public function getOrCreate($namaKategori)
    {
        // Periksa apakah kategori dengan nama yang diberikan sudah ada
        $existingKategori = $this->where('nama_kategori', $namaKategori)->first();

        if ($existingKategori) {
            // Jika ada, kembalikan ID-nya
            return $existingKategori['id'];
        }

        // Jika tidak ada, tambahkan kategori baru
        return $this->insert(['nama_kategori' => $namaKategori], true); // Parameter true untuk mengembalikan ID yang dihasilkan
    }
}

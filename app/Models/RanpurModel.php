<?php

namespace App\Models;

use CodeIgniter\Model;

class RanpurModel extends Model
{
    protected $table = 'ranpur';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_jenis_ranpur', 'id_tipe_ranpur', 'id_wilayah', 'nama_ranpur', 'deskripsi'];

    // Method untuk mengambil data Ranpur berdasarkan nama tipe ranpur (Leopard, dsb.) dan join dengan tabel Wilayah
    public function getByNameWithWilayah($namaTipeRanpur)
    {
        return $this->select('wilayah.nama_wilayah, tipe_ranpur.tipe_ranpur')
            ->join('wilayah', 'ranpur.id_wilayah = wilayah.id')
            ->join('tipe_ranpur', 'ranpur.id_tipe_ranpur = tipe_ranpur.id')
            ->where('tipe_ranpur.tipe_ranpur', $namaTipeRanpur)
            ->groupBy('wilayah.nama_wilayah') // Mengelompokkan data berdasarkan nama_wilayah
            ->findAll();
    }


    public function getRanpurByWilayah($namaWilayah)
    {
        return $this->select('ranpur.nama_ranpur, wilayah.nama_wilayah') // Memilih kolom nama_ranpur dan nama_wilayah
            ->join('wilayah', 'ranpur.id_wilayah = wilayah.id') // Join tabel wilayah
            ->where('wilayah.nama_wilayah', $namaWilayah) // Filter berdasarkan nama_wilayah
            ->findAll(); // Mengambil semua hasil
    }

    public function getDeskripsi($nama_ranpur, $nama_wilayah)
    {
        return $this->select('ranpur.*, wilayah.nama_wilayah')
            ->join('wilayah', 'wilayah.id = ranpur.id_wilayah')
            ->where('ranpur.nama_ranpur', $nama_ranpur)
            ->where('wilayah.nama_wilayah', $nama_wilayah)
            ->findAll();
    }
}

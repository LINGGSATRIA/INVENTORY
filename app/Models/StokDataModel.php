<?php

namespace App\Models;

use CodeIgniter\Model;

class StokDataModel extends Model
{
    protected $table = 'kategori_stok'; // Nama tabel
    protected $primaryKey = 'id'; // Primary key tabel
    protected $allowedFields = ['id_kategori', 'id_versi_ranpur', 'Deskripsi', 'sub_wilayah'];

    public function getOrCreate($data)
    {
        $existingData = $this->where($data)->first();

        if ($existingData) {
            return $existingData[$this->primaryKey];
        } else {
            return $this->insert($data, true);
        }
    }

    public function getDeskripsiWithJoin($namaVersi, $namaKategori, $subWilayah)
    {
        // Cek jika null, beri nilai default
        $namaVersi = $namaVersi ?? '';
        $namaKategori = $namaKategori ?? '';
        $subWilayah = $subWilayah ?? '';
    
        return $this->select('kategori_stok.*, versi_ranpur.nama_versi, kategori.nama_kategori')
            ->join('versi_ranpur', 'versi_ranpur.id = kategori_stok.id_versi_ranpur')
            ->join('kategori', 'kategori.id = kategori_stok.id_kategori')
            ->where('LOWER(versi_ranpur.nama_versi)', strtolower($namaVersi))
            ->where('LOWER(kategori.nama_kategori)', strtolower($namaKategori))
            ->where('LOWER(kategori_stok.sub_wilayah)', strtolower($subWilayah))
            ->first();
    }

    public function getByWilayahSubWilayah($wilayah)
    {
        // Cek jika null, beri nilai default
        $wilayah = $wilayah ?? '';
        $subWilayah = $subWilayah ?? '';

        return $this->select('kategori_stok.*, kategori.nama_kategori, kategori_stok.Deskripsi as deskripsi, ranpur.sub_wilayah, ranpur.id_wilayah, versi_ranpur.nama_versi')
            ->join('versi_ranpur', 'versi_ranpur.id = kategori_stok.id_versi_ranpur')
            ->join('kategori', 'kategori.id = kategori_stok.id_kategori')
            ->join('wilayah', 'wilayah.id = kategori_stok.id_kategori')
            ->join('ranpur', 'ranpur.id_versi_ranpur = versi_ranpur.id')
            ->where('LOWER(ranpur.wilayah)', strtolower($wilayah))
            ->findAll();
    }
    public function ambilsemua($tipe)
    {
        return $this->select('kategori_stok.*, kategori.nama_kategori, kategori_stok.Deskripsi,  versi_ranpur.nama_versi')
            ->join('versi_ranpur', 'versi_ranpur.id = kategori_stok.id_versi_ranpur')
            ->join('kategori', 'kategori.id = kategori_stok.id_kategori')
            ->where('versi_ranpur.nama_versi', $tipe)
            ->findAll();
    }
    public function ambilpersubwilayah($sub_wilayah)
    {
        return $this->select('kategori_stok.*, kategori.nama_kategori, kategori_stok.Deskripsi,  versi_ranpur.nama_versi')
            ->join('versi_ranpur', 'versi_ranpur.id = kategori_stok.id_versi_ranpur')
            ->join('kategori', 'kategori.id = kategori_stok.id_kategori')
            ->where('kategori_stok.sub_wilayah', $sub_wilayah)
            ->findAll();
    }
}

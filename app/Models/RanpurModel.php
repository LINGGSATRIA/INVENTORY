<?php

namespace App\Models;

use CodeIgniter\Model;

class RanpurModel extends Model
{
    protected $table = 'ranpur';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_jenis_ranpur', 'id_tipe_ranpur', 'id_versi_ranpur', 'id_wilayah', 'sub_wilayah', 'deskripsi'];


    public function getTIpeBykategori($namaTipeRanpur)
    {
        return $this->select('jenis_ranpur.nama_ranpur, tipe_ranpur.tipe_ranpur')
            ->join('jenis_ranpur', 'ranpur.id_jenis_ranpur = jenis_ranpur.id')
            ->join('tipe_ranpur', 'ranpur.id_tipe_ranpur = tipe_ranpur.id')
            ->where('jenis_ranpur.nama_ranpur', $namaTipeRanpur)
            ->groupBy('jenis_ranpur.nama_ranpur, tipe_ranpur.tipe_ranpur') 
            ->findAll();
    }
    
    public function getByNameWithVersi($namaVersiRanpur)
    {
        return $this->select('versi_ranpur.nama_versi, tipe_ranpur.tipe_ranpur')
            ->join('versi_ranpur', 'ranpur.id_versi_ranpur = versi_ranpur.id')
            ->join('tipe_ranpur', 'ranpur.id_tipe_ranpur = tipe_ranpur.id')
            ->where('tipe_ranpur.tipe_ranpur', $namaVersiRanpur)
            ->groupBy('versi_ranpur.nama_versi, tipe_ranpur.tipe_ranpur') 
            ->findAll();
    }


    public function getSubWilayahByWilayah($namaWilayah)
    {
        return $this->select('ranpur.sub_wilayah, wilayah.nama_wilayah, versi_ranpur.nama_versi')
            ->join('versi_ranpur', 'versi_ranpur.id = ranpur.id_versi_ranpur')
            ->join('wilayah', 'ranpur.id_wilayah = wilayah.id')
            ->where('wilayah.nama_wilayah', $namaWilayah)
            ->findAll();
    }

    public function getDeskripsi($nama_ranpur, $nama_wilayah)
    {
        return $this->select('ranpur.*, wilayah.nama_wilayah')
            ->join('wilayah', 'wilayah.id = ranpur.id_wilayah')
            ->where('ranpur.nama_ranpur', $nama_ranpur)
            ->where('wilayah.nama_wilayah', $nama_wilayah)
            ->findAll();
    }

    public function getRanpurByWilayah($nama_versi)
    {
        return $this->select('versi_ranpur.nama_versi, wilayah.nama_wilayah')
            ->join('wilayah', 'ranpur.id_wilayah = wilayah.id')
            ->join('versi_ranpur', 'ranpur.id_versi_ranpur = versi_ranpur.id')
            ->where('versi_ranpur.nama_versi', $nama_versi)
            ->groupBy('versi_ranpur.nama_versi, wilayah.nama_wilayah') // Tambahkan GROUP BY jika diperlukan
            ->findAll();
    }    
    
}

<?php

namespace App\Controllers;

use App\Models\RanpurModel;
use App\Models\JenisRanpurModel;
use App\Models\TipeRanpurModel;
use App\Models\WilayahModel;
use App\Models\StokDataModel;

class Home extends BaseController
{
    protected $ranpurModel;
    protected $jenisRanpurModel;
    protected $wilayahModel;
    protected $TipeRanpurModel;
    protected $stokDataModel;

    public function __construct()
    {
        $this->ranpurModel = new RanpurModel();
        $this->jenisRanpurModel = new JenisRanpurModel();
        $this->wilayahModel = new WilayahModel();
        $this->TipeRanpurModel = new TipeRanpurModel();
        $this->stokDataModel = new StokDataModel();
    }
    public function index(): string
    {
        return view('dash');
    }

    public function Stok(): string
    {
        return view('stokpusat');
    }

    public function DataRanpur(): string
    {
        return view('dataranpur');
    }
    public function getByName($namaRanpur)
    {
        $ranpurModel = new RanpurModel();

        // Ambil data Ranpur beserta informasi Wilayah
        $dataRanpur = $ranpurModel->getByNameWithWilayah($namaRanpur);

        // Kembalikan data dalam format JSON
        return $this->response->setJSON($dataRanpur);
    }

    public function getByTipe($tipe)
    {
        // Query untuk mengambil data stok berdasarkan tipe
        $stokData = $this->stokDataModel
            ->select('kategori_stok.deskripsi, kategori.nama_kategori, tipe_ranpur.tipe_ranpur')
            ->join('tipe_ranpur', 'tipe_ranpur.id = kategori_stok.id_tipe_ranpur')
            ->join('kategori', 'kategori.id = kategori_stok.id_kategori')
            ->where('tipe_ranpur.tipe_ranpur', $tipe)
            ->findAll();

        // Mengecek apakah data ditemukan
        if (empty($stokData)) {
            return $this->response->setJSON(['message' => 'Data tidak ditemukan']);
        }

        // Mengembalikan data stok dalam format JSON
        return $this->response->setJSON($stokData);
    }


    public function getByWilayah($namaWilayah)
    {
        $ranpurModel = new RanpurModel();

        // Ambil data Ranpur beserta informasi Wilayah
        $dataRanpur = $ranpurModel->getRanpurByWilayah($namaWilayah);

        // Kembalikan data dalam format JSON
        return $this->response->setJSON($dataRanpur);
    }


    public function getDeskripsi()
    {
        $nama_ranpur = $this->request->getGet('nama_ranpur');
        $nama_wilayah = $this->request->getGet('nama_wilayah');

        // Validasi parameter
        if (!$nama_ranpur || !$nama_wilayah) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Parameter tidak lengkap.',
            ]);
        }

        $model = new RanpurModel();
        $data = $model->getDeskripsi($nama_ranpur, $nama_wilayah);

        if (!$data) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Data tidak ditemukan.',
            ]);
        }

        return $this->response->setJSON($data);
    }
}

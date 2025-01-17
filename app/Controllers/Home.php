<?php

namespace App\Controllers;

use App\Models\RanpurModel;
use App\Models\JenisRanpurModel;
use App\Models\TipeRanpurModel;
use App\Models\VersiRanpurModel;
use App\Models\StokDataModel;

class Home extends BaseController
{
    protected $ranpurModel;
    protected $jenisRanpurModel;
    protected $VersiRanpurModel;
    protected $TipeRanpurModel;
    protected $stokDataModel;

    public function __construct()
    {
        $this->ranpurModel = new RanpurModel();
        $this->jenisRanpurModel = new JenisRanpurModel();
        $this->VersiRanpurModel = new VersiRanpurModel();
        $this->TipeRanpurModel = new TipeRanpurModel();
        $this->stokDataModel = new StokDataModel();
    }
    public function index(): string
    {
        return view('dash');
    }
    public function userdash(): string
    {
        return view('user/dash');
    }

    public function Stok(): string
    {
        return view('stokpusat');
    }

    public function DataRanpur(): string
    {
        return view('dataranpur');
    }
    public function getTIpeBykategori($typeranpur)
    {
        $ranpurModel = new RanpurModel();

        // Ambil data Ranpur beserta informasi Wilayah
        $dataRanpur = $ranpurModel->getTIpeBykategori($typeranpur);

        // Kembalikan data dalam format JSON
        return $this->response->setJSON($dataRanpur);
    }
    public function getByNameWithVersi($versiranpur)
    {
        $ranpurModel = new RanpurModel();

        // Ambil data Ranpur beserta informasi Wilayah
        $dataRanpur = $ranpurModel->getByNameWithVersi($versiranpur);

        // Kembalikan data dalam format JSON
        return $this->response->setJSON($dataRanpur);
    }
    public function getByName($namaRanpur)
    {
        $ranpurModel = new RanpurModel();

        // Ambil data Ranpur beserta informasi Wilayah
        $dataRanpur = $ranpurModel->getByNameWithWilayah($namaRanpur);

        // Kembalikan data dalam format JSON
        return $this->response->setJSON($dataRanpur);
    }

    public function getByTipeAll($tipe)
    {
        // Query untuk mengambil data stok berdasarkan tipe
        $stokData = $this->stokDataModel
            ->select('kategori_stok.deskripsi, kategori.nama_kategori, versi_ranpur.nama_versi, kategori_stok.sub_wilayah')
            ->join('versi_ranpur', 'versi_ranpur.id = kategori_stok.id_versi_ranpur')
            ->join('kategori', 'kategori.id = kategori_stok.id_kategori')
            ->where('versi_ranpur.nama_versi', $tipe)
            ->findAll();

        // Mengecek apakah data ditemukan
        if (empty($stokData)) {
            return $this->response->setJSON(['message' => 'Data tidak ditemukan']);
        }

        // Mengembalikan data stok dalam format JSON
        return $this->response->setJSON($stokData);
    }

    public function getByTipe($tipe, $sub_wilayah)
    {
        // Query untuk mengambil data stok berdasarkan tipe
        $stokData = $this->stokDataModel
            ->select('kategori_stok.deskripsi, kategori.nama_kategori, versi_ranpur.nama_versi, kategori_stok.sub_wilayah')
            ->join('versi_ranpur', 'versi_ranpur.id = kategori_stok.id_versi_ranpur')
            ->join('kategori', 'kategori.id = kategori_stok.id_kategori')
            ->where('versi_ranpur.nama_versi', $tipe)
            ->where('kategori_stok.sub_wilayah', $sub_wilayah)
            ->findAll();

        // Mengecek apakah data ditemukan
        if (empty($stokData)) {
            return $this->response->setJSON(['message' => 'Data tidak ditemukan']);
        }

        // Mengembalikan data stok dalam format JSON
        return $this->response->setJSON($stokData);
    }
    public function ambilsemua($tipe)
    {
        $stokData = $this->stokDataModel->ambilsemua($tipe);
        return $this->response->setJSON($stokData);
    }
    public function ambilpersubwilayah($sub_wilayah)
    {
        $stokData = $this->stokDataModel->ambilpersubwilayah($sub_wilayah);
        return $this->response->setJSON($stokData);
    }


    public function getByWilayah($nama_versi)
    {
        $ranpurModel = new RanpurModel();

        // Ambil data Ranpur beserta informasi Wilayah
        $dataRanpur = $ranpurModel->getRanpurByWilayah($nama_versi);

        // Kembalikan data dalam format JSON
        return $this->response->setJSON($dataRanpur);
    }

    public function getSubWilayahByWilayah($nama_wilayah)
    {
        $ranpurModel = new RanpurModel();

        // Ambil data Ranpur berdasarkan wilayah
        $dataRanpur = $ranpurModel->getSubWilayahByWilayah($nama_wilayah);

        // Cek jika data kosong
        if (empty($dataRanpur)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Data tidak ditemukan untuk wilayah tersebut'
            ]);
        }

        // Kembalikan data dalam format JSON
        return $this->response->setJSON($dataRanpur);
    }

    public function getByWilayahSubWilayah($wilayah)
    {
        try {
            // Ambil data stok berdasarkan wilayah dan sub wilayah
            $stokData = $this->stokDataModel->getByWilayahSubWilayah($wilayah);

            // Cek jika data kosong
            if (empty($stokData)) {
                return $this->response->setJSON([
                    'message' => 'Data tidak ditemukan'
                ]);
            }

            // Kembalikan data dalam format JSON
            return $this->response->setJSON($stokData);

        } catch (\Exception $e) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat mengambil data: ' . $e->getMessage()
            ]);
        }
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

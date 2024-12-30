<?php

namespace App\Controllers;

use App\Models\RanpurModel;
use App\Models\JenisRanpurModel;
use App\Models\TipeRanpurModel;
use App\Models\WilayahModel;

class Home extends BaseController
{
    protected $ranpurModel;
    protected $jenisRanpurModel;
    protected $wilayahModel;
    protected $TipeRanpurModel;

    public function __construct()
    {
        $this->ranpurModel = new RanpurModel();
        $this->jenisRanpurModel = new JenisRanpurModel();
        $this->wilayahModel = new WilayahModel();
        $this->TipeRanpurModel = new TipeRanpurModel();
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

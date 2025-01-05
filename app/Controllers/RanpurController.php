<?php

namespace App\Controllers;

use App\Models\RanpurModel;
use App\Models\JenisRanpurModel;
use App\Models\TipeRanpurModel;
use App\Models\VersiRanpurModel;

class RanpurController extends BaseController
{
    protected $ranpurModel;
    protected $jenisRanpurModel;
    protected $TipeRanpurModel;
    protected $versiRanpurModel;

    public function __construct()
    {
        $this->ranpurModel = new RanpurModel();
        $this->jenisRanpurModel = new JenisRanpurModel();
        $this->TipeRanpurModel = new TipeRanpurModel();
        $this->versiRanpurModel = new VersiRanpurModel();
    }

    public function index()
    {
        $data = [
            'jenis_ranpur' => $this->jenisRanpurModel->findAll(),
            'tipe_ranpur' => $this->TipeRanpurModel->findAll(),
            'versi_ranpur' => $this->versiRanpurModel->findAll(),
        ];

        return view('dataranpur', $data);
    }

    public function simpanDataRanpur()
    {
        // Ambil data dari form
        $jenisRanpur = $this->request->getPost('jenis_ranpur');
        $tipeRanpur = $this->request->getPost('tipe_ranpur');
        $versiRanpur = $this->request->getPost('versi_ranpur');

        // Cek jika salah satu data kosong
        if (empty($jenisRanpur) || empty($tipeRanpur) || empty($versiRanpur)) {
            return redirect()->back()->with('error', 'Semua field harus diisi.');
        }

        // Cek atau simpan jenis ranpur
        if ($jenisRanpur) {
            $existingJenisRanpur = $this->jenisRanpurModel->where('nama_ranpur', $jenisRanpur)->first();
            $idJenisRanpur = $existingJenisRanpur ? $existingJenisRanpur['id'] : $this->jenisRanpurModel->insert(['nama_ranpur' => $jenisRanpur]);
        }

        // Cek atau simpan tipe ranpur
        if ($tipeRanpur) {
            $existingTipeRanpur = $this->TipeRanpurModel->where('tipe_ranpur', $tipeRanpur)->first();
            $idTipeRanpur = $existingTipeRanpur ? $existingTipeRanpur['id'] : $this->TipeRanpurModel->insert(['tipe_ranpur' => $tipeRanpur]);
        }


        if ($versiRanpur) {
            $existingVersi = $this->versiRanpurModel->where('nama_versi', $versiRanpur)->first();
            $idWilayah = $existingVersi ? $existingVersi['id'] : $this->versiRanpurModel->insert(['nama_versi' => $versiRanpur]);
        }

        // Data ranpur
        $data = [
            'id_jenis_ranpur' => $idJenisRanpur,
            'id_tipe_ranpur' => $idTipeRanpur,
            'id_versi_ranpur' => $idWilayah,
        ];

        $existingRanpur = $this->ranpurModel
            ->where('id_versi_ranpur', $data['id_versi_ranpur'])
            ->where('id_tipe_ranpur', $data['id_tipe_ranpur'])
            ->first();

        if ($existingRanpur) {
            // Jika sudah ada, lakukan update
            $this->ranpurModel->update($existingRanpur['id'], $data);
            $message = 'Data Ranpur berhasil diperbarui.';
        } else {
            // Jika belum ada, simpan data baru
            $this->ranpurModel->insert($data);
            $message = 'Data Ranpur berhasil disimpan.';
        }

        // Redirect dengan pesan sukses
        return redirect()->to('admin/ranpur')->with('success', $message);
    }
}

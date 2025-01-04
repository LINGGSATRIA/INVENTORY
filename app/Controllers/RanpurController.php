<?php

namespace App\Controllers;

use App\Models\RanpurModel;
use App\Models\JenisRanpurModel;
use App\Models\TipeRanpurModel;
use App\Models\WilayahModel;

class RanpurController extends BaseController
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

    public function index()
    {
        $data = [
            'jenis_ranpur' => $this->jenisRanpurModel->findAll(),
            'tipe_ranpur' => $this->TipeRanpurModel->findAll(),
            'wilayah' => $this->wilayahModel->findAll(),
        ];

        return view('dataranpur', $data);
    }

    public function simpanDataRanpur()
    {
        // Ambil data dari form
        $jenisRanpur = $this->request->getPost('jenis_ranpur');
        $tipeRanpur = $this->request->getPost('tipe_ranpur');
        $wilayah = $this->request->getPost('wilayah');

        // Cek jika salah satu data kosong
        if (empty($jenisRanpur) || empty($tipeRanpur) || empty($wilayah)) {
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

        // Cek atau simpan wilayah
        if ($wilayah) {
            $existingWilayah = $this->wilayahModel->where('nama_wilayah', $wilayah)->first();
            $idWilayah = $existingWilayah ? $existingWilayah['id'] : $this->wilayahModel->insert(['nama_wilayah' => $wilayah]);
        }

        // Data ranpur
        $data = [
            'id_jenis_ranpur' => $idJenisRanpur,
            'id_tipe_ranpur' => $idTipeRanpur,
            'id_wilayah' => $idWilayah,
            'nama_ranpur' => $this->request->getPost('nama_ranpur'),
            'deskripsi' => $this->request->getPost('editor_content'),
        ];

        // Cek jika nama_ranpur sudah ada di wilayah yang sama
        $existingRanpur = $this->ranpurModel
            ->where('nama_ranpur', $data['nama_ranpur'])
            ->where('id_wilayah', $data['id_wilayah'])
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

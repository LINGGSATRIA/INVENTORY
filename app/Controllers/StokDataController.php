<?php

namespace App\Controllers;

use App\Models\StokDataModel;
use App\Models\KategoriModel;
use App\Models\TipeRanpurModel;

class StokDataController extends BaseController
{
    protected $stokDataModel;
    protected $kategoriModel;
    protected $tipeRanpurModel;

    public function __construct()
    {
        $this->stokDataModel = new StokDataModel();
        $this->kategoriModel = new KategoriModel();
        $this->tipeRanpurModel = new TipeRanpurModel();
    }

    public function index()
    {
        $data = [
            'tipe_ranpur' => $this->tipeRanpurModel->findAll(),
            'nama_kategori' => $this->kategoriModel->findAll(),
            'stok_data' => $this->stokDataModel->findAll()
        ];

        return view('stokpusat', $data);
    }

    public function simpanDataStok()
    {
        // Validasi input
        if (!$this->validate([
            'tipe_ranpur' => 'required',
            'nama_kategori' => 'required',
            'editor_content' => 'required',
        ])) {
            return redirect()->back()->withInput()->with('error', 'Semua data wajib diisi.');
        }

        // Ambil input
        $tipeRanpur = $this->request->getPost('tipe_ranpur');
        $namaKategori = $this->request->getPost('nama_kategori');
        $deskripsi = $this->request->getPost('editor_content');

        // Dapatkan atau buat ID kategori
        $idKategori = $this->kategoriModel->getOrCreate($namaKategori);

        // Dapatkan atau buat ID tipe ranpur
        $existingTipeRanpur = $this->tipeRanpurModel->where('tipe_ranpur', $tipeRanpur)->first();
        $idTipeRanpur = $existingTipeRanpur
            ? $existingTipeRanpur['id']
            : $this->tipeRanpurModel->insert(['tipe_ranpur' => $tipeRanpur], true);

        // Persiapkan data stok
        $data = [
            'id_tipe_ranpur' => $idTipeRanpur,
            'id_kategori' => $idKategori,
            'deskripsi' => $deskripsi,
        ];

        // Periksa apakah data stok sudah ada
        $existingStok = $this->stokDataModel
            ->where('id_tipe_ranpur', $data['id_tipe_ranpur'])
            ->where('id_kategori', $data['id_kategori'])
            ->first();

        if ($existingStok) {
            // Jika sudah ada, lakukan update
            $this->stokDataModel->update($existingStok['id'], $data);
            $message = 'Data stok berhasil diperbarui.';
        } else {
            // Jika belum ada, simpan data baru
            $this->stokDataModel->insert($data);
            $message = 'Data stok berhasil disimpan.';
        }

        // Redirect dengan pesan sukses
        return redirect()->to('/stokpusat')->with('success', $message);
    }
}

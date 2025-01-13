<?php

namespace App\Controllers;

use App\Models\StokDataModel;
use App\Models\KategoriModel;
use App\Models\VersiRanpurModel;

class StokDataController extends BaseController
{
    protected $stokDataModel;
    protected $kategoriModel;
    protected $versiRanpurModel;

    public function __construct()
    {
        $this->versiRanpurModel = new VersiRanpurModel();
        $this->stokDataModel = new StokDataModel();
        $this->kategoriModel = new KategoriModel();
        
    }

    public function index()
    {
        $data = [
            'versiRanpur' => $this->versiRanpurModel->findAll(),
            'nama_kategori' => $this->kategoriModel->findAll(),
            'stok_data' => $this->stokDataModel->findAll()
        ];

        return view('stokpusat', $data);
    }

    public function simpanDataStok()
    {
        // Validasi input
        if (!$this->validate([
            'nama_versi' => 'required',
            'nama_kategori' => 'required',
            'editor_content' => 'required',
        ])) {
            return redirect()->back()->withInput()->with('error', 'Semua data wajib diisi.');
        }
        // Ambil input
        $versiRanpur = $this->request->getPost('nama_versi');
        $namaKategori = $this->request->getPost('nama_kategori');
        $deskripsi = $this->request->getPost('editor_content');

        // Dapatkan atau buat ID kategori
        $idKategori = $this->kategoriModel->getOrCreate($namaKategori);

        // Dapatkan atau buat ID versi ranpur
        $existingVersiRanpur = $this->versiRanpurModel->where('nama_versi', $versiRanpur)->first();
        $idVersiRanpur = $existingVersiRanpur
            ? $existingVersiRanpur['id']
            : $this->versiRanpurModel->insert(['nama_versi' => $versiRanpur], true);

        // Persiapkan data stok
        $data = [
            'id_versi_ranpur' => $idVersiRanpur,
            'id_kategori' => $idKategori,
            'Deskripsi' => $deskripsi,
        ];

        // Periksa apakah data stok sudah ada
        $existingStok = $this->stokDataModel
            ->where('id_versi_ranpur', $data['id_versi_ranpur'])
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
        return redirect()->to('admin/stokpusat')->with('success', $message);
    }

    public function getDeskripsi()
    {
        // Mengambil data JSON dari request
        $data = $this->request->getJSON();

        // Pastikan bahwa data yang diterima adalah array dan memiliki nama_versi dan nama_kategori
        $nama_versi = isset($data->nama_versi) ? $data->nama_versi : null;
        $nama_kategori = isset($data->nama_kategori) ? $data->nama_kategori : null;

        // Log data untuk debugging
        log_message('debug', 'nama_versi: ' . var_export($nama_versi, true));
        log_message('debug', 'nama_kategori: ' . var_export($nama_kategori, true));

        // Cek apakah data ada
        if ($nama_versi && $nama_kategori) {
            // Ambil data deskripsi dengan join
            $deskripsi = $this->stokDataModel->getDeskripsiWithJoin($nama_versi, $nama_kategori);

            if ($deskripsi) {
                return $this->response->setJSON(['success' => true, 'deskripsi' => $deskripsi['Deskripsi']]);
            } else {
                return $this->response->setJSON(['success' => false, 'message' => 'Deskripsi tidak ditemukan.']);
            }
        } else {
            // Jika data tidak ada
            return $this->response->setJSON(['success' => false, 'message' => 'Data tidak valid.']);
        }
    }
}

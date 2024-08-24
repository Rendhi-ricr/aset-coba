<?php

namespace App\Controllers\Panel;

use App\Controllers\BaseController;
use App\Models\AsetModel;
use App\Models\GedungModel;
use App\Models\RuanganModel;


class Aset extends BaseController
{
    protected $asetModel, $gedungModel, $ruanganModel;
    public function __construct()
    {
        $this->asetModel = new AsetModel();
        $this->gedungModel = new GedungModel();
        $this->ruanganModel = new RuanganModel();
    }

    public function index()
    {
        $data['aset'] = $this->asetModel->getAll();
        return view("admin/aset/index", $data);
    }



    public function tambah()
    {
        $data = [
            'gedung' => $this->gedungModel->findAll(),
            'ruangan' => $this->ruanganModel->findAll()
        ];

        if ($this->request->getMethod() === 'post') {
            $asetModel = new AsetModel();
            $id_gedung = $this->request->getPost('id_gedung');
            $id_ruangan = $this->request->getPost('id_ruangan');

            // Ambil data ruangan berdasarkan id_ruangan
            $ruangan = $this->ruanganModel->find($id_ruangan);
            $kode_ruangan = $ruangan['kode_ruangan'] ?? ''; // Ambil kode_ruangan

            // Generate kode aset menggunakan kode_ruangan
            $kode_aset = $this->generateKodeAset($kode_ruangan);

            $storeData = [
                'kode_aset'   => $kode_aset,
                'id_gedung'   => $id_gedung,
                'id_ruangan'  => $id_ruangan,
                'nama_aset'   => $this->request->getPost('nama_aset'),
                'volume'      => $this->request->getPost('volume'),
                'nilai_aset'  => $this->request->getPost('nilai_aset'),
            ];

            $asetModel->insert($storeData);

            // Flash message
            session()->setFlashdata('message', 'Aset berhasil disimpan');
            return redirect()->to('/panel/aset');
        }

        return view('admin/aset/tambah', $data);
    }


    private function generateKodeAset($kode_ruangan)
    {
        $asetModel = new AsetModel();

        // Cari jumlah aset yang sudah ada di ruangan yang sama berdasarkan kode_ruangan
        $count = $asetModel->where('kode_aset LIKE', $kode_ruangan . '%')
            ->countAllResults();

        // Increment count untuk membuat urutan, mulai dari 1
        // Misalkan ada 5 aset di ruangan tersebut, urutan berikutnya adalah 6
        $urutan = str_pad($count + 1, 3, '0', STR_PAD_LEFT);

        // Gabungkan kode ruangan dan urutan untuk menghasilkan kode aset
        $kode_aset = $kode_ruangan . '-' . $urutan;

        return $kode_aset;
    }






    // public function edit($kode_gedung)
    // {
    //     // Mencari item berdasarkan ID yang diberikan
    //     $data = [
    //         'gedung' => $this->gedungModel->data_gedung($kode_gedung),

    //     ];

    //     // Memeriksa apakah form telah di-submit dengan metode POST
    //     if ($this->request->getMethod() === 'post') {


    //         // Mengumpulkan data yang akan diperbarui
    //         $updateData = [
    //             'nama_gedung'   => $this->request->getPost('nama_gedung'),
    //             'keterangan'  => $this->request->getPost('keterangan'),
    //         ];

    //         // Memperbarui data item di database
    //         $this->gedungModel->update($kode_gedung, $updateData);

    //         // Menampilkan pesan sukses
    //         session()->setFlashdata('message', 'Item berhasil diperbarui');
    //         return redirect()->to('/panel/gedung');
    //     }

    //     // Menampilkan view dengan data item dan kategori
    //     return view('admin/gedung/edit', $data);
    // }
}

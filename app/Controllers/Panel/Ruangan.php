<?php

namespace App\Controllers\Panel;

use App\Controllers\BaseController;
use App\Models\RuanganModel;
use App\Models\GedungModel;


class Ruangan extends BaseController
{
    protected $ruanganModel, $gedungModel;
    public function __construct()
    {
        $this->ruanganModel = new RuanganModel();
        $this->gedungModel = new GedungModel();
    }

    public function index()
    {
        $data['ruangan'] = $this->ruanganModel->getAll();
        return view("admin/ruangan/index", $data);
    }

    public function tambah()
    {
        $data['gedung'] = $this->gedungModel->findAll();
        if ($this->request->getMethod() === 'post') {
            $ruanganModel = new RuanganModel();

            // Ambil input dari request
            $nama_ruangan = $this->request->getPost('nama_ruangan');
            $id_gedung = $this->request->getPost('id_gedung');

            // Ambil kode_gedung berdasarkan id_gedung
            $gedung = $this->gedungModel->find($id_gedung);
            $kode_gedung = $gedung['kode_gedung'] ?? ''; // Pastikan kode_gedung ada

            // Fungsi untuk membuat kode ruangan
            $kode_ruangan = $this->generateKodeRuangan($kode_gedung, $nama_ruangan);

            $storeData = [
                'nama_ruangan'   => $nama_ruangan,
                'kode_ruangan'   => $kode_ruangan,
                'id_gedung'      => $id_gedung,
                'date'           => $this->request->getPost('date'),
            ];
            $ruanganModel->insert($storeData);

            // Flash message
            session()->setFlashdata('message', 'Ruangan berhasil disimpan');
            return redirect()->to('/panel/ruangan');
        }
        return view('admin/ruangan/tambah', $data);
    }


    private function generateKodeRuangan($kode_gedung, $nama_ruangan)
    {
        // Split nama_ruangan into words
        $words = explode(' ', $nama_ruangan);

        // Take the first letter of each word and make them uppercase
        $kode_ruangan_part = '';
        foreach ($words as $word) {
            $kode_ruangan_part .= strtoupper(substr($word, 0, 1));
        }

        // Combine kode_gedung and kode_ruangan_part
        $kode_ruangan = $kode_gedung . '-' . $kode_ruangan_part;

        return $kode_ruangan;
    }





    // public function tambah()
    // {
    //     $data ['gedung'] = $this->gedungModel->findAll();
    //     if ($this->request->getMethod() === 'post') {
    //         $ruanganModel = new RuanganModel();

    //         // Ambil nama gedung dari request
    //         $nama_ruangan = $this->request->getPost('nama_ruangan');

    //         // Fungsi untuk membuat kode gedung dari nama_gedung
    //         $kode_ruangan = $this->generateKodeRuangan($nama_ruangan);
    //         $id_gedung = $this->request->getVar('id_gedung');
    //         $storeData = [
    //             'nama_ruangan'   => $nama_ruangan,
    //             'kode_ruangan'   => $kode_ruangan,
    //             'id_gedung'   => $id_gedung,
    //             'date'          => $this->request->getPost('date'),
    //         ];
    //         $ruanganModel->insert($storeData);

    //         // Flash message
    //         session()->setFlashdata('message', 'Faq berhasil disimpan');
    //         return redirect()->to('/panel/ruangan');
    //     }
    //     return view('admin/ruangan/tambah', $data);
    // }

    // private function generateKodeRuangan($nama_ruangan)
    // {
    //     // Split nama_gedung into words
    //     $words = explode(' ', $nama_ruangan);

    //     // Take the first letter of each word and make them uppercase
    //     $kode_ruangan = '';
    //     foreach ($words as $word) {
    //         $kode_ruangan .= strtoupper(substr($word, 0, 1));
    //     }

    //     return $kode_ruangan;
    // }



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

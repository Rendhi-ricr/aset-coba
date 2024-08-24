<?php

namespace App\Controllers\Panel;

use App\Controllers\BaseController;
use App\Models\GedungModel;


class Gedung extends BaseController
{
    protected $gedungModel;
    public function __construct()
    {
        $this->gedungModel = new GedungModel();
    }

    public function index()
    {
        $data['gedung'] = $this->gedungModel->findAll();
        return view("admin/gedung/index", $data);
    }



    public function tambah()
    {
        $data = [];
        if ($this->request->getMethod() === 'post') {
            $gedungModel = new GedungModel();
            
            // Ambil nama gedung dari request
            $nama_gedung = $this->request->getPost('nama_gedung');
            
            // Fungsi untuk membuat kode gedung dari nama_gedung
            $kode_gedung = $this->generateKodeGedung($nama_gedung);
            
            $storeData = [
                'nama_gedung'   => $nama_gedung,
                'kode_gedung'   => $kode_gedung,
                'date'          => $this->request->getPost('date'),
            ];
            $gedungModel->insert($storeData);
    
            // Flash message
            session()->setFlashdata('message', 'Faq berhasil disimpan');
            return redirect()->to('/panel/gedung');
        }
        return view('admin/gedung/tambah', $data);
    }
    
    private function generateKodeGedung($nama_gedung)
    {
        // Split nama_gedung into words
        $words = explode(' ', $nama_gedung);
        
        // Take the first letter of each word and make them uppercase
        $kode_gedung = '';
        foreach ($words as $word) {
            $kode_gedung .= strtoupper(substr($word, 0, 1));
        }
        
        return $kode_gedung;
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

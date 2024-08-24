<?php

namespace App\Controllers\Panel;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\KategoriModel;


class Barang extends BaseController
{
    protected $barangModel, $kategoriModel;
    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $data['barang'] = $this->barangModel->getAll();
        return view("admin/barang/index", $data);
    }



    public function tambah()
    {
        $data = ['kategori' => $this->kategoriModel->findAll()];
        if ($this->request->getMethod() === 'post') {

            $barangModel = new BarangModel();
            $id_kategori = $this->request->getVar('id_kategori');
            $storeData = [
                'id_kategori'   => $id_kategori,
                'nama_barang'   => $this->request->getPost('nama_barang'),
                'merk'   => $this->request->getPost('merk'),
                'tahun_perolehan'   => $this->request->getPost('tahun_perolehan'),

            ];
            $barangModel->insert($storeData);

            //flash message
            session()->setFlashdata('message', 'Faq berhasil disimpan');
            return redirect()->to('/panel/barang');
        }
        return view('admin/barang/tambah', $data);
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

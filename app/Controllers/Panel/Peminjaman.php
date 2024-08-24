<?php

namespace App\Controllers\Panel;

use App\Controllers\BaseController;
use App\Models\PeminjamanModel;
use App\Models\AsetModel;


class Peminjaman extends BaseController
{
    protected $peminjamanModel, $asetModel;
    public function __construct()
    {
        $this->peminjamanModel = new PeminjamanModel();
        $this->asetModel = new AsetModel();
    }

    public function index()
    {
        $data['peminjaman'] = $this->peminjamanModel->getAll();
        if ($this->request->getGet('edit_status')) {
            $id = $this->request->getGet('edit_status');
            $data['peminjaman_modal'] = $this->peminjamanModel->find($id);
        }
        return view("admin/peminjaman/index", $data);
    }



    public function tambah()
    {
        $data['aset'] = $this->asetModel->findAll();
        if ($this->request->getMethod() === 'post') {

            $peminjamanModel = new PeminjamanModel();
            $id_aset = $this->request->getPost('id_aset');
            $storeData = [
                'id_aset'   => $id_aset,
                'nama_peminjam'   => $this->request->getPost('nama_peminjam'),
                'no_hp'   => $this->request->getPost('no_hp'),
                'fakultas'   => $this->request->getPost('fakultas'),
                'jumlah_barang'   => $this->request->getPost('jumlah_barang'),
                'tanggal_meminjam'   => $this->request->getPost('tanggal_meminjam'),
                'tanggal_kembali'   => $this->request->getPost('tanggal_kembali'),

            ];
            $peminjamanModel->insert($storeData);

            //flash message
            session()->setFlashdata('message', 'Faq berhasil disimpan');
            return redirect()->to('/panel/peminjaman');
        }
        return view('admin/peminjaman/tambah', $data);
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

    public function ubah($id_peminjaman)
    {
        $peminjamanModel = new PeminjamanModel();

        if ($this->request->getMethod() === 'post') {
            $status = $this->request->getPost('status');
            $tanggal_dikembalikan = $status == 'Dikembalikan' ? date('Y-m-d') : null;

            $storeData = [
                'status' => $status,
                'tanggal_dikembalikan' => $tanggal_dikembalikan
            ];

            $peminjamanModel->update($id_peminjaman, $storeData);

            session()->setFlashdata('message', 'Status peminjaman berhasil diperbarui');
            return redirect()->to('/panel/peminjaman');
        }

        $data['peminjaman'] = $peminjamanModel->find($id_peminjaman);
        return view('admin/peminjaman/edit_status', $data);
    }
}

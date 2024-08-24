<?php

namespace App\Controllers\Panel;

use App\Controllers\BaseController;
use App\Models\PengaduanModel;
use App\Models\AsetModel;
use App\Models\UserModel;


class Pengaduan extends BaseController
{
    protected $pengaduanModel, $asetModel, $userModel;
    public function __construct()
    {
        $this->pengaduanModel = new PengaduanModel();
        $this->asetModel = new AsetModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data['pengaduan'] = $this->pengaduanModel->getAll();
        if ($this->request->getGet('edit_status')) {
            $id = $this->request->getGet('edit_status');
            $data['pengaduan_modal'] = $this->pengaduanModel->find($id);
        }
        return view("admin/pengaduan/index", $data);
    }



    public function tambah()
    {
        $data['aset'] = $this->asetModel->findAll();
        $userId = session()->get('id_user'); // Ambil ID user yang sedang login
        $userData = $this->userModel->find($userId); // Ambil data user dari database
        $data['nama_pengadu'] = $userData['nama_lengkap']; // Set nama_peminjam dari data user
        $data['no_hp'] = $userData['no_hp']; // Set no_hp dari data user

        if ($this->request->getMethod() === 'post') {

            $pengaduanModel = new PengaduanModel();
            $id_aset = $this->request->getPost('id_aset');
            $storeData = [
                'id_user'   => $userId,
                'id_aset'   => $id_aset,
                'keluhan'   => $this->request->getPost('keluhan'),

            ];
            $pengaduanModel->insert($storeData);

            //flash message
            session()->setFlashdata('message', 'Faq berhasil disimpan');
            return redirect()->to('/panel/pengaduan');
        }
        return view('admin/pengaduan/tambah', $data);
    }

    // // public function edit($kode_gedung)
    // // {
    // //     // Mencari item berdasarkan ID yang diberikan
    // //     $data = [
    // //         'gedung' => $this->gedungModel->data_gedung($kode_gedung),

    // //     ];

    // //     // Memeriksa apakah form telah di-submit dengan metode POST
    // //     if ($this->request->getMethod() === 'post') {


    // //         // Mengumpulkan data yang akan diperbarui
    // //         $updateData = [
    // //             'nama_gedung'   => $this->request->getPost('nama_gedung'),
    // //             'keterangan'  => $this->request->getPost('keterangan'),
    // //         ];

    // //         // Memperbarui data item di database
    // //         $this->gedungModel->update($kode_gedung, $updateData);

    // //         // Menampilkan pesan sukses
    // //         session()->setFlashdata('message', 'Item berhasil diperbarui');
    // //         return redirect()->to('/panel/gedung');
    // //     }

    // //     // Menampilkan view dengan data item dan kategori
    // //     return view('admin/gedung/edit', $data);
    // // }

    public function ubah($id_pengaduan)
    {
        $pengaduanModel = new PengaduanModel();

        if ($this->request->getMethod() === 'post') {
            $status = $this->request->getPost('status');

            $storeData = [
                'status' => $status,
            ];

            $pengaduanModel->update($id_pengaduan, $storeData);

            session()->setFlashdata('message', 'Status peminjaman berhasil diperbarui');
            return redirect()->to('/panel/pengaduan');
        }

        $data['pengaduan'] = $pengaduanModel->find($id_pengaduan);
        return view('admin/pengaduan/edit_status', $data);
    }
}

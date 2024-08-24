<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\PeminjamanModel;
use App\Models\AsetModel;
use App\Models\UserModel;


class Peminjaman extends BaseController
{
    protected $peminjamanModel, $asetModel, $userModel;
    public function __construct()
    {
        $this->peminjamanModel = new PeminjamanModel();
        $this->asetModel = new AsetModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        // Mendapatkan ID user yang sedang login
        $userId = session()->get('id_user');
        // var_dump($userId);
        // die();
        // Mengambil data peminjaman sesuai user yang login
        // $data['peminjaman'] = $this->peminjamanModel->where('id_user', $userId)->getAll();
        $data['peminjaman'] = $this->peminjamanModel
            ->join('t_aset', 't_aset.id_aset = t_peminjaman.id_aset')
            ->where('id_user', $userId)->findAll();


        return view("user/peminjaman", $data);
    }
    public function print()
    {
        $userId = session()->get('id_user');
        $data['peminjaman'] = $this->peminjamanModel
            ->join('t_aset', 't_aset.id_aset = t_peminjaman.id_aset')
            ->where('id_user', $userId)
            ->findAll();

        // Mengirim data ke view yang akan ditampilkan untuk dicetak
        return view("user/print", $data);
    }




    // public function tambah()
    // {
    //     $data['aset'] = $this->asetModel->findAll();
    //     if ($this->request->getMethod() === 'post') {

    //         $peminjamanModel = new PeminjamanModel();
    //         $id_aset = $this->request->getPost('id_aset');
    //         $storeData = [
    //             'id_aset'   => $id_aset,
    //             'nama_peminjam'   => $this->request->getPost('nama_peminjam'),
    //             'no_hp'   => $this->request->getPost('no_hp'),
    //             'fakultas'   => $this->request->getPost('fakultas'),
    //             'jumlah_barang'   => $this->request->getPost('jumlah_barang'),
    //             'tanggal_meminjam'   => $this->request->getPost('tanggal_meminjam'),
    //             'tanggal_kembali'   => $this->request->getPost('tanggal_kembali'),

    //         ];
    //         $peminjamanModel->insert($storeData);

    //         //flash message
    //         session()->setFlashdata('message', 'Faq berhasil disimpan');
    //         return redirect()->to('/panel/peminjaman');
    //     }
    //     return view('admin/peminjaman/tambah', $data);
    // }
    public function tambah()
    {
        $userId = session()->get('id_user'); // Ambil ID user yang sedang login
        $userData = $this->userModel->find($userId); // Ambil data user dari database

        $data['aset'] = $this->asetModel->findAll();
        $data['nama_peminjam'] = $userData['nama_lengkap']; // Set nama_peminjam dari data user
        $data['fakultas'] = $userData['fakultas']; // Set fakultas dari data user
        $data['no_hp'] = $userData['no_hp']; // Set no_hp dari data user
        if ($this->request->getMethod() === 'post') {

            $peminjamanModel = new PeminjamanModel();
            $id_aset = $this->request->getPost('id_aset');
            $storeData = [
                'id_aset'   => $id_aset,
                'id_user'   => $userId, // Menyimpan user_id
                'nama_peminjam'   => $userData['nama_lengkap'], // Simpan nama peminjam dari data user
                'no_hp'   => $userData['no_hp'], // Simpan no_hp dari data user
                'fakultas'   => $userData['fakultas'], // Simpan fakultas dari data user
                'jumlah_barang'   => $this->request->getPost('jumlah_barang'),
                'tanggal_meminjam'   => $this->request->getPost('tanggal_meminjam'),
                'tanggal_kembali'   => $this->request->getPost('tanggal_kembali'),
            ];
            $peminjamanModel->insert($storeData);

            session()->setFlashdata('message', 'Peminjaman berhasil disimpan');
            return redirect()->to('/user/peminjaman');
        }
        return view('user/tambah', $data);
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

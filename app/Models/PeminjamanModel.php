<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanModel extends Model
{
    protected $table = 't_peminjaman';
    protected $primaryKey = 'id_peminjaman';
    protected $allowedFields = ['id_aset', 'id_user', 'nama_peminjam', 'no_hp', 'fakultas', 'jumlah_barang', 'tanggal_meminjam', 'tanggal_kembali', 'status', 'tanggal_dikembalikan'];

    // public function generateKodeGedung($klasifikasi)
    // {
    //     // Validasi klasifikasi
    //     $klasifikasi = strtoupper($klasifikasi);
    //     $validKlasifikasi = ['REK', 'SAP', 'SKM', 'SHH', 'SPP', 'SIK', 'SPD', 'GBL', 'MAP']; // Tambahkan klasifikasi lain jika diperlukan

    //     if (!in_array($klasifikasi, $validKlasifikasi)) {
    //         throw new \InvalidArgumentException('Klasifikasi tidak valid');
    //     }

    //     $builder = $this->db->table($this->table);
    //     $builder->select('kode_gedung');
    //     $builder->where('kode_gedung LIKE', $klasifikasi . '%');
    //     $builder->orderBy('kode_gedung', 'DESC');
    //     $query = $builder->get();

    //     $result = $query->getRow();
    //     $lastKode = $result ? $result->kode_gedung : $klasifikasi . '000';

    //     // Ekstrak bagian numerik dari kode terakhir setelah huruf
    //     $numericPart = substr($lastKode, strlen($klasifikasi));
    //     $lastNumber = is_numeric($numericPart) ? (int)$numericPart : 0;

    //     // Pecah bagian numerik menjadi digit
    //     $numberStr = sprintf('%03d', $lastNumber);

    //     // Temukan posisi digit pertama yang tidak nol untuk menambah
    //     $leadingDigit = intval(substr($numberStr, 0, 1));

    //     // Generate nomor berikutnya dengan menambahkan 1 pada digit pertama
    //     $newLeadingDigit = $leadingDigit + 1;
    //     $nextNumberStr = sprintf('%01d%s', $newLeadingDigit, substr($numberStr, 1));

    //     // Generate kode berikutnya dengan awalan klasifikasi
    //     $nextKode = $klasifikasi . $nextNumberStr;

    //     return $nextKode;
    // }



    function getAll()
    {
        $builder = $this->db->table('t_peminjaman');
        $builder->join('t_aset', 't_aset.id_aset = t_peminjaman.id_aset');

        $query = $builder->get();
        return $query->getResult();
    }
    // function getAll($userId)
    // {

    //     $query = $this->join('t_aset', 't_aset.id_aset = t_peminjaman.id_aset')
    //         ->where('id_user', $userId);
    //     return $query->findAll();
    // }

    public function data_peminjaman($id_peminjaman)
    {
        return $this->find($id_peminjaman);
    }
    public function getByUserId($userId)
    {
        return $this->where('id_user', $userId)->findAll();
    }
    // public function update_data($data, $id_buku)
    // {
    //     $query = $this->db->table($this->table)->update(
    //         $data,
    //         array('id_buku' => $id_buku)
    //     );
    //     return $query;
    // }
    // public function delete_data($id_buku)
    // {
    //     $query = $this->db->table($this->table)->delete(array('id_buku' => $id_buku));
    //     return $query;
    // }
}

<?= $this->extend('layouts/base') ?>
<?= $this->section('title') ?>Data Peminjaman<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid p-0">

    <div class="mb-3">
        <div class="row">
            <div class="col-md-6">
                <h1 class="h3 d-inline align-middle">Data Peminjaman</h1>
            </div>
            <div class="col-md-6">
                <div class="text-end">
                    <button id="refreshButton" class="btn btn-secondary me-2" title="Refresh"><i class="ti ti-refresh ti-sm"></i> Refresh Data</button>
                    <a href="<?= site_url('panel/peminjaman/tambah') ?>" class="btn btn-primary"><i class="ti ti-plus ti-sm"></i> Tambah</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">


                    <button id="trash-btn-publish" class="btn btn-danger mb-3"><i class="ti ti-trash ti-sm"></i></button>
                    <div class="table-responsive">
                        <table id="ks-ajax" class="table">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="select-all"></th>
                                    <th>No</th>
                                    <th>Kode Aset</th>
                                    <th>Nama Aset</th>
                                    <th>Nama Peminjam</th>
                                    <th>No HP</th>
                                    <th>Jumlah Barang</th>
                                    <th>Tanggal Meminjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Status</th>
                                    <th>Tanggal Dikembalikan</th>
                                    <th>Aksi</th>
                                </tr>

                                <?php
                                $no = 1;
                                foreach ($peminjaman as $key => $value) : ?>
                                    <tr>
                                        <td> </td>
                                        <td><?= $no++; ?></td>
                                        <td><?= $value->kode_aset ?></td>
                                        <td><?= $value->nama_aset ?></td>
                                        <td><?= $value->nama_peminjam ?></td>
                                        <td><?= $value->no_hp ?></td>
                                        <td><?= $value->jumlah_barang ?></td>
                                        <td><?= $value->tanggal_meminjam ?></td>
                                        <td><?= $value->tanggal_kembali ?></td>
                                        <td><?= $value->status ?></td>
                                        <td><?= $value->tanggal_dikembalikan ?></td>

                                        <td>

                                            <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="<?= site_url('panel/peminjaman?edit_status=' . $value->id_peminjaman) ?>" class="btn btn-warning btn-sm">Edit Status</a>
                                            <a href="#" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Hapus</a>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>

            <!-- Modal Edit Status -->
            <?php if (isset($peminjaman_modal)): ?>
                <div class="modal fade show" tabindex="-1" role="dialog" style="display: block;">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Status Peminjaman</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="/panel/peminjaman/ubah/<?= $peminjaman_modal['id_peminjaman'] ?>" method="post">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="Sedang Dipinjam" <?= $peminjaman_modal['status'] == 'Sedang Dipinjam' ? 'selected' : '' ?>>Sedang Dipinjam</option>
                                            <option value="Dikembalikan" <?= $peminjaman_modal['status'] == 'Dikembalikan' ? 'selected' : '' ?>>Dikembalikan</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Modal -->
            <div class="modal fade" id="konfirmasiHapusData" tabindex="-1" aria-labelledby="konfirmasiHapusDataLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="konfirmasiHapusDataLabel">Hapus Data</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                        </div>
                        <div class="modal-body">
                            <span class="title-delete text-danger"></span>
                            <p>Apakah Data Ini Akan di Hapus ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                            <a class="btn btn-danger btn-ok">Ya, Hapus data</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmModalLabel">Konfirmasi penghapusan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda yakin ingin membuang data yang dipilih?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="button" id="confirm-delete-btn" class="btn btn-danger">Ya, Hapus data</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<?= $this->endSection() ?>
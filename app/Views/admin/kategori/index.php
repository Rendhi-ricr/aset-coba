<?= $this->extend('layouts/base') ?>
<?= $this->section('title') ?>Data Kategori<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid p-0">

    <div class="mb-3">
        <div class="row">
            <div class="col-md-6">
                <h1 class="h3 d-inline align-middle">Data Kategori</h1>
            </div>
            <div class="col-md-6">
                <div class="text-end">
                    <button id="refreshButton" class="btn btn-secondary me-2" title="Refresh"><i class="ti ti-refresh ti-sm"></i> Refresh Data</button>
                    <a href="<?= site_url('panel/kategori/tambah') ?>" class="btn btn-primary"><i class="ti ti-plus ti-sm"></i> Tambah</a>
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
                                    <th>kode Kategori</th>
                                    <th>Nama Kategori</th>
                                    <th>Aksi</th>
                                </tr>

                                <?php
                                $no = 1;
                                foreach ($kategori as $key) : ?>
                                    <tr>
                                        <td> </td>
                                        <td><?= $no++; ?></td>
                                        <td><?= $key['kode_kategori']; ?></td>
                                        <td><?= $key['nama_kategori']; ?></td>
                                        <td>
                                            <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="#" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Hapus</a>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>

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
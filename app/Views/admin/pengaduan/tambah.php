<?= $this->extend('layouts/base') ?>
<?= $this->section('title') ?>Tambah Data Peminjaman<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="mb-3">
        <div class="row">
            <div class="col-md-12">
                <h1 class="h3 d-inline align-middle">Tambah Data Peminjaman</h1>
            </div>
        </div>
    </div>

    <!-- Tambah::Start -->
    <form id="editor-form" action="<?= site_url('panel/pengaduan/tambah') ?>" method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="id_aset">Nama Barang</label>
                                <select class="form-select" id="id_aset" name="id_aset" required>
                                    <option value="">Pilih Barang</option>
                                    <?php foreach ($aset as $a) : ?>
                                        <option value="<?= $a['id_aset']; ?>"><?= $a['nama_aset']; ?> (<?= $a['kode_aset']; ?>)</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="nama_pengadu">Nama Peminjam</label>
                                <input type="text" name="nama_pengadu" value="<?= $nama_pengadu ?>" readonly class="form-control mb-3" />
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="no_hp">Nomor HP</label>
                                <input type="number" name="no_hp" value="<?= $no_hp ?>" readonly class="form-control mb-3" />
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="keluhan">Keluhan</label>
                                <textarea name="keluhan" id="keluhan" class="form-control mb-3"></textarea>
                            </div>

                        </div>
                    </div>


                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>

            </div>
    </form>
    <!--/ Tambah::End -->
</div>
<?= $this->endSection() ?>
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
    <form id="editor-form" action="<?= site_url('panel/peminjaman/tambah') ?>" method="post" enctype="multipart/form-data">
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
                                <label class="form-label" for="nama_peminjam">Nama Peminjam</label>
                                <input type="text" name="nama_peminjam" id="nama_peminjam" class="form-control mb-3" />
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="no_hp">Nomor HP</label>
                                <input type="number" name="no_hp" id="no_hp" class="form-control mb-3" />
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="fakultas">Fakultas</label>
                                <select class="form-select" id="fakultas" name="fakultas" required>
                                    <option value="">Pilih Fakultas</option>
                                    <option value="Fakultas Ilmu Administrasi">Fakultas Ilmu Administrasi</option>
                                    <option value="Fakultas Teknik">Fakultas Teknik</option>
                                    <option value="Fakultas Ilmu Hukum">Fakultas Ilmu Hukum</option>
                                    <option value="Fakultas Ilmu Komputer">Fakultas Ilmu Komputer</option>
                                    <option value="Fakultas Ilmu Komunikasi">Fakultas Ilmu Komunikasi</option>
                                    <option value="Fakultas Pertanian">Fakultas Pertanian</option>
                                    <option value="Fakultas Keguruan dan Ilmu Pendidikan">Fakultas Keguruan dan Ilmu Pendidikan</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="jumlah_barang">Jumlah Barang</label>
                                <input type="number" name="jumlah_barang" id="jumlah_barang" class="form-control mb-3" />
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="tanggal_meminjam">Tanggal Meminjam</label>
                                <input type="date" name="tanggal_meminjam" id="tanggal_meminjam" class="form-control mb-3" />
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="tanggal_kembali">Tanggal Mengembalikan</label>
                                <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control mb-3" />
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
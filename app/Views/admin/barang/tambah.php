<?= $this->extend('layouts/base') ?>
<?= $this->section('title') ?>Tambah Data Barang<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="mb-3">
        <div class="row">
            <div class="col-md-12">
                <h1 class="h3 d-inline align-middle">Tambah Data Barang</h1>
            </div>
        </div>
    </div>

    <!-- Tambah::Start -->
    <form id="editor-form" action="<?= site_url('panel/barang/tambah') ?>" method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="kategori">Kategori</label>
                                <select name="id_kategori" class="form-control mb-3" id="kategori">
                                        <?php foreach ($kategori as $kategori) : ?>
                                            <option value="<?= $kategori['id_kategori']; ?>"><?= $kategori['nama_kategori']; ?></option>
                                        <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="nama_barang">Nama Barang</label>
                                <input type="text" name="nama_barang" id="nama_barang" class="form-control mb-3" />
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="merk">Merk</label>
                                <input type="text" name="merk" id="merk" class="form-control mb-3" />
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="tahun_perolehan">Tahun Perolehan</label>
                                <input type="date" name="tahun_perolehan" id="tahun_perolehan" class="form-control mb-3" />
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
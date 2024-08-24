<?= $this->extend('layouts/base') ?>
<?= $this->section('title') ?>Tambah Data Ruangan<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="mb-3">
        <div class="row">
            <div class="col-md-12">
                <h1 class="h3 d-inline align-middle">Tambah Data Ruangan</h1>
            </div>
        </div>
    </div>

    <!-- Tambah::Start -->
    <form id="editor-form" action="<?= site_url('panel/ruangan/tambah') ?>" method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label" for="nama_ruangan">Nama Ruangan</label>
                                <input type="text" name="nama_ruangan" id="nama_ruangan" class="form-control mb-3" />
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="id_gedung">Nama Gedung</label>
                                <select class="form-select" id="id_gedung" name="id_gedung" required>
                                    <option value="">Pilih Gedung</option>
                                    <?php foreach ($gedung as $g) : ?>
                                        <option value="<?= $g['id_gedung']; ?>"><?= $g['nama_gedung']; ?> (<?= $g['kode_gedung']; ?>)</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label" for="date">Tanggal</label>
                                <input type="date" name="date" id="date" class="form-control mb-3" />
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
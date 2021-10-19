<?= $this->extend('/layouts/template') ?>
<?= $this->section('content') ?>

<body>
    <div class=" registration-form">
        <form action="/Pages/save_edit_kategori" method="POST">
            <div style="text-align: center; color:grey;">
                <h3>Edit Data Kategori</h3>
            </div>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <input type="hidden" name="id_kategori" value="<?= $kategori[0]['id_kategori'] ?>">
                        <div class="form-group">
                            <label class="label">Nama Kategori</label>
                            <input type="text" class="form-control item" name="nama" value="<?= $kategori[0]['nama_kategori'] ?>">
                            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'nama') : '' ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Simpan</button>
                <a href="/kategori" class="btn btn-block create-account">Kembali</a>
            </div>
        </form>
    </div>
    <?= $this->endsection() ?>
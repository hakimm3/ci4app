<?= $this->extend('/layouts/template') ?>
<?= $this->section('content') ?>

<body>
    <div class=" registration-form">
        <form action="/Pages/save_tambah_kategori" method="POST">
            <div style="text-align: center; color:grey;">
                <h3>Tambah Data Kategori</h3>
            </div>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="label">Nama Kategori</label>
                            <input type="text" class="form-control item" name="nama" value="<?= set_value('nama') ?>">
                            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'nama') : '' ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Tambah</button>
            </div>
        </form>
    </div>
    <?= $this->endsection() ?>
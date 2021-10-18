<?= $this->extend('/layouts/template') ?>
<?= $this->section('content') ?>

<body>
    <div class="registration-form">
        <form action="/Manage/save_edit_konsumen" method="POST">
            <div style="text-align: center; color:grey;">
                <h3>Edit Data Konsumen</h3>
            </div>
            <br>
            <input type="hidden" name="id_konsumen" value="<?= $konsumen[0]['id_konsumen']; ?>">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label class="label">Konsumen</label>
                        <input type="text" class="form-control item" name="nama" value="<?= $konsumen[0]['nama_konsumen'] ?>">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'nama') : '' ?></span>
                    </div>
                    <div class="form-group">
                        <label class="label">Alamat</label>
                        <input type="text" class="form-control item" name="alamat" value="<?= $konsumen[0]['alamat'] ?>">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'alamat') : '' ?></span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="label">No Hanphone</label>
                        <input type="text" class="form-control item" name="phone" value="<?= $konsumen[0]['phone'] ?>">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'phone') : '' ?></span>
                    </div>
                    <div class="form-group">
                        <label class="label">Email</label>
                        <input type="text" class="form-control item" name="email" value="<?= $konsumen[0]['email'] ?>">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Simpan</button>
                <a href="/konsumen" class="btn btn-block create-account">Kembali</a>
            </div>
        </form>
    </div>
    <?= $this->endsection() ?>
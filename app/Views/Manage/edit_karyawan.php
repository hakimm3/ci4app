<?= $this->extend('/layouts/template') ?>
<?= $this->section('content') ?>

<body>
    <div class="registration-form">
        <form action="/Manage/save_edit_karyawan" method="POST">
            <div style="text-align: center; color:grey;">
                <h3>Edit Data Karyawan</h3>
            </div>
            <br>
            <input type="hidden" name="id_karyawan" value="<?= $karyawan[0]['id_karyawan']; ?>">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label class="label">Karyawan</label>
                        <input type="text" class="form-control item" name="nama" value="<?= $karyawan[0]['nama_karyawan'] ?>">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'nama') : '' ?></span>
                    </div>
                    <div class="form-group">
                        <label class="label">Alamat</label>
                        <input type="text" class="form-control item" name="alamat" value="<?= $karyawan[0]['alamat'] ?>">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'alamat') : '' ?></span>
                    </div>
                    <div class="form-group">
                        <label class="label">No Handphone</label>
                        <input type="text" class="form-control item" name="phone" value="<?= $karyawan[0]['phone'] ?>">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'phone') : '' ?></span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="label">Email</label>
                        <input type="text" class="form-control item" name="email" value="<?= $karyawan[0]['email'] ?>">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
                    </div>
                    <div class="form-group">
                        <label class="label">Jabatan</label>
                        <input type="text" class="form-control item" name="jabatan" value="<?= $karyawan[0]['jabatan'] ?>">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'jabatan') : '' ?></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Simpan</button>
                <a href="/karyawan" class="btn btn-block create-account">Kembali</a>
            </div>
        </form>
    </div>
    <?= $this->endsection() ?>
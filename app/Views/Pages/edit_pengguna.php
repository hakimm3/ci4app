<?= $this->extend('/layouts/template') ?>
<?= $this->section('content') ?>

<body>
    <div class="registration-form">
        <form action="/Pages/save_edit_pengguna" method="POST">
            <div style="text-align: center; color:grey;">
                <h3>Edit Data Pengguna</h3>
            </div>
            <br>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <input type="hidden" name="id_pengguna" value="<?= $detail[0]['id_pengguna'] ?>">

                        <label class="label">Pengguna</label>
                        <input type="text" class="form-control item" name="nama_pengguna" value="<?= $detail[0]['nama_pengguna'] ?>">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'nama_pengguna') : '' ?></span>
                    </div>
                    <div class="form-group">
                        <label class="label">Alamat</label>
                        <input type="text" class="form-control item" name="alamat" value="<?= $detail[0]['alamat'] ?>">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'alamat') : '' ?></span>
                    </div>
                    <div class="form-group">
                        <label class="label">No Handphone</label>
                        <input type="text" class="form-control item" name="phone" value="<?= $detail[0]['phone'] ?>">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'phone') : '' ?></span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="label">Email</label>
                        <input type="text" class="form-control item" name="email" value="<?= $detail[0]['email'] ?>">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
                    </div>
                    <div class="form-group">
                        <label class="label">Username</label>
                        <input type="text" class="form-control item" name="username" value="<?= $detail[0]['username'] ?>">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'username') : '' ?></span>
                    </div>
                    <div class="form-group">
                        <label class="label">Level</label>
                        <select name="level" class="form-control item" id="">
                            <option value="super_admin">Super Admin</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Simpan</button>
                <a href="<?= base_url('/pengguna') ?>" class="btn btn-block create-account">Kembali</a>
            </div>
        </form>
    </div>
    <?= $this->endsection() ?>
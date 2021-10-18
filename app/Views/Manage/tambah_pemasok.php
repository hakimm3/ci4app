<?= $this->extend('/layouts/template') ?>
<?= $this->section('content') ?>

<body>
    <div class="registration-form">
        <form action="/Manage/save_pemasok" method="POST">
            <div style="text-align: center; color:grey;">
                <h3>Tambah Data Pemasok</h3>
            </div>
            <br>
            <div class="form-group">
                <label class="label">Nama</label>
                <input type="text" class="form-control item" name="nama" value="<?= set_value('nama') ?>">
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'nama') : '' ?></span>
            </div>
            <div class="form-group">
                <label class="label">Alamat</label>
                <input type="text" class="form-control item" name="alamat" value="<?= set_value('alamat') ?>">
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'alamat') : '' ?></span>
            </div>
            <div class="form-group">
                <label class="label">No Handphone</label>
                <input type="number" class="form-control item" name="phone" value="<?= set_value('phone') ?>">
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'phone') : '' ?></span>
            </div>
            <div class="form-group">
                <label class="label">Email</label>
                <input type="text" class="form-control item" name="email" value="<?= set_value('email') ?>">
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Tambah</button>
            </div>
        </form>
    </div>
    <?= $this->endsection() ?>
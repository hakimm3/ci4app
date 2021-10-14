<?= $this->extend('/layouts/template') ?>
<?= $this->section('content') ?>

<body>
    <div class="registration-form">
        <form action="/Manage/save_edit_pemasok" method="POST">
            <div style="text-align: center; color:grey;">
                <h3>Edit Data Pemasok</h3>
            </div>
            <br>
            <input type="hidden" name="id_pemasok" value="<?= $pemasok[0]['id_pemasok']; ?>">
            <div class="form-group">
                <input type="text" class="form-control item" name="nama" value="<?= $pemasok[0]['nama_pemasok'] ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="alamat" value="<?= $pemasok[0]['alamat'] ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="phone" value="<?= $pemasok[0]['phone'] ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="email" value="<?= $pemasok[0]['email'] ?>">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Simpan</button>
            </div>
        </form>
    </div>
    <?= $this->endsection() ?>
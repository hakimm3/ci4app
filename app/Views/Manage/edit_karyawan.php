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
            <div class="form-group">
                <input type="text" class="form-control item" name="nama" value="<?= $karyawan[0]['nama_karyawan'] ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="alamat" value="<?= $karyawan[0]['alamat'] ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="phone" value="<?= $karyawan[0]['phone'] ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="email" value="<?= $karyawan[0]['email'] ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="email" value="<?= $karyawan[0]['jabatan'] ?>">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Simpan</button>
            </div>
        </form>
    </div>
    <?= $this->endsection() ?>
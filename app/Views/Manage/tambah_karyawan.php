<?= $this->extend('/layouts/template') ?>
<?= $this->section('content') ?>

<body>
    <div class="registration-form">
        <form action="/Manage/save_karyawan" method="POST">
            <div style="text-align: center; color:grey;">
                <h3>Tambah Data Karyawan</h3>
            </div>
            <br>
            <div class="form-group">
                <label class="label">Nama</label>
                <input type="text" class="form-control item" name="nama" required>
            </div>
            <div class="form-group">
                <label class="label">Alamat</label>
                <input type="text" class="form-control item" name="alamat" required>
            </div>
            <div class="form-group">
                <label class="label">No Handphone</label>
                <input type="text" class="form-control item" name="phone" required>
            </div>
            <div class="form-group">
                <label class="label">Email</label>
                <input type="text" class="form-control item" name="email" required>
            </div>
            <div class="form-group">
                <label class="label">Jabatan</label>
                <input type="text" class="form-control item" name="jabatan" required>
            </div>
            <div class="form-group">
                <label class="label"></label>
                <button type="submit" class="btn btn-block create-account">Tambah</button>
            </div>
        </form>
    </div>
    <?= $this->endsection() ?>
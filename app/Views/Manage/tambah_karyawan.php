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
                <input type="text" class="form-control item" name="nama" placeholder="Nama">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="alamat" placeholder="Alamat">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="phone" placeholder="No Handphone">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="jabatan" placeholder="Jabatan">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Tambah</button>
            </div>
        </form>
    </div>
    <?= $this->endsection() ?>
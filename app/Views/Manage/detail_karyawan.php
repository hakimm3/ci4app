<?= $this->extend('/layouts/template') ?>
<?= $this->section('content') ?>

<body>
    <div class="registration-form">
        <form action="/Manage/save_konsumen" method="POST">
            <div style="text-align: center; color:grey;">
                <h3>Detail Data Karyawan</h3>
            </div>
            <br>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label class="label">Karyawan</label>
                        <input type="text" class="form-control item" name="nama" value="<?= $karyawan[0]['nama_karyawan'] ?>">
                    </div>
                    <div class="form-group">
                        <label class="label">ID Karyawan</label>
                        <input type="text" class="form-control item" name="phone" value="<?= $karyawan[0]['id_karyawan'] ?>">
                    </div>
                    <div class="form-group">
                        <label class="label">Alamat</label>
                        <input type="text" class="form-control item" name="alamat" value="<?= $karyawan[0]['alamat'] ?>">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="label">No Handphone</label>
                        <input type="text" class="form-control item" name="phone" value="<?= $karyawan[0]['phone'] ?>">
                    </div>
                    <div class="form-group">
                        <label class="label">Email</label>
                        <input type="text" class="form-control item" name="email" value="<?= $karyawan[0]['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label class="label">Jabatan</label>
                        <input type="text" class="form-control item" name="email" value="<?= $karyawan[0]['jabatan'] ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <!-- <button type="submit" class="btn btn-block create-account">Tambah</button> -->
                <a href="<?= base_url('/karyawan') ?>" class="btn btn-block create-account">Kembali</a>
            </div>
        </form>
    </div>
    <?= $this->endsection() ?>
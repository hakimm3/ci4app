<?= $this->extend('/layouts/template') ?>
<?= $this->section('content') ?>

<body>
    <div class="registration-form">
        <form action="/Manage/save_konsumen" method="POST">
            <div style="text-align: center; color:grey;">
                <h3>Detail Data Pengguna</h3>
            </div>
            <br>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label class="label">Pengguna</label>
                        <input type="text" class="form-control item" name="nama" value="<?= $detail[0]['nama_pengguna'] ?>">
                    </div>
                    <div class="form-group">
                        <label class="label">ID Pengguna</label>
                        <input type="text" class="form-control item" name="nama" value="<?= $detail[0]['id_pengguna'] ?>">
                    </div>
                    <div class="form-group">
                        <label class="label">Alamat</label>
                        <input type="text" class="form-control item" name="alamat" value="<?= $detail[0]['alamat'] ?>">
                    </div>
                    <div class="form-group">
                        <label class="label">No Handphone</label>
                        <input type="text" class="form-control item" name="phone" value="<?= $detail[0]['phone'] ?>">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="label">Email</label>
                        <input type="text" class="form-control item" name="email" value="<?= $detail[0]['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label class="label">Username</label>
                        <input type="text" class="form-control item" name="email" value="<?= $detail[0]['username'] ?>">
                    </div>
                    <div class="form-group">
                        <label class="label">Level</label>
                        <input type="text" class="form-control item" name="email" value="<?= $detail[0]['level'] ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <a href="<?= base_url('/pengguna') ?>" class="btn btn-block create-account">Kembali</a>
            </div>
        </form>
    </div>
    <?= $this->endsection() ?>
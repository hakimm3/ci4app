<?= $this->extend('/layouts/template') ?>
<?= $this->section('content') ?>

<body>
    <div class="registration-form">
        <form action="/Manage/save_konsumen" method="POST">
            <div style="text-align: center; color:grey;">
                <h3>Detail Data Konsumen</h3>
            </div>
            <br>

            <div class="form-group">
                <input type="text" class="form-control item" name="nama" placeholder="<?= $konsumen[0]['nama_konsumen'] ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="alamat" placeholder="<?= $konsumen[0]['alamat'] ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="phone" placeholder="<?= $konsumen[0]['phone'] ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="email" placeholder="<?= $konsumen[0]['email'] ?>">
            </div>
            <div class="form-group">
                <!-- <button type="submit" class="btn btn-block create-account">Tambah</button> -->
                <a href="/konsumen" class="btn btn-block create-account">Kembali</a>
            </div>
        </form>
    </div>
    <?= $this->endsection() ?>
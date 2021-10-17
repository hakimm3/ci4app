<?= $this->extend('/layouts/template') ?>
<?= $this->section('content') ?>

<body>
    <div class="registration-form">
        <form action="/Manage/save_konsumen" method="POST">
            <div style="text-align: center; color:grey;">
                <h3>Detail Data Barang Keluar</h3>
            </div>
            <br>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label class="label">Barang</label>
                        <input type="text" class="form-control item" name="nama" value="<?= $barang_keluar[0]['barang'] ?>">
                    </div>
                    <div class="form-group">
                        <label class="label">Kategori</label>
                        <input type="text" class="form-control item" name="alamat" value="<?= $barang_keluar[0]['kategori'] ?>">
                    </div>
                    <div class="form-group">
                        <label class="label">Qty</label>
                        <input type="text" class="form-control item" name="alamat" value="<?= $barang_keluar[0]['qty'] ?>">
                    </div>
                    <div class="form-group">
                        <label class="label">Satuan</label>
                        <input type="text" class="form-control item" name="phone" value="<?= $barang_keluar[0]['satuan'] ?>">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="label">Tanggal Keluar</label>
                        <input type="text" class="form-control item" name="email" value="<?= $barang_keluar[0]['tanggal_keluar'] ?>">
                    </div>
                    <div class="form-group">
                        <label class="label">Konsumen</label>
                        <input type="text" class="form-control item" name="email" value="<?= $barang_keluar[0]['konsumen'] ?>">
                    </div>
                    <div class="form-group">
                        <label class="label">Kondisi</label>
                        <input type="text" class="form-control item" name="email" value="<?= $barang_keluar[0]['kondisi'] ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <a href="<?= base_url('/transaksikeluar') ?>" class="btn btn-block create-account">Kembali</a>
            </div>
        </form>
    </div>
    <?= $this->endsection() ?>
<?= $this->extend('/layouts/template') ?>
<?= $this->section('content') ?>

<body>
    <div class="registration-form">
        <form action="/Manage/save_konsumen" method="POST">
            <div style="text-align: center; color:grey;">
                <h3>Detail Data Barang Masuk</h3>
            </div>
            <br>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label class="label">Barang</label>
                        <input type="text" class="form-control item" name="nama" value="<?= $detail[0]['barang'] ?>">
                    </div>
                    <div class="form-group">
                        <label class="label">Kategori</label>
                        <input type="text" class="form-control item" name="alamat" value="<?= $detail[0]['kategori'] ?>">
                    </div>
                    <div class="form-group">
                        <label class="label">Qty</label>
                        <input type="text" class="form-control item" name="alamat" value="<?= $detail[0]['qty'] ?>">
                    </div>
                    <div class="form-group">
                        <label class="label">Satuan</label>
                        <input type="text" class="form-control item" name="phone" value="<?= $detail[0]['satuan'] ?>">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="label">Tanggal Masuk</label>
                        <input type="text" class="form-control item" name="email" value="<?= $detail[0]['tanggal_masuk'] ?>">
                    </div>
                    <div class="form-group">
                        <label class="label">Pemasok</label>
                        <input type="text" class="form-control item" name="email" value="<?= $detail[0]['pemasok'] ?>">
                    </div>
                    <div class="form-group">
                        <label class="label">No Faktur</label>
                        <input type="text" class="form-control item" name="email" value="<?= $detail[0]['no_faktur'] ?>">
                    </div>
                    <div class="form-group">
                        <label class="label">Kondisi</label>
                        <input type="text" class="form-control item" name="email" value="<?= $detail[0]['kondisi'] ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <a href="<?= base_url('/transaksimasuk') ?>" class="btn btn-block create-account">Kembali</a>
            </div>
        </form>
    </div>
    <?= $this->endsection() ?>
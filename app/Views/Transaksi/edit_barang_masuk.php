<?= $this->extend('/layouts/template') ?>
<?= $this->section('content') ?>

<body>
    <div class="registration-form">
        <form action="/Transaksi/save_barang_masuk" method="POST">
            <div style="text-align: center; color:grey;">
                <h3>Edit Data Barang Masuk</h3>
            </div>
            <br>
            <input type="hidden" name="id_barang_masuk" value="<?= $detail[0]['id_barang_masuk'] ?>">
            <div class="form-group">
                <label class="label">Barang</label>
                <select name="id_barang" class="form-control item">
                    <?php foreach ($barang as $ktg) : ?>
                        <option value="<?= $ktg['id_barang'] ?>"><?= $ktg['nama_barang'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label class="label">Kategori</label>
                <select name="id_kategori" class="form-control item">
                    <?php foreach ($kategori as $ktg) : ?>
                        <option value="<?= $ktg['id_kategori'] ?>"><?= $ktg['nama_kategori'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label class="label">Qty</label>
                <input type="text" class="form-control item" name="qty" value="<?= $detail[0]['qty'] ?>">
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'qty') : '' ?></span>
            </div>
            <div class="form-group">
                <label class="label">No Faktur</label>
                <input type="text" class="form-control item" name="no_faktur" value="<?= $detail[0]['no_faktur'] ?>">
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'no_faktur') : '' ?></span>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Simpan</button>
                <a href="/transaksimasuk" class="btn btn-block create-account">Kembali</a>
            </div>
        </form>
    </div>
    <?= $this->endsection() ?>
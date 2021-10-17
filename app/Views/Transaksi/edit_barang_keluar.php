<?= $this->extend('/layouts/template') ?>
<?= $this->section('content') ?>

<body>
    <div class="registration-form">
        <form action="/Transaksi/saveeditbarangkeluar" method="POST">
            <div style="text-align: center; color:grey;">
                <h3>Edit Data Barang Keluar</h3>
            </div>
            <br>
            <input type="hidden" name="id_barang_keluar" value="<?= $barang_keluar[0]['id_barang_keluar'] ?>">
            <div class="form-group">
                <label class="label">Barang</label>
                <select name="id_barang" class="form-control item">
                    <?php foreach ($barang as $brg) : ?>
                        <option value="<?= $brg['id_barang'] ?>"><?= $brg['nama_barang'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label class="label">Qty</label>
                <input type="number" class="form-control item" value="<?= $barang_keluar[0]['qty'] ?>" name="qty" required>
            </div>
            <div class="form-group">
                <label class="label">Konsumen</label>
                <select name="id_konsumen" class="form-control item">
                    <?php foreach ($konsumen as $ktg) : ?>
                        <option value="<?= $ktg['id_konsumen'] ?>"><?= $ktg['nama_konsumen']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label class="label">Tanggal Keluar</label>
                <input type="date" class="form-control item" name="tanggal_keluar" value="<?= $barang_keluar[0]['tanggal_keluar'] ?>" required>
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Simpan</button>
                <a href="/transaksikeluar" class="btn btn-block create-account">Kembali</a>
            </div>
        </form>
    </div>
    <?= $this->endsection() ?>
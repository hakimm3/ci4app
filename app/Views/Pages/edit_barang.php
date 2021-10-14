<?= $this->extend('/layouts/template') ?>
<?= $this->section('content') ?>

<body>
    <div class="registration-form">
        <form action="/Manage/save_konsumen" method="POST">
            <div style="text-align: center; color:grey;">
                <h3>Edit Data Barang</h3>
            </div>
            <br>
            <div class="form-group">
                <input type="text" class="form-control item" name="nama" value="<?= $barang[0]['nama_barang'] ?>">
            </div>
            <div class="form-group">
                <!-- <input type="text" class="form-control item" name="alamat" value="<?= $barang[0]['id_kategori'] ?>"> -->
                <select name="kategori" id="">
                    <?php foreach ($kategori as $ktg) : ?>
                        <option value="<?= $ktg['id_kategori'] ?>"><?= $ktg['nama_kategori']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="stok" value="<?= $barang[0]['stok'] ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="min_stok" value="<?= $barang[0]['min_stok'] ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="satuan" value="<?= $barang[0]['satuan'] ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="kondisi" value="<?= $barang[0]['kondisi'] ?>">
            </div>
            <div class="form-group">
                <a href="/stokmenipis" class="btn btn-block create-account">Kembali</a>
            </div>
        </form>
    </div>
    <?= $this->endsection() ?>
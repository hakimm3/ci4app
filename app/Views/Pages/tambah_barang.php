<?= $this->extend('/layouts/template') ?>
<?= $this->section('content') ?>

<body>
    <div class="registration-form">
        <form action="/Pages/savebarang" method="POST">
            <div style="text-align: center; color:grey;">
                <h3>Tambah Data Barang</h3>
            </div>
            <br>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label class="label">Barang</label>
                        <input type="text" class="form-control item" name="nama_barang">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'nama_barang') : '' ?></span>
                    </div>
                    <div class="form-group">
                        <label class="label">Kategori</label>
                        <select name="id_kategori" class="form-control item">
                            <?php foreach ($kategori as $ktg) : ?>
                                <option value="<?= $ktg['id_kategori'] ?>"><?= $ktg['nama_kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="label">Pemasok</label>
                        <select name="id_pemasok" class="form-control item">
                            <?php foreach ($pemasok as $ktg) : ?>
                                <option value="<?= $ktg['id_pemasok'] ?>"><?= $ktg['nama_pemasok']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="label">No Faktur</label>
                        <input type="number" class="form-control item" maxlength="5" name="no_faktur">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'no_faktur') : '' ?></span>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="label">Jumlah</label>
                        <input type="number" class="form-control item" name="qty" maxlength="3">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'qty') : '' ?></span>
                    </div>
                    <div class="form-group">
                        <label class="label">Minimal Stok</label>
                        <input type="number" class="form-control item" name="min_stok" maxlength="1">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation, 'min_stok') : '' ?></span>
                    </div>
                    <div class="form-group">
                        <label class="label">Satuan</label>
                        <input type="text" class="form-control item" name="satuan">
                    </div>
                    <div class="form-group">
                        <label class="label">Kondisi</label>
                        <select name="kondisi" class="form-control item">
                            <option value="baik">Baik</option>
                            <option value="rusak">Rusak</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Tambah</button>
            </div>
        </form>
    </div>
    <?= $this->endsection() ?>
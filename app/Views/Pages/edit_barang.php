<?= $this->extend('/layouts/template') ?>
<?= $this->section('content') ?>

<body>
    <div class=" registration-form">
        <form action="/Pages/save_edit_barang" method="POST">
            <div style="text-align: center; color:grey;">
                <h3>Edit Data Barang</h3>
            </div>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <input type="hidden" name="id_barang" value="<?= $barang[0]['id_barang'] ?>">
                        <div class="form-group">
                            <label class="label">Barang</label>
                            <input type="text" class="form-control item" name="nama" value="<?= $barang[0]['nama_barang'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="label">Kategori</label>
                            <select name="kategori" id="" class="form-control item">
                                <?php foreach ($kategori as $ktg) : ?>
                                    <option value="<?= $ktg['id_kategori'] ?>"><?= $ktg['nama_kategori']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="label">Stok</label>
                            <input type="text" class="form-control item" name="stok" value="<?= $barang[0]['stok'] ?>">
                            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'stok') : '' ?></span>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label class="label">Minimal Stok</label>
                            <input type="text" class="form-control item" name="min_stok" value="<?= $barang[0]['min_stok'] ?>">
                            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'min_stok') : '' ?></span>
                        </div>
                        <div class="form-group">
                            <label class="label">Satuan</label>
                            <input type="text" class="form-control item" name="satuan" value="<?= $barang[0]['satuan'] ?>">
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

            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Simpan</button>
                <a href="<?= base_url('/stokmenipi') ?>" class="btn btn-block create-account">Kembali</a>
            </div>
        </form>
    </div>
    <?= $this->endsection() ?>
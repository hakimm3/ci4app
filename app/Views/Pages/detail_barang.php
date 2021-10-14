<?= $this->extend('/layouts/template') ?>
<?= $this->section('content') ?>

<body>
    <div class="registration-form">
        <form action="/Manage/save_konsumen" method="POST">
            <div style="text-align: center; color:grey;">
                <h3>Detail Data Barang</h3>
            </div>
            <br>

            <div class="form-group">
                <input type="text" class="form-control item" name="nama" value="Barang: <?= $detail[0]['barang'] ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="alamat" value="Kategori: <?= $detail[0]['kategori'] ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="phone" value="Stok: <?= $detail[0]['stok'] ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="email" value="Minimal Stok: <?= $detail[0]['min_stok'] ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="email" value="Satuan: <?= $detail[0]['satuan'] ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control item" name="email" value="Kodisi: <?= $detail[0]['kondisi'] ?>">
            </div>
            <div class="form-group">
                <a href="/stokmenipis" class="btn btn-block create-account">Kembali</a>
            </div>
        </form>
    </div>
    <?= $this->endsection() ?>
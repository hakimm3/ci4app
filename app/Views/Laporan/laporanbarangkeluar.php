<?php $this->extend('layouts/template') ?>
<?php $this->section('content'); ?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Laporan Barang Keluar</h1>
<form action="/Laporan/exportexcelbarangkeluar" method="post">
    <button type="submit" class="btn btn-success my-3">Export ke Excel</button>
</form>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Barang</th>
                        <th>Kategori</th>
                        <th>Konsumen</th>
                        <th>Qty</th>
                        <th>Satuan</th>
                        <th>Tanggal Keluar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($barang_keluar as $brg) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $brg['barang'] ?></td>
                            <td><?= $brg['kategori'] ?></td>
                            <td><?= $brg['konsumen'] ?></td>
                            <td><?= $brg['qty'] ?></td>
                            <td><?= $brg['satuan'] ?></td>
                            <td><?= $brg['tanggal_keluar'] ?></td>
                            <?php $i++ ?>
                        <?php endforeach; ?>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $this->endSection() ?>
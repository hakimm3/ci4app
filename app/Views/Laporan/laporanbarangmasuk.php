<?php $this->extend('layouts/template') ?>
<?php $this->section('content'); ?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Laporan Barang Masuk</h1>
<form action="/Laporan/exportexcelbarangmasuk" method="post">
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
                        <th>Supplier</th>
                        <th>No Faktur</th>
                        <th>Satuan</th>
                        <th>Qty</th>
                        <th>Tanggal Masuk</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($barang_masuk as $brg) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $brg['barang'] ?></td>
                            <td><?= $brg['kategori'] ?></td>
                            <td><?= $brg['pemasok'] ?></td>
                            <td><?= $brg['no_faktur'] ?></td>
                            <td><?= $brg['satuan'] ?></td>
                            <td><?= $brg['qty'] ?></td>
                            <td><?= $brg['tanggal_masuk'] ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $this->endSection() ?>
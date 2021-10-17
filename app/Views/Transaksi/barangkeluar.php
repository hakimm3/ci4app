<?php $this->extend('layouts/template') ?>
<?php $this->section('content'); ?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Transaksi Barang keluar</h1>
<form action="/Transaksi/tambah_barang_keluar" method="post">
    <button type="submit" class="btn btn-success my-3">Tambah Barang Keluar</button>
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
                        <th>Tanggal keluar</th>
                        <th>Qty</th>
                        <th>Satuan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($barang_keluar as $barang) :  ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td> <?= $barang['barang'] ?> </td>
                            <td><?= $barang['tanggal_keluar'] ?></td>
                            <td><?= $barang['qty'] ?></td>
                            <td><?= $barang['satuan'] ?></td>
                            <td>
                                <a href="/Transaksi/edit_barang_keluar/<?= $barang['id_barang_keluar'] ?>" class="btn btn-success">Edit</a>
                                <a href="/Transaksi/detail_barang_keluar/<?= $barang['id_barang_keluar'] ?>" class="btn btn-primary">Details</a>
                                <a href="/Transaksi/hapus_barang_keluar/<?= $barang['id_barang_keluar'] ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $this->endSection() ?>
<?php $this->extend('layouts/template') ?>
<?php $this->section('content'); ?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Laporan Pemasok</h1>
<form action="/Laporan/exportexcelpemasok" method="post">
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
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No Hp</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pemasok as $k) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $k['id_pemasok'] ?></td>
                            <td><?= $k['nama_pemasok']; ?></td>
                            <td><?= $k['alamat'] ?></td>
                            <td><?= $k['phone'] ?></td>
                            <td><?= $k['email'] ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $this->endSection() ?>
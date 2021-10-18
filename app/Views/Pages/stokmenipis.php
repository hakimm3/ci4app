<?php $this->extend('layouts/template') ?>
<?php $this->section('content'); ?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Stok Barang Menipis</h1><?= dd(session()->get('LogedUser')) ?>
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
                        <th>Stok</th>
                        <th>Min Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($stok_menipis as $stk) : ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $stk['barang'] ?></td>
                            <td><?= $stk['kategori'] ?></td>
                            <td><?= $stk['stok'] ?></td>
                            <td><?= $stk['min_stok'] ?></td>
                            <td>
                                <a href="/Pages/edit_barang/<?= $stk['id_barang'] ?>" class="btn btn-success">Edit</a>
                                <a href="/Pages/details_barang/<?= $stk['id_barang'] ?>" class="btn btn-primary">Details</a>
                                <a href="/Pages/hapus_barang/<?= $stk['id_barang'] ?>" class="btn btn-danger">Hapus</a>
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
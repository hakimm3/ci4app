<?php $this->extend('layouts/template') ?>
<?php $this->section('content'); ?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Manajemen Kategori</h1>
<form action="/Pages/tambahkategori" method="post">
    <button class="btn btn-primary my-3" name="tambah_kategori">Tambah Data Kategori</button>
</form>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>

                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Id Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($kategori as $ktg) : ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $ktg['nama_kategori'] ?></td>
                            <td><?= $ktg['id_kategori'] ?></td>
                            <td>
                                <a href="/Pages/edit_kategori/<?= $ktg['id_kategori'] ?>" class="btn btn-success">Edit</a>
                                <a href="/Pages/hapus_kategori/<?= $ktg['id_kategori'] ?>" class="btn btn-danger">Hapus</a>
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
<?php $this->extend('layouts/template') ?>
<?php $this->section('content'); ?>

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Manajemen Data Pengguna</h1>
<form action="/Auth/register" method="post">
    <button type="submit" class="btn btn-success my-3">Tambah Pengguna</button>
</form>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>No HP</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pengguna as $stk) : ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $stk['nama_pengguna'] ?></td>
                            <td><?= $stk['phone'] ?></td>
                            <td><?= $stk['level'] ?></td>
                            <td>
                                <a href="<?= '/Pages/edit_pengguna/' . $stk['id_pengguna'] ?>" class="btn btn-success">Edit</a>
                                <a href="<?= '/Pages/details_pengguna/' . $stk['id_pengguna'] ?>" class=" btn btn-primary">Details</a>
                                <a href="<?= '/Pages/hapus_pengguna/' . $stk['id_pengguna'] ?>" class=" btn btn-danger">Hapus</a>
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
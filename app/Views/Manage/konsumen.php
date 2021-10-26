<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Manajemen Data Konsumen</h1>
<form action="/Manage/tambah_konsumen" method="post">
    <button type="submit" class="btn btn-success my-3">Tambah Data Konsumen</button>
</form>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama</th>
                        <th class="col-3">Alamat</th>
                        <th>No Handphone</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($konsumen as $kons) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $kons["nama_konsumen"] ?></td>
                            <td><?= $kons["alamat"] ?></td>
                            <td><?= $kons["phone"] ?></td>
                            <td class="text-center">
                                <a href="Manage/edit_konsumen/<?= $kons["id_konsumen"] ?>" class="btn btn-success">Edit</a>
                                <a href="Manage/details_konsumen/<?= $kons["id_konsumen"] ?>" class="btn btn-primary">Details</a>
                                <a href="Manage/hapus_konsumen/<?= $kons["id_konsumen"] ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endsection() ?>
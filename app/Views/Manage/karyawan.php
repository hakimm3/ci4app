<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Manajemen Data Karyawan</h1>

<form action="/Manage/tambah_karyawan" method="post">
    <button class="btn btn-primary my-3" name="tambah_karyawan">Tambah Data Karyawan</button>
</form>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th class="col-4">Alamat</th>
                        <th>No Handphone</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($karyawan as $kar) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $kar["nama_karyawan"] ?></td>
                            <td><?= $kar["alamat"] ?></td>
                            <td><?= $kar["phone"] ?></td>
                            <td class="text-center">
                                <a href="" class="btn btn-success">Edit</a>
                                <a href="" class="btn btn-primary">Details</a>
                                <a href="" class="btn btn-danger">Hapus</a>
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
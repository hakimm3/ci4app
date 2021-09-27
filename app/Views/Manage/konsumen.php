<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Manajemen Data Konsumen</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
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
                            <td>
                                <a href="" class="btn btn-success btn-sm">Edit</a>
                                <a href="" class="btn btn-primary btn-sm">Details</a>
                                <a href="" class="btn btn-danger btn-sm">Hapus</a>
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
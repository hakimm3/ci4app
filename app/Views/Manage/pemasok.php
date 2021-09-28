<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Manajemen Data Pemasok</h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama</th>
                        <th class="col-4">Alamat</th>
                        <th>No Handphone</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pemasok as $pemas) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $pemas["nama_pemasok"] ?></td>
                            <td><?= $pemas["alamat"] ?></td>
                            <td><?= $pemas["phone"] ?></td>
                            <td class="text-center">
                                <a href="" class="btn btn-success btn">Edit</a>
                                <a href="" class="btn btn-primary btn">Details</a>
                                <a href="" class="btn btn-danger btn">Hapus</a>
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
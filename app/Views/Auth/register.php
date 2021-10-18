<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>
<div class="registration-form">
    <form action="/Auth/save" method="post">


        <?php if (!empty(session()->getFlashdata('fail'))) : ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
        <?php endif; ?>

        <?php if (!empty(session()->getFlashdata('success'))) : ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
        <?php endif; ?>

        <div style="text-align: center; color:grey;">
            <h3>Tambah Data Pengguna</h3>
        </div>
        <br>
        <?= csrf_field() ?>
        <div class="form-group ">
            <input type="text" class="form-control item" name="nama_pengguna" placeholder="Nama Lengkap" value="<?= set_value('nama_pengguna') ?>">
            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'nama_pengguna') : '' ?></span>
        </div>
        <div class="form-group">
            <input type="text" class="form-control item" name="alamat" placeholder="Alamat" value="<?= set_value('alamat') ?>">
            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'alamat') : '' ?></span>
        </div>
        <div class="form-group">
            <input type="text" class="form-control item" name="phone" placeholder="No Handphone" value="<?= set_value('phone') ?>">
            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'phone') : '' ?></span>
        </div>
        <div class="form-group">
            <input type="email" class="form-control item" name="email" placeholder="Email" value="<?= set_value('email') ?>">
            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
        </div>
        <div class="form-group">
            <select name="level" class="form-control item" required>
                <option value="admin">Admin</option>
                <option value="super_admin">Super Admin</option>
            </select>
        </div>
        <div class="form-group">
            <input type="text" class="form-control item" name="username" placeholder="Username" value="<?= set_value('username') ?>">
            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'username') : '' ?></span>
        </div>
        <div class="form-group">
            <input type="password" class="form-control item" name="password" placeholder="Password">
            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>
        </div>
        <div class="form-group">
            <input type="password" class="form-control item" name="cpassword" placeholder="Confirm Password">
            <span class="text-danger"><?= isset($validation) ? display_error($validation, 'cpassword') : '' ?></span>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-block create-account">Tambah Pengguna</button>
        </div>
    </form>
</div>
<?= $this->endsection() ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Easiest Way to Add Input Masks to Your Forms</title>
    <!-- Link css form -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/styleform.css">
</head>

<body>
    <div class="registration-form">
        <form action="/Auth/check" method="post">
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
            <?= csrf_field() ?>
            <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
            <?php endif; ?>
            <div class="form-group">
                <input type="text" class="form-control item" name="username" placeholder="Username" value="<?= set_value('username') ?>">
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'username') : '' ?></span>
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" name="password" placeholder="Password">
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Login</button>
            </div>
        </form>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IMS | HSRCC</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/dist/css/adminlte.min.css">
    <link rel="shortcut icon" href="hsrcc.png" type="image/x-icon">

    <style>
        body {
            background-image: url('background2.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
    </style>

</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-danger">
            <div class="card-header text-center">
                <a href="#" class="h4 text-danger"><b>High Speed Railways Contractor Consortium</b></a>
            </div>
            <div class="card-body">
                <img src="hsrcc.png" class="rounded  mx-auto d-block" alt="Cinque Terre"><br>
                <h3 class="text-center"><b>Login System<b></h3>
                <p class="login-box-msg ">Information Management System</p>
                <?php
                if (!empty(session()->getFlashdata('sukses'))) { ?>
                    <div class="alert alert-success">
                        <?php echo session()->getFlashdata('sukses'); ?>
                    </div>
                <?php } ?>

                <?php if (!empty(session()->getFlashdata('haruslogin'))) { ?>
                    <div class="alert alert-info">
                        <?php echo session()->getFlashdata('haruslogin'); ?>
                    </div>
                <?php } ?>

                <?php if (!empty(session()->getFlashdata('gagal'))) { ?>
                    <div class="alert alert-warning">
                        <?php echo session()->getFlashdata('gagal'); ?>
                    </div>
                <?php } ?>
                <?php
                echo form_open('LoginController/cek_login');
                ?>
                <form action="#" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder=" Username " required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope text-info"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder=" Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock text-info"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-info btn-block">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <?php echo form_close(); ?>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>/dist/js/adminlte.min.js"></script>
</body>

</html>
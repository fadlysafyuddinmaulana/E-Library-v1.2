<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <title>Perpustakaan Karya Ilmu</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE-3.1.0-rc/plugins/fontawesome-free/css/all.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE-3.1.0-rc/dist/css/adminlte.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE-3.1.0-rc/dist/css/adminlte.min.css" />
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />
    <!--Icon for Title Bar  -->
    <link rel="icon" href="<?= base_url() ?>assets/server-image/ebook.ico">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-header text-center">
                <h2 class="h2"><b>Pemebritahuan</b></h2>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Apakah anda yakin mau hapus buku <?= $buku->judul_buku; ?></p>

                <form action="<?= base_url('buku' . '/' . 'del_book' . '/' . $buku->id_buku) ?>" method="post" enctype="multipart/form-data">
                    <?php if ($status == '0') { ?>
                        <input type="hidden" value="<?= $status; ?>" name="status">
                        <input type="hidden" value="" name="stok">                        
                    <?php } else { ?>
                        <input type="hidden" value="<?= $status; ?>" name="status">
                        <?php foreach ($stok as $key => $value) : ?>
                            <input type="hidden" value="<?= $value->id_buku; ?>" name="stok">
                        <?php endforeach; ?>
                    <?php } ?>

                    <div class="row mt-3">
                        <!-- /.col -->
                            <button type="submit" class="btn btn-primary btn-block">Ya</button>
                        <a href="<?= base_url() ?>buku" class="btn btn-danger btn-block">Back</a>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->
    <!-- /.login-box -->
    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/AdminLTE-3.1.0-rc/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>assets/AdminLTE-3.1.0-rc/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/AdminLTE-3.1.0-rc/dist/js/adminlte.min.js"></script>

</body>

</html>
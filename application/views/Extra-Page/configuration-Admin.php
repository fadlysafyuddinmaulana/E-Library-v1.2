<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pengaturan Admin</h1>
                </div>
            </div>
            <div class="flash-success" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
            <div class="flash-error" data-flashdata="<?= $this->session->flashdata('message_error'); ?>"></div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Password</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php
                        $user = $this->session->userdata('server_library');
                        $id     = $user['id_admin'];
                        ?>
                        <form method="post" action="<?= base_url('proses-configuration' . '/' . $id) ?>" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Password Lama</label>
                                    <input type="password" autocomplete="off" name="old-password" id="old-password" class="form-control">
                                    <?= form_error('old-password', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Password Baru</label>
                                    <input type="password" autocomplete="off" name="new-password" id="new-password" class="form-control">
                                    <?= form_error('new-password', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Konfirmasi Password Baru</label>
                                    <input type="password" autocomplete="off" name="confirmation-password" id="confirmation-password" class="form-control">
                                    <?= form_error('confirmation-password', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
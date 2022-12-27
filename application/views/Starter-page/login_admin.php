<div class="login-box">
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-header text-center">
            <h2 class="h2"><b><?= $title; ?></b></h2>
        </div>
        <div class="card-body">
            <?php if ($this->session->flashdata('message_login')) : ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?= $this->session->flashdata('message_login'); ?>
                </div>
            <?php endif; ?>
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="<?= base_url() ?>authentication-admin" method="post" enctype="multipart/form-data">
                <div class="input-group">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password Anda">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-key"></span>
                        </div>
                    </div>
                    <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                </div>
                <div class="row mt-3">
                    <!-- /.col -->
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->
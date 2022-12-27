<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Petugas</h1>
                </div>
                <div class="flash-success" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center mb-5">
                                <?php if ($petugas->foto_petugas == 'L') {
                                    $foto = 'L.png';
                                } elseif ($petugas->foto_petugas == 'P') {
                                    $foto = 'P.png';
                                } else {
                                    $foto = $petugas->foto_petugas;
                                }
                                ?>
                                <img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/server-image' . '/' . 'dokumen-profile-petugas' . '/' . $foto) ?>" alt="<?= $foto; ?>">
                            </div>

                            <ul class="list-group list-group-unbordered mb-3">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Nama Petugas</td>
                                            <td>
                                                <?= $petugas->nama_petugas; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>
                                                <?php
                                                if ($petugas->jk == 'L') {
                                                    echo "Laki-Laki";
                                                } else {
                                                    echo "Perempuan";
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </ul>
                            <?php if ($petugas->active == 1) { ?>
                                <a type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#add-modal-worker"><i class="fas fa-plus"></i><b>Bikin Akun</b></a>
                            <?php } else { ?>
                                <a type="button" class="btn btn-warning text-white btn-block" data-toggle="modal" data-target="#edit-modal-worker"><i class="fas fa-pen"></i><b>Edit Akun</b></a>
                            <?php } ?>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>



                <style>
                    .modal {
                        position: absolute;
                        top: 0px;
                        right: 100px;
                        bottom: 0;
                        left: 50px;
                        z-index: 10040;
                        overflow: auto;
                        overflow-y: auto;
                    }
                </style>




                <div class="modal fade" id="add-modal-worker" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Akun Petugas</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('petugas/add_userworker/' . $petugas->id_petugas) ?>" method="post" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="hidden" name="idp" value="<?= $petugas->id_petugas; ?>">
                                            <input type="text" autocomplete="off" name="username" id="username" class="form-control" autocomplete="off">
                                            <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" autocomplete="off" name="password" id="password" class="form-control" autocomplete="off">
                                            <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="edit-modal-worker" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit akun</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('petugas/update_userworker/' . $petugas->id_petugas) ?>" method="post" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="hidden" name="idp" value="<?= $petugas->id_petugas; ?>">
                                            <input type="text" autocomplete="off" value="<?= $petugas->username; ?>" name="username" id="username" class="form-control" autocomplete="off">
                                            <?= form_error('username', '<small class="text-danger">', '</small>') ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" autocomplete="off" name="password" id="password" class="form-control" autocomplete="off">
                                            <?= form_error('password', '<small class="text-danger">', '</small>') ?>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
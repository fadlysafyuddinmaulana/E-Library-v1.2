<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Petugas</h1>
                </div>
            </div>
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
                            <h3 class="card-title">Tambah Petugas</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="<?= base_url('update-petugas' . '/' . $petugas->id_petugas) ?>" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Pegawai</label>
                                    <input type="hidden" autocomplete="off" value="<?= $petugas->id_petugas; ?>" name="idp" id="idp" class="form-control">
                                    <input type="text" autocomplete="off" value="<?= $petugas->nama_petugas; ?>" name="nama" id="nama" class="form-control">
                                    <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" value="<?= $petugas->tgl_lahir; ?>" name="tgl_lahir" id="tgl_lahir" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask autocomplete="off">
                                    </div>
                                    <?= form_error('tgl_lahir', '<small class="text-danger">', '</small>') ?>
                                    <!-- /.input group -->
                                </div>
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" autocomplete="off" value="<?= $petugas->tempat_lahir; ?>" name="tempat_lahir" id="tempat_lahir" class="form-control">
                                    <?= form_error('tempat_lahir', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" autocomplete="off" value="<?= $petugas->email; ?>" name="email" id="email" class="form-control">
                                    <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Agama</label>
                                    <select class="form-control" name="agama" id="agama" style="width: 100%;">
                                        <option class="d-none" value="<?= $petugas->agama; ?>"><?= $petugas->agama; ?></option>
                                        <option>Islam</option>
                                        <option>Kristen</option>
                                        <option>Katholik</option>
                                        <option>Budha</option>
                                        <option>Hindhu</option>
                                    </select>
                                    <?= form_error('agama', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control" name="jk" id="jk" style="width: 100%;">
                                        <option class="d-none" value="<?= $petugas->jk; ?>">
                                            <?php if ($petugas->jk == 'L') { ?>
                                                Laki Laki
                                            <?php } else { ?>
                                                Perempuan
                                            <?php } ?>
                                        </option>
                                        <option value="L">Laki Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                    <?= form_error('jk', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Foto Petugas</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="hidden" value="<?= $petugas->foto_petugas; ?>" name="filelama" id="filelama" class="custom-file-input" id="exampleInputFile">
                                            <input type="file" name="foto" id="foto" class="custom-file-input">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
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
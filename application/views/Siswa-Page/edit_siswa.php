<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit <?= $siswa->nama_siswa; ?></h1>
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
                            <h3 class="card-title">Edit Siswa</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="<?= base_url('update-siswa' . '/' . $siswa->id_siswa) ?>" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>NISN</label>
                                    <input type="hidden" autocomplete="off" name="id" id="id" value="<?= $siswa->id_siswa; ?>" class="form-control">
                                    <input type="text" autocomplete="off" name="nisn" id="nisn" value="<?= $siswa->nisn; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>NIS</label>
                                    <input type="text" autocomplete="off" name="nis" id="nis" value="<?= $siswa->nis; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nama Siswa</label>
                                    <input type="text" autocomplete="off" name="nama" id="nama" value="<?= $siswa->nama_siswa; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control" name="jk" id="jk" style="width: 100%;">
                                        <option class="d-none" value="<?= $siswa->jk; ?>">
                                            <?php if ($siswa->jk == 'L') { ?>
                                                Laki Laki
                                            <?php } else { ?>
                                                Perempuan
                                            <?php } ?>
                                        </option>
                                        <option value="L">Laki Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>kelas</label>
                                    <select class="form-control select2" name="kelas" id="kelas" style="width: 100%;">
                                        <?php foreach ($kelas as $key => $value) : ?>
                                            <option value="<?= $value->id_kelas; ?>"><?= $value->nama_kelas; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Foto Siswa:<?= $siswa->foto_siswa; ?></label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="hidden" value="<?= $siswa->foto_siswa; ?>" name="filelama" id="filelama" class="custom-file-input" id="exampleInputFile">
                                            <input type="file" name="foto" id="foto" class="custom-file-input" id="exampleInputFile">
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
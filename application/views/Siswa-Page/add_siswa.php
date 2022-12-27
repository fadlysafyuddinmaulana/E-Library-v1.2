<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Siswa</h1>
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
                            <h3 class="card-title">Tambah siswa</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="<?= base_url() ?>insert-siswa" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>NISN</label>
                                    <input type="text" autocomplete="off" name="nisn" id="nisn" class="form-control" maxlength="10">
                                    <?= form_error('nisn', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>NIS</label>
                                    <input type="text" autocomplete="off" name="nis" id="nis" class="form-control" maxlength="4">
                                    <?= form_error('nis', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Nama Siswa</label>
                                    <input type="text" autocomplete="off" name="nama" id="nama" class="form-control">
                                    <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control" name="jk" id="jk" style="width: 100%;">
                                        <option class="d-none"></option>
                                        <option value="L">Laki Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                    <?= form_error('jk', '<small class="text-danger">', '</small>') ?>
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
                                    <label for="exampleInputFile">Foto Siswa</label>
                                    <div class="input-group">
                                        <div class="custom-file">
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
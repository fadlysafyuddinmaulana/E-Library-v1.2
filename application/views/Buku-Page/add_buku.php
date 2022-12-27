<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Buku</h1>
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
                            <h3 class="card-title">Tambah Buku</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="<?= base_url() ?>insert-buku" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group mb-2 mt-2">
                                    <label>Judul Buku</label>
                                    <input type="text" autocomplete="off" name="judul_buku" id="judul_buku" class="form-control">
                                    <?= form_error('judul_buku', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group mb-2 mt-2">
                                    <label>Kategori</label>
                                    <select class="form-control select2" name="kategori" id="kategori" style="width: 100%;">
                                        <?php foreach ($kategori as $key => $value) : ?>
                                            <option value="<?= $value->id_kategori; ?>"><?= $value->kategori; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group mb-2 mt-2">
                                    <label>penerbit</label>
                                    <select class="form-control select2" name="penerbit" id="penerbit" style="width: 100%;">
                                        <?php foreach ($penerbit as $key => $value) : ?>
                                            <option value="<?= $value->id_penerbit; ?>"><?= $value->penerbit; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group mb-2 mt-2">
                                    <label>Pengarang</label>
                                    <input type="text" autocomplete="off" name="pengarang" id="pengarang" class="form-control">
                                    <?= form_error('pengarang', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group mb-2 mt-2">
                                    <label>Halaman Buku</label>
                                    <input type="text" autocomplete="off" name="hal_buk" id="hal_buk" class="form-control">
                                    <?= form_error('hal_buk', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group mb-2 mt-2">
                                    <label>Lemari</label>
                                    <select class="form-control select2" name="lemari" id="lemari" style="width: 100%;">
                                        <?php foreach ($lemari as $key => $value) : ?>
                                            <option value="<?= $value->id_lemari; ?>"><?= $value->no_lemari; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group mb-2 mt-2">
                                    <label>Tahun Terbit</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="thn_terbit" id="thn_terbit" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy" data-mask autocomplete="off">
                                    </div>
                                    <!-- /.input group -->
                                    <?= form_error('thn_terbit', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <!-- /.form group -->
                                <div class="form-group mb-2 mt-2">
                                    <label>ISBN</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-bookmark"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="isbn" id="isbn" data-inputmask="'mask': ['999-999-999-999-999-9']" data-mask autocomplete="off">
                                    </div>
                                    <!-- /.input group -->
                                    <?= form_error('isbn', '<small class="text-danger">', '</small>') ?>
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
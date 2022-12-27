<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Buku <?= $buku->judul_buku; ?></h1>
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
                            <h3 class="card-title">Edit Buku</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="<?= base_url() ?>update-buku" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Judul Buku</label>
                                    <input type="hidden" autocomplete="off" name="idb" id="idb" value="<?= $buku->id_buku; ?>" class="form-control">
                                    <input type="text" autocomplete="off" name="judul_buku" id="judul_buku" value="<?= $buku->judul_buku; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select class="form-control select2" name="kategori" id="kategori" style="width: 100%;">
                                        <?php foreach ($kategori as $key => $value) : ?>
                                            <option value="<?= $value->id_kategori; ?>"><?= $value->kategori; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>penerbit</label>
                                    <select class="form-control select2" name="penerbit" id="penerbit" style="width: 100%;">
                                        <?php foreach ($penerbit as $key => $value) : ?>
                                            <option value="<?= $value->id_penerbit; ?>"><?= $value->penerbit; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pengarang</label>
                                    <input type="text" autocomplete="off" name="pengarang" id="pengarang" value="<?= $buku->pengarang; ?>" class="form-control">
                                </div>
                                <div class="form-group mb-2 mt-2">
                                    <label>Halaman Buku</label>
                                    <input type="text" autocomplete="off" name="hal_buk" id="hal_buk" value="<?= $buku->halaman_buku; ?>" class="form-control">
                                    <?= form_error('hal_buk', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <!-- /.form group -->
                                <div class="form-group">
                                    <label>Lemari</label>
                                    <select class="form-control select2" name="lemari" id="lemari" style="width: 100%;">
                                        <?php foreach ($lemari as $key => $value) : ?>
                                            <option value="<?= $value->id_lemari; ?>"><?= $value->no_lemari; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tahun Terbit</label>
                                    <input type="text" autocomplete="off" name="thn_terbit" id="thn_terbit" value="<?= $buku->thn_terbit; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>ISBN</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" name="isbn" id="isbn" value="<?= $buku->isbn; ?>" class="form-control" data-inputmask="'mask': ['999-999-999-999-999-9']" data-mask>
                                    </div>
                                    <!-- /.input group -->
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
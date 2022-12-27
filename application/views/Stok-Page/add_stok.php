<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><a class="m-0 text-dark" href="<?= base_url('stok-buku/' . $stok->id_buku) ?>"><?= $buku->judul_buku; ?></a></h1>
                </div>
                <div class="flash-error" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
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
                            <h3 class="card-title">Tambah stok <?= $buku->judul_buku; ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" id="form-stok" action="<?= base_url('insert-stok/' . $buku->id_buku) ?>" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>No awal</label>
                                    <input type="hidden" autocomplete="off" value="<?= $buku->id_buku; ?>" name="id_buku" id="id_buku" class="form-control">
                                    <input type="text" autocomplete="off" name="no_awal" id="no_awal" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>No akhir</label>
                                    <input type="text" autocomplete="off" name="no_akhir" id="no_akhir" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Date masks:</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" data-inputmask-alias="datetime" name="tgl_masuk" id="tgl_masuk" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <div class="row">
                                    <div class="form-check mr-5">
                                        <input class="form-check-input" type="radio" value="2" name="status" checked>
                                        <label class="form-check-label">Tersedia</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" value="1" name="status">
                                        <label class="form-check-label">pinjam</label>
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
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Rent C.<?= $rent->no_buku; ?> <?= $rent->judul_buku; ?></h1>
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
                            <h3 class="card-title">Edit Rent</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="<?= base_url() ?>update-buku" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Siswa</label>
                                    <select class="form-control select2" name="nama_siswa" id="nama_siswa" style="width: 100%;">
                                        <?php foreach ($siswa as $key => $value) : ?>
                                            <option value="<?= $value->id_siswa; ?>"><?= $value->nama_siswa; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>penerbit</label>
                                    <select class="form-control select2" name="stok" id="stok" style="width: 100%;">
                                        <option value="<?= $rent->id_stok; ?>" class="d-none">C.<?= $rent->no_buku; ?> <?= $rent->judul_buku; ?></option>
                                        <?php foreach ($stok as $key => $value) : ?>
                                            <option value="<?= $value->id_stok; ?>">C.<?= $value->no_buku; ?> <?= $value->judul_buku; ?></option>
                                        <?php endforeach; ?>
                                    </select>
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
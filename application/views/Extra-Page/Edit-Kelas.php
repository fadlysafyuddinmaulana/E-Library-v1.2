<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit <?= $kelas->jurusan; ?></h1>
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
                            <h3 class="card-title">Edit Kelas</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="<?= base_url() ?>update-kelas" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Kelas</label>
                                    <input type="hidden" autocomplete="off" name="id" id="id" value="<?= $kelas->id_kelas; ?>" class="form-control">
                                    <input type="text" autocomplete="off" name="nama_kelas" id="nama_kelas" value="<?= $kelas->nama_kelas; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Jurusan</label>
                                    <input type="text" autocomplete="off" name="jurusan" id="jurusan" value="<?= $kelas->jurusan; ?>" class="form-control">
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
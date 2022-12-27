<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-primary"><i class="fas fa-user-graduate"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Siswa</span>
                            <span class="info-box-number"><?= $jumlah_siswa; ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-warning"><i class="fas fa-book text-white"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Buku</span>
                            <span class="info-box-number"><?= $jumlah_buku; ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="fas fa-arrow-circle-up"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Tersedia</span>
                            <span class="info-box-number"><?= $kembali; ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger"><i class="fas fa-arrow-circle-down"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Pinjam</span>
                            <span class="info-box-number"><?= $pinjam; ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class=" card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="table-rent" class="table table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="5%">No</th>
                                        <th class="text-center" width="25%">Nama Siswa</th>
                                        <th class="text-center" width="20%">Buku</th>
                                        <th class="text-center" width="20%">Petugas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($rent as $key => $value) : ?>
                                        <tr>
                                            <td class="text-center">
                                                <?= $no++ ?>
                                            </td>
                                            <td>
                                                <strong><?= $value->nama_siswa  ?></strong>
                                            </td>
                                            <td>
                                                <strong>C.<?= $value->no_buku ?><?= $value->judul_buku ?></strong>
                                            </td>
                                            <td>
                                                <strong><?= $value->nama_petugas ?></strong>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
    </section>
</div>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <h1 class="m-0 text-dark"><a class="m-0 text-dark" href="<?= base_url() ?>kelas">Siswa <?= $kelas->nama_kelas; ?></a></h1>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class=" card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="table-siswa" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="1%">No</th>
                                        <th class="text-center" width="1%"><i class="fa fa-search"></i></th>
                                        <th class="text-center" width="1%">Profil</th>
                                        <th class="text-center" width="1%">NIS</th>
                                        <th class="text-center" width="1%">NISN</th>
                                        <th class="text-center" width="15%">Nama</th>
                                        <th class="text-center" width="1%">Jenis Kelamin</th>
                                        <th class="text-center" width="1%">Kelas</th>
                                        <th class="text-center" width="1%">Jurusan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($siswa as $key => $value) : ?>
                                        <tr>
                                            <td class="text-center" style="vertical-align: middle;">
                                                <?= $no++ ?>
                                            </td>
                                            <td class="details-control text-center" style="vertical-align: middle;">
                                                <i class="btn btn-primary" data-toggle="tooltip"><i class="fa fa-search"></i></i>
                                            </td>
                                            <td class="text-center" style="vertical-align: middle;">
                                                <div class="box-profile">
                                                    <?php if ($value->foto_siswa == 'L') {
                                                        $foto = 'L.png';
                                                    } elseif ($value->foto_siswa == 'P') {
                                                        $foto = 'P.png';
                                                    } else {
                                                        $foto = $value->foto_siswa;
                                                    }
                                                    ?>
                                                    <img style="width: 5rem;" src="<?= base_url('assets/server-image/dokumen-profile-siswa' . '/' . $foto) ?>" alt="<?= $value->foto_siswa; ?>">
                                                </div>
                                            </td>
                                            <td class="text-center" style="vertical-align: middle;">
                                                <strong><?= $value->nis ?></strong>
                                            </td>
                                            <td class="text-center" style="vertical-align: middle;">
                                                <strong><?= $value->nisn ?></strong>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <strong><?= $value->nama_siswa ?></strong>
                                            </td>
                                            <td class="text-center" style="vertical-align: middle;">
                                                <?php if ($value->jk == 'L') { ?>
                                                    <strong>Laki-Laki</strong>
                                                <?php } else { ?>
                                                    <strong>Perempuan</strong>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center" style="vertical-align: middle;">
                                                <strong><?= $value->nama_kelas ?></strong>
                                            </td>
                                            <td class="text-center" style="vertical-align: middle;">
                                                <strong><?= $value->jurusan ?></strong>
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
        </div>
    </div>
</div>
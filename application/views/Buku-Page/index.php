<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <h1 class="m-0 text-dark">Data Buku</h1>
                </div>
                <?php
                $user = $this->session->userdata('server_library');
                if ($user['role'] == 'petugas') { ?>
                    <div class="ml-auto">
                        <a href="<?= base_url() ?>tambah-buku" class="btn text-white mb-4 btn-effect-ripple btn-primary"><i class="fas fa-plus"></i> Tambak Buku</a>
                    </div>
                <?php } ?>
                <div class="flash-success" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                <div class="flash-error" data-flashdata="<?= $this->session->flashdata('message_error'); ?>"></div>            
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
                            <table id="table-buku" class="table table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="5%">No</th>
                                        <th class="text-center" width="5%"><i class="fa fa-search"></i></th>
                                        <th class="text-center">Judul Buku</th>
                                        <th class="text-center">Kategori</th>
                                        <th class="text-center">Penerbit</th>
                                        <th class="text-center">Pengarang</th>
                                        <th class="text-center">Halaman Buku</th>
                                        <th class="text-center">Tahun Terbit</th>
                                        <th class="text-center">No Lemari</th>
                                        <th class="text-center">ISBN</th>
                                        <th class="text-center" width="20%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($buku as $key => $value) : ?>
                                        <tr>
                                            <td class="text-center">
                                                <?= $no++ ?>
                                            </td>
                                            <td class="details-control"><i class="btn btn-primary" data-toggle="tooltip"><i class="fa fa-search"></i></i></td>
                                            <td>
                                                <strong><?= $value->judul_buku ?></strong>
                                            </td>
                                            <td>
                                                <strong><?= $value->kategori ?></strong>
                                            </td>
                                            <td>
                                                <strong><?= $value->penerbit ?></strong>
                                            </td>
                                            <td>
                                                <strong><?= $value->pengarang ?></strong>
                                            </td>
                                            <td>
                                                <strong><?= $value->halaman_buku ?></strong>
                                            </td>
                                            <td>
                                                <strong><?= $value->thn_terbit ?></strong>
                                            </td>
                                            <td>
                                                <strong><?= $value->no_lemari ?></strong>
                                            </td>
                                            <td>
                                                <strong><?= $value->isbn ?></strong>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?= base_url('stok-buku/' . $value->id_buku) ?>" class="btn text-light btn-effect-ripple btn-s btn-info"><i class="fas fa-archive"></i></a>
                                                <?php
                                                $user = $this->session->userdata('server_library');
                                                if ($user['role'] == 'petugas') { ?>
                                                    <a href="<?= base_url('edit-buku/' . $value->id_buku) ?>" class="btn text-light btn-effect-ripple btn-s btn-warning"><i class="fa fa-pen"></i></a>
                                                    <a href="<?= base_url('buku' . '/' . 'del_buku' . '/' . $value->id_buku) ?>" class="btn text-light btn-effect-ripple btn-s btn-danger"><i class="fa fa-trash-alt"></i></a>
                                                <?php } ?>
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
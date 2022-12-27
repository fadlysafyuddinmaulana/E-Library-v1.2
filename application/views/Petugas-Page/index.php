<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <h1 class="m-0 text-dark">Data Petugas</h1>
                </div>
                <div class="ml-auto">
                    <a href="<?= base_url() ?>tambah-petugas" class="btn text-white mb-4 btn-effect-ripple btn-primary"><i class="fas fa-plus"></i> Tambak Petugas</a>
                </div>
                <div class="flash-success" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
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
                            <table id="table-petugas" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="1%">No</th>
                                        <th class="text-center" width="1%"><i class="fa fa-search"></i></th>
                                        <th class="text-center" width="1%">Profil</th>
                                        <th class="text-center" width="15%">Nama</th>
                                        <th class="text-center" width="4%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($petugas as $key => $value) : ?>
                                        <tr>
                                            <td class="text-center" style="vertical-align: middle;">
                                                <?= $no++ ?>
                                            </td>
                                            <td class="text-center" style="vertical-align: middle;">
                                                <a href="<?= base_url('detail-petugas/' . $value->id_petugas) ?>" class="btn text-light btn-effect-ripple btn-s btn-success"><i class="fa fa-search"></i></a>
                                            </td>
                                            <td class="text-center" style="vertical-align: middle;">
                                                <div class="box-profile">
                                                    <?php if ($value->foto_petugas == 'L') {
                                                        $foto = 'L.png';
                                                    } elseif ($value->foto_petugas == 'P') {
                                                        $foto = 'P.png';
                                                    } else {
                                                        $foto = $value->foto_petugas;
                                                    }
                                                    ?>
                                                    <img style="width: 5rem;" src="<?= base_url('assets/server-image' . '/' . 'dokumen-profile-petugas' . '/' . $foto) ?>" alt="<?= $value->foto_petugas; ?>">
                                                </div>
                                            </td>
                                            <td style="vertical-align: middle;">
                                                <strong><?= $value->nama_petugas ?></strong>
                                            </td>
                                            <td class="text-center" style="vertical-align: middle;" qq>
                                                <form action="<?= base_url('clear-photo' . '/' . $value->id_petugas . '/' . $value->foto_petugas) ?>" method="post" enctype="multipart/form-data">

                                                    <?php if ($value->foto_petugas == 'L') { ?>
                                                        <a href="<?= base_url('edit-petugas/' . $value->id_petugas) ?>" class="btn text-light btn-effect-ripple btn-s btn-warning"><i class="fa fa-pen"></i></a>
                                                        <a class="btn text-light btn-effect-ripple btn-s btn-danger" data-toggle="modal" data-target="#delete-modal-<?= $value->id_petugas; ?>"><i class="fa fa-trash-alt"></i></a>
                                                    <?php } elseif ($value->foto_petugas == 'P') { ?>
                                                        <a href="<?= base_url('edit-petugas/' . $value->id_petugas) ?>" class="btn text-light btn-effect-ripple btn-warning"><i class="fa fa-pen"></i></a>
                                                        <a class="btn text-light btn-effect-ripple btn-s btn-danger" data-toggle="modal" data-target="#delete-modal-<?= $value->id_petugas; ?>"><i class="fa fa-trash-alt"></i></a>
                                                    <?php } else { ?>
                                                        <button class="btn text-light btn-effect-ripple btn-info"><i class="far fa-times-circle"></i></button>
                                                        <a href="<?= base_url('edit-petugas/' . $value->id_petugas) ?>" class="btn text-light btn-effect-ripple btn-warning"><i class="fa fa-pen"></i></a>
                                                        <a class="btn text-light btn-effect-ripple btn-s btn-danger" data-toggle="modal" data-target="#delete-modal-<?= $value->id_petugas; ?>"><i class="fa fa-trash-alt"></i></a>
                                                    <?php } ?>

                                                </form>
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

<style>
    .modal {
        position: absolute;
        top: 80px;
        right: 100px;
        bottom: 0;
        left: 50px;
        z-index: 10040;
        overflow: auto;
        overflow-y: auto;
    }
</style>

<?php foreach ($petugas as $row => $value) : ?>
    <div class="modal fade" id="delete-modal-<?= $value->id_petugas; ?>">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pesan Pemberitahuan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('del-petugas/' . $value->id_petugas . '/' . $value->foto_petugas); ?>" enctype="multipart/form-data">
                    <div class="modal-body">
                        <p>Apa anda yakin mau di hapus petugas <?= $value->nama_petugas ?>?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="<?= $value->id_petugas; ?>">
                        <input type="hidden" id="<?= $value->foto_petugas; ?>">
                        <button type="button" class="btn ml-auto btn-default" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary">Confirm</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach; ?>
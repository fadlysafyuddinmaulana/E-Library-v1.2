<form action="<?= base_url() ?>buku/del_stok" id="form-stok" method="POST" enctype="multipart/form-data">
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6 mb-3">
                        <h1 class="m-0 text-dark"><a class="m-0 text-dark" href="<?= base_url() ?>buku"><?= $buku->judul_buku; ?></a></h1>
                    </div>
                    <?php
                    $user = $this->session->userdata('server_library');
                    if ($user['role'] == 'petugas') { ?>
                        <div class="ml-auto">
                            <button type="submit" class="btn btn-delete text-white mb-4 btn-effect-ripple mr-1 btn-danger"><i class="fa fa-trash-alt"></i> Hapus</button>
                            <a href="<?= base_url('tambah-stok/' . $buku->id_buku) ?>" class="btn text-white mb-4 btn-effect-ripple btn-primary"><i class="fas fa-plus"></i> Tambak Stok</a>
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
                                <table id="table-stok" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center" width="5%">No</th>
                                            <?php
                                            $user = $this->session->userdata('server_library');
                                            if ($user['role'] == 'petugas') { ?>
                                                <th class="text-center" width="5%"><input type="checkbox" id="checkall"></th>
                                            <?php } ?>
                                            <th class="text-center">Judul Buku</th>
                                            <th class="text-center" width="15%">No. Buku</th>
                                            <th class="text-center" width="5%">Status</th>
                                            <th class="text-center">Tanggal Rilis</th>
                                            <?php
                                            $user = $this->session->userdata('server_library');
                                            if ($user['role'] == 'petugas') { ?>
                                                <th class="text-center" width="20%">Aksi</th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($stok as $key => $value) : ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?= $no++ ?>
                                                </td>
                                                <?php
                                                $user = $this->session->userdata('server_library');
                                                if ($user['role'] == 'petugas') { ?>
                                                    <td class="text-center">
                                                        <?php if ($value->status == '2') { ?>
                                                            <input type="hidden" name="id_buku" value="<?= $value->id_buku ?>">
                                                            <input type="checkbox" class="checkitem" name="stok[]" value="<?= $value->id_stok ?>">
                                                        <?php } ?>
                                                    </td>
                                                <?php } ?>
                                                <td>
                                                    <strong><?= $value->judul_buku ?></strong>
                                                </td>
                                                <td>
                                                    <strong><?= $value->no_buku ?></strong>
                                                </td>
                                                <td class="text-center">
                                                    <?php if ($value->status == '1') { ?>
                                                        <span class="badge bg-danger">Di Pinjam</span>
                                                    <?php } else { ?>
                                                        <span class="badge bg-success">Tersedia</span>
                                                    <?php } ?>
                                                </td>
                                                <td class="text-center">
                                                    <strong><?= $value->tgl_rilis ?></strong>
                                                </td>
                                                </td>
                                                <?php
                                                $user = $this->session->userdata('server_library');
                                                if ($user['role'] == 'petugas') { ?>
                                                    <td class="text-center">
                                                        <a href="<?= base_url('edit-stok/' . $value->id_stok) ?>" class="btn text-light btn-effect-ripple btn-s btn-warning"><i class="fa fa-pen"></i></a>
                                                    </td>
                                                <?php } ?>
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
</form>


<style>
    .modal {
        position: absolute;
        top: 150px;
        right: 100px;
        bottom: 0;
        left: 50px;
        z-index: 10040;
        overflow: auto;
        overflow-y: auto;
    }
</style>

<?php foreach ($stok as $row => $value) : ?>
    <div class="modal fade" id="delete-modal-<?= $value->id_stok; ?>">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pesan Pemberitahuan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('del-stok/' . $value->id_stok); ?>">
                    <div class="modal-body">
                        <p>Apa anda yakin mau di hapus Stok <?= $value->no_buku; ?>?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_buku" value="<?= $value->id_buku; ?>">
                        <input type="hidden" value="<?= $value->id_stok; ?>">
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
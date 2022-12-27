<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <h1 class="m-0 text-dark">Data Pinjaman Buku</h1>
                </div>
                <?php
                $user = $this->session->userdata('server_library');
                if ($user['role'] == 'petugas') { ?>
                    <div class="ml-auto">
                        <a class="btn text-light btn-effect-ripple btn-s btn-primary" data-toggle="modal" data-target="#add-modal"><i class="fa fa-plus"></i> Rent</a>
                    </div>
                <?php } ?>
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
                            <table id="table-rent" class="table table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="5%">No</th>
                                        <th class="text-center" width="25%">Nama Siswa</th>
                                        <th class="text-center" width="20%">Buku</th>
                                        <th class="text-center" width="20%">Petugas</th>
                                        <th class="text-center" width="8%">Pinjam</th>
                                        <th class="text-center" width="8%">Kembali</th>
                                        <?php
                                        $user = $this->session->userdata('server_library');
                                        if ($user['role'] == 'petugas') { ?>
                                            <th class="text-center" width="20%">Aksi</th>
                                        <?php } ?>
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
                                            <td class="text-center">
                                                <strong><?= $value->tgl_pinjam ?></strong>
                                            </td>
                                            <td class="text-center">
                                                <strong><?= $value->tgl_kembali ?></strong>
                                            </td>
                                            <?php
                                            $user = $this->session->userdata('server_library');
                                            if ($user['role'] == 'petugas') { ?>
                                                <td class="text-center">
                                                    <a href="<?= base_url('edit-rent/' . $value->id_rent) ?>" class="btn text-light btn-effect-ripple btn-s btn-warning"><i class="fa fa-pen"></i></a>
                                                    <?php if ($value->tgl_kembali == null) { ?>
                                                        <a href="<?= base_url('rent/return_book/' . $value->id_rent) ?>" class="btn text-light btn-effect-ripple btn-s btn-success"><i class="fa fa-check"></i></a>
                                                    <?php } ?>
                                                    <?php if ($value->tgl_kembali != null) { ?>
                                                        <a class="btn text-light btn-effect-ripple btn-s btn-danger" data-toggle="modal" data-target="#delete-modal-<?= $value->id_rent ?>"><i class="fa fa-trash-alt"></i></a>
                                                    <?php } ?>
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


<style>
    .modal-delete {
        position: absolute;
        top: 95px;
        right: 100px;
        bottom: 0;
        left: 50px;
        z-index: 10040;
        overflow: auto;
        overflow-y: auto;
    }
</style>

<div class="modal modal-add fade" id="add-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Rental</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url() ?>insert-rent" enctype="multipart/form-data">
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
                            <label>Stok Buku</label>
                            <select class="form-control select2" name="stok" id="stok" style="width: 100%;">
                                <?php foreach ($stok as $key => $value) : ?>
                                    <option value="<?= $value->id_stok; ?>"> <?= $value->no_buku; ?> <?= $value->judul_buku; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php foreach ($rent as $row => $value) : ?>
    <div class="modal modal-delete fade" id="delete-modal-<?= $value->id_rent; ?>">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pesan Pemberitahuan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('rent/del_rent/' . $value->id_rent . '/' . $value->id_stok); ?>">
                    <div class="modal-body">
                        <p>Apa anda yakin mau di hapus?</p>
                        <p>Nama Siswa <?= $value->nama_siswa; ?></p>
                        <p>No:C.<?= $value->no_buku; ?></p>
                        <p>Judul:<?= $value->judul_buku; ?></p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_stok" id="<?= $value->id_stok; ?>">
                        <input type="hidden" id="<?= $value->id_rent; ?>">
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
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <h1 class="m-0 text-dark">Data Kategori</h1>
                </div>
                <div class="ml-auto">
                    <a class="btn text-light btn-effect-ripple btn-s btn-primary" data-toggle="modal" data-target="#add-modal"><i class="fa fa-plus"></i> Tambah Kategori</a>
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
                            <table id="example1" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="5%">No</th>
                                        <th class="text-center">Kategori</th>
                                        <th class="text-center" width="20%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($kategori as $key => $value) : ?>
                                        <tr>
                                            <td class="text-center">
                                                <?= $no++ ?>
                                            </td>
                                            <td>
                                                <strong><?= $value->kategori ?></strong>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?= base_url('edit-kategori/' . $value->id_kategori) ?>" class="btn text-light btn-effect-ripple btn-s btn-warning"><i class="fa fa-pen"></i></a>
                                                <a class="btn text-light btn-effect-ripple btn-s btn-danger" data-toggle="modal" data-target="#delete-modal-<?= $value->id_kategori; ?>"><i class="fa fa-trash-alt"></i></a>
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

<div class="modal fade" id="add-modal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Kategori Buku</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url() ?>insert-kategori" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kategori Buku</label>
                        <input type="text" class="form-control" name="kategori" id="kategori" autocomplete="off" required>
                    </div>
                    <div class=" modal-footer">
                        <button type="button" class="btn ml-auto btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                </div>

            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

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

<?php foreach ($kategori as $row => $value) : ?>
    <div class="modal fade" id="delete-modal-<?= $value->id_kategori; ?>">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pesan Pemberitahuan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('del-kategori/' . $value->id_kategori); ?>">
                    <div class="modal-body">
                        <p>Apa anda yakin mau di hapus kategori <?= $value->kategori; ?>?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="<?= $value->id_kategori; ?>">
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
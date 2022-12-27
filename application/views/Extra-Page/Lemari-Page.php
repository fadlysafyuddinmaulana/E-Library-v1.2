<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <h1 class="m-0 text-dark">Data Lemari</h1>
                </div>
                <div class="ml-auto">
                    <a class="btn text-light btn-effect-ripple btn-s btn-primary" data-toggle="modal" data-target="#add-modal"><i class="fa fa-plus"></i> Tambah Lemari</a>
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
                                        <th class="text-center" width="50%">No Lemari</th>
                                        <th class="text-center" width="10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($lemari as $key => $value) : ?>
                                        <tr>
                                            <td class="text-center">
                                                <?= $no++ ?>
                                            </td>
                                            <td>
                                                <strong>Lemari <?= $value->no_lemari ?></strong>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?= base_url('edit-lemari/' . $value->id_lemari) ?>" class="btn text-light btn-effect-ripple btn-s btn-warning"><i class="fa fa-pen"></i></a>
                                                <a class="btn text-light btn-effect-ripple btn-s btn-danger" data-toggle="modal" data-target="#delete-modal-<?= $value->id_lemari; ?>"><i class="fa fa-trash-alt"></i></a>
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

<div class="modal modal-add fade" id="add-modal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Lemari</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url() ?>insert-lemari" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>No Lemari</label>
                        <input class="form-control" type="text" name="lemari" id="lemari" autocomplete="off">
                        <?= form_error('lemari', '<samll class="text-danger">', '</small>') ?>
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

<?php foreach ($lemari as $row => $value) : ?>
    <div class="modal fade" id="delete-modal-<?= $value->id_lemari; ?>">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pesan Pemberitahuan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('del-lemari/' . $value->id_lemari); ?>">
                    <div class="modal-body">
                        <p>Apa anda yakin mau di hapus nomor lemari <?= $value->no_lemari; ?>?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="<?= $value->id_lemari; ?>">
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
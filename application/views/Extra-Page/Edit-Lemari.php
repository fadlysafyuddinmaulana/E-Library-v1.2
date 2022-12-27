<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Lemari <?= $lemari->no_lemari; ?></h1>
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
                            <h3 class="card-title">Edit Lemari</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" action="<?= base_url() ?>update-lemari" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>No Lemari</label>
                                    <input type="hidden" class="form-control" name="id" id="id" value="<?= $lemari->id_lemari; ?>" autocomplete="off" required>
                                    <input type="text" class="form-control" name="lemari" id="lemari" value="<?= $lemari->no_lemari; ?>" autocomplete="off" required>
                                    <?= form_error('lemari', '<small class="text-danger">', '</small>') ?>
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
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $subtitle ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('collection') ?>">Collection</a></li>
                        <li class="breadcrumb-item active">Edit Collection</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <?= form_open_multipart() ?>
        <div class="row">
            <div class="col-md-6">
                <? //= form_open_multipart('') 
                ?>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Collection Data</h3>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($error)) {
                            echo "ERROR UPLOAD : <br/>";
                            print_r($error);
                            echo "<hr/>";
                        }
                        ?>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="form-group">
                            <label>Category</label>
                            <select id="category_id" name="category_id" class="form-control custom-select" autofocus="TRUE">
                                <option value="" selected disabled>Choose Category</option>
                                <?php foreach ($categories as $c) : ?>
                                    <option <?= set_select('category_id', $c->id) ?> value="<?= $c->id ?>" <?= $collection->category_id == $c->id ? "selected" : "" ?>><?= $c->category_name;  ?></option>
                                <?php endforeach; ?>
                                <option value="newCategory">Define New</option>
                            </select>
                            <?= form_error('category_id', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Collection Date</label>
                            <input type="date" class="form-control" name="collection_date" value="<?= $collection->collection_date ?>">
                            <?= form_error('collection_date', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Collection Name</label>
                            <input type="text" class="form-control" name="collection_name" value="<?= $collection->collection_name ?>">
                            <?= form_error('collection_name', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select id="collection_status" name="collection_status" class="form-control custom-select">
                                <option value="1" <?= $collection->collection_status == 1 ? "selected" : "" ?>>Active</option>
                                <option value="0" <?= $collection->collection_status == 0 ? "selected" : "" ?>>Inactive</option>
                            </select>
                            <?= form_error('collection_status', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-6">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Files</h3>
                    </div>
                    <div class="card-body">
                        <?= $this->session->flashdata('file'); ?>
                        <div class="form-group">
                            <table width=100% id="documents" class="table table-borderless">
                                <tbody>
                                    <?php foreach ($attachments as $att) : ?>
                                        <tr>
                                            <td width=5% class="align-middle">
                                                <div class="col-sm-12" style="text-align: left;">
                                                    <a href="<?= base_url('collection/deleteFile/' . $att->collection_id . '/' . $att->id) ?>" class="del btn btn-danger" onclick="return confirm('Are you sure to delete this file?')"><i class="fas fa-minus"></i></a>
                                                </div>
                                            </td>
                                            <td width=95% class="align-middle">
                                                <div class="col-sm-10">
                                                    <div class="custom-file">
                                                        <div class="text-secondary">
                                                            <a href="<?= base_url('uploads/' . $collection->slug . '/' . $att->collection_file) ?>" class="btn-link text-secondary" target="_blank"><?= $att->collection_file ?></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <label>Upload File <small class="text-danger pl-3">.pdf,.doc,.docx,.xls,.xlsx,.jpg,.jpeg,.png</small></label>
                            <div class="custom-file">
                                <div class="input-group">
                                    <input type="file" name="collection_files[]" multiple>
                                </div>
                                <input type="hidden" class="form-control" name="upload_date" value="<?php echo date("Y-m-d"); ?>">
                            </div>
                        </div>
                        <input type="submit" value="Update" class="btn btn-success float-right" />
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
</div>
<?= form_close() ?>
</section>
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="newManufactureModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Manufacture</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-text="true">&times;</span>
                </button>
            </div>
            <?= form_open('manufacture/addFromCollection') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="inputName">Manufacture</label>
                    <input type="text" class="form-control judul" name="manufacture" required>
                </div>
                <div class="form-group">
                    <label for="inputName">Slug</label>
                    <input type="text" class="form-control preview_slug" name="slug" required>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?= form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="newUnittypeModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Unit Type</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('unit_type/addFromCollection') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="inputName">Unit Type</label>
                    <input type="text" class="form-control" name="unit_type" required>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?= form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="newCollectiontypeModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Collection Type</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('collection_type/addFromCollection') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="inputName">Collection Type</label>
                    <input type="text" class="form-control judul" name="collection_type" autofocus="TRUE" required>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?= form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script src="<?= base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>
<script type="text/javascript">
    var count = 0;
    $(function() {
        $("#addRow").click(function() {
            count += 1;
            row = ` <tr>
                        <td width=5%>
                            <div class="col-sm-12" style="text-align: left;">
                                <button type="button" class="del btn btn-danger"><i class="fas fa-minus"></i></button>
                            </div>
                        </td>
                        <td width=95%>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <div class="input-group">
                                    <input type="file" name="collection_file_` + count + `" required>
                                    </div>
                                    <input type="hidden" class="form-control" name="upload_date_` + count + `" value="<?php echo date("Y-m-d"); ?>">
                                    <input type="hidden" id="rows_` + count + `" name="rows[]" value="` + count + `" >
                                </div>
                            </div>
                        </td>
                    </tr>`;
            $(row).insertBefore("#last");
        });
    });
    $("table").on('click', '.del', function() {
        $(this).closest('tr').remove()
    });
</script>
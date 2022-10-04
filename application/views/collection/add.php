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
                        <li class="breadcrumb-item active">Add Collection</li>
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
                            <input type="hidden" name="id" value="<?= $this->uuid->v4(); ?>">
                            <label>Category</label>
                            <select id="category_id" name="category_id" class="form-control custom-select" autofocus="TRUE">
                                <option value="" selected disabled>Choose Category</option>
                                <?php foreach ($categories as $c) : ?>
                                    <option <?= set_select('category_id', $c->id) ?> value="<?= $c->id ?>"><?= $c->category_name;  ?></option>
                                <?php endforeach; ?>
                                <option value="newCategory">Define New</option>
                            </select>
                            <?= form_error('category_id', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Collection Date</label>
                            <input type="date" class="form-control" name="collection_date" value="<?= set_value('collection_date') ?>">
                            <?= form_error('collection_date', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Collection Name</label>
                            <input type="text" class="form-control" name="collection_name" value="<?= set_value('collection_name') ?>">
                            <?= form_error('collection_name', '<small class="text-danger">', '</small>'); ?>
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
                        <div class="form-group">
                            <table width=100% id="documents" cellpadding="5px">
                                <tbody>
                                    <tr>
                                        <td width=5%>
                                            <div class="col-sm-12" style="text-align: left;">
                                                <button type="button" id="addRow" class="btn btn-primary"><i class="fas fa-plus"></i></button>
                                            </div>
                                        </td>
                                        <td width=95%>
                                            <label for="name" class="col-sm-12 col-form-label">Upload File <small class="text-danger pl-3">.pdf file only</small></label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width=5%>
                                            <div class="col-sm-12" style="text-align: left;">
                                                <button type="button" class="del btn btn-danger"><i class="fas fa-minus"></i></button>
                                            </div>
                                        </td>
                                        <td width=95%>
                                            <div class="col-sm-10">
                                                <div class="custom-file">
                                                    <div class="input-group">
                                                        <input type="file" name="collection_file_0" multiple required>
                                                    </div>
                                                    <input type="hidden" class="form-control" name="upload_date_0" value="<?php echo date("Y-m-d"); ?>">
                                                    <input type="hidden" id="rows_0" name="rows[]" value="0">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr id="last"></tr>
                                </tbody>
                            </table>
                            <input type="submit" value="Save" class="btn btn-success float-right" />
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

<div class="modal fade" id="newCategoryModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-text="true">&times;</span>
                </button>
            </div>
            <?= form_open('category/addFromCollection') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="inputName">Category</label>
                    <input type="text" class="form-control judul" name="category_name" required>
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
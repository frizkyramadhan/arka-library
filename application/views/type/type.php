    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><?= $subtitle; ?></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                            <li class="breadcrumb-item active">Type</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Type Table</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="text-left">
                        <a href="" class="mb-3 btn bg-warning" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> Add Type</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped table-condensed">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Type Name</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($type as $row) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $row->type_name; ?></td>
                                    <td>
                                        <?php if ($row->type_status == 1) : ?>
                                            <span class="badge bg-success">Active</span>
                                        <?php else : ?>
                                            <span class="badge bg-danger">Inactive</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div align="center">
                                            <a href="<?php echo base_url('type/edit/' . $row->id); ?>" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-default-<?= $row->id ?>" title="Edit"><i class="fa fa-edit"></i></a>
                                            <a href="<?php echo base_url('type/delete/' . $row->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you want to delete this type?')" title="Delete"><i class="fa fa-trash-alt"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Type</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open('type/add') ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputName">Type</label>
                        <input type="text" class="form-control judul" name="type_name" required>
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

    <?php foreach ($type as $row) : ?>
        <div class="modal fade" id="modal-default-<?= $row->id ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Type</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?= form_open('type/edit/' . $row->id) ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputName">Type</label>
                            <input type="text" class="form-control judul" name="type_name" value="<?= $row->type_name ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="inputStatus">Status</label>
                            <select id="inputStatus" class="form-control custom-select" name="type_status">
                                <option value="1" <?= $row->type_status == 1 ? 'selected' : '' ?>>Active</option>
                                <option value="0" <?= $row->type_status == 0 ? 'selected' : '' ?>>Inactive</option>
                            </select>
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
    <?php endforeach; ?>
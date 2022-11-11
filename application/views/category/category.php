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
                            <li class="breadcrumb-item active">Category</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Category Table</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="text-left">
                        <a href="" class="mb-3 btn bg-success" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> Add Category</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped table-condensed">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Category Name</th>
                                <th>Slug</th>
                                <th>Department</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($category as $row) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $row->category_name; ?></td>
                                    <td><?= $row->slug; ?></td>
                                    <td><?= $row->department_name; ?></td>
                                    <td>
                                        <?php if ($row->category_status == 1) : ?>
                                            <span class="badge bg-success">Active</span>
                                        <?php else : ?>
                                            <span class="badge bg-danger">Inactive</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div align="center">
                                            <a href="<?php echo base_url('category/subcategory/' . $row->id); ?>" class="btn btn-warning btn-sm" title="Subcategory"><i class="fas fa-sign-in-alt"></i></a>
                                            <a href="<?php echo base_url('category/edit/' . $row->id); ?>" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-default-<?= $row->id ?>" title="Edit"><i class="fa fa-edit"></i></a>
                                            <a href="<?php echo base_url('category/delete/' . $row->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you want to delete this category?')" title="Delete"><i class="fa fa-trash-alt"></i></a>
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
                    <h4 class="modal-title">Add Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open('category/add') ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputName">Category</label>
                        <input type="text" class="form-control judul" name="category_name" required>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Slug</label>
                        <input type="text" class="form-control preview_slug" name="slug" required>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Department</label>
                        <select id="department_id" name="department_id" class="form-control custom-select" required>
                            <?php if ($getSession->level == 'admin') : ?>
                                <option value="" selected disabled>Choose Department</option>
                                <?php foreach ($departments as $d) : ?>
                                    <option <?= set_select('department_id', $d->id) ?> value="<?= $d->id ?>"><?= $d->department_name;  ?></option>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <option value="" selected disabled>Choose Department</option>
                                <?php foreach ($departments as $d) : ?>
                                    <option <?= set_select('department_id', $d->id) ?> value="<?= $d->id ?>" <?= $getSession->department_id == $d->id ? 'selected' : 'disabled' ?>><?= $d->department_name;  ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
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

    <?php foreach ($category as $row) : ?>
        <div class="modal fade" id="modal-default-<?= $row->id ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Category</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?= form_open('category/edit/' . $row->id) ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputName">Category</label>
                            <input type="text" class="form-control judul" name="category_name" value="<?= $row->category_name ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="inputName">Slug</label>
                            <input type="text" class="form-control preview_slug" name="slug" value="<?= $row->slug ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="inputName">Department</label>
                            <select id="department_id" name="department_id" class="form-control custom-select" required>
                                <?php if ($getSession->level == 'admin') : ?>
                                    <option value="" selected disabled>Choose Department</option>
                                    <?php foreach ($departments as $d) : ?>
                                        <option <?= set_select('department_id', $d->id) ?> value="<?= $d->id ?>" <?= $row->department_id == $d->id ? "selected" : "" ?>><?= $d->department_name;  ?></option>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <option value="" selected disabled>Choose Department</option>
                                    <?php foreach ($departments as $d) : ?>
                                        <option <?= set_select('department_id', $d->id) ?> value="<?= $d->id ?>" <?= $getSession->department_id == $d->id ? "selected" : "disabled" ?>><?= $d->department_name;  ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputStatus">Status</label>
                            <select id="inputStatus" class="form-control custom-select" name="category_status">
                                <option value="1" <?= $row->category_status == 1 ? 'selected' : '' ?>>Active</option>
                                <option value="0" <?= $row->category_status == 0 ? 'selected' : '' ?>>Inactive</option>
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
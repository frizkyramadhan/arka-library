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
                            <li class="breadcrumb-item active">User</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">User Table</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="text-left">
                        <a href="" class="mb-3 btn btn-info" data-toggle="modal" data-target="#modal-default"><i class="fa fa-plus"></i> Add User</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped table-condensed">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>NIK</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($user as $row) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $row->nik; ?></td>
                                    <td><?= $row->name; ?></td>
                                    <td><?= $row->department_name; ?></td>
                                    <td><?= $row->level; ?></td>
                                    <td>
                                        <?php if ($row->user_status == 1) : ?>
                                            <span class="badge bg-success">Active</span>
                                        <?php else : ?>
                                            <span class="badge bg-danger">Inactive</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div align="center">
                                            <a href="<?php echo base_url('user/edit/' . $row->id); ?>" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-default-<?= $row->id ?>" title="Edit"><i class="fa fa-edit"></i></a>
                                            <a href="<?php echo base_url('user/delete/' . $row->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you want to delete this user?')" title="Delete"><i class="fa fa-trash-alt"></i></a>
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
                    <h4 class="modal-title">Add User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open('user/add') ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="inputName">NIK</label>
                        <input type="text" class="form-control" name="nik" required>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="inputName">Department</label>
                        <select id="department_id" name="department_id" class="form-control custom-select" autofocus="TRUE">
                            <option value="" selected disabled>Choose Department</option>
                            <?php foreach ($departments as $d) : ?>
                                <option <?= set_select('department_id', $d->id) ?> value="<?= $d->id ?>"><?= $d->department_name;  ?></option>
                            <?php endforeach; ?>
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

    <?php foreach ($user as $row) : ?>
        <div class="modal fade" id="modal-default-<?= $row->id ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?= form_open('user/edit/' . $row->id) ?>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputName">NIK</label>
                            <input type="text" class="form-control" name="nik" value="<?= $row->nik ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="inputName">Name</label>
                            <input type="text" class="form-control" name="name" value="<?= $row->name ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="inputName">Password</label>
                            <input type="password" class="form-control" name="password" value="<?= $row->password ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="inputName">Department</label>
                            <select id="department_id" name="department_id" class="form-control custom-select" autofocus="TRUE">
                                <option value="" selected disabled>Choose Department</option>
                                <?php foreach ($departments as $d) : ?>
                                    <option <?= set_select('department_id', $d->id) ?> value="<?= $d->id ?>" <?= $row->department_id == $d->id ? "selected" : "" ?>><?= $d->department_name;  ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputStatus">Status</label>
                            <select id="inputStatus" class="form-control custom-select" name="user_status">
                                <option value="1" <?= $row->user_status == 1 ? 'selected' : '' ?>>Active</option>
                                <option value="0" <?= $row->user_status == 0 ? 'selected' : '' ?>>Inactive</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputStatus">Level</label>
                            <select id="inputStatus" class="form-control custom-select" name="level">
                                <option value="user" <?= $row->level == 'user' ? 'selected' : '' ?>>User</option>
                                <option value="superuser" <?= $row->level == 'superuser' ? 'selected' : '' ?>>Super User</option>
                                <option value="admin" <?= $row->level == 'admin' ? 'selected' : '' ?>>Administrator</option>
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
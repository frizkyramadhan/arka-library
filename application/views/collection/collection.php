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
                            <li class="breadcrumb-item active">Collection</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title">Collection Table</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="text-left">
                        <a href="<?= base_url('collection/add') ?>" class="mb-3 btn btn-secondary"><i class="fa fa-plus"></i> Add Collection</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped table-condensed">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Date</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($collection as $row) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $row->collection_date; ?></td>
                                    <td><?= $row->category_name; ?></td>
                                    <td><?= $row->collection_name; ?></td>
                                    <td><?= $row->type_name; ?></td>
                                    <td>
                                        <?php if ($row->collection_status == 1) : ?>
                                            <span class="badge bg-success">Active</span>
                                        <?php else : ?>
                                            <span class="badge bg-danger">Inactive</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div align="center">
                                            <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-default-<?= $row->id ?>" title="Detail"><i class="fa fa-info-circle"></i></a>
                                            <a href="<?php echo base_url('collection/edit/' . $row->id); ?>" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                                            <a href="<?php echo base_url('collection/delete/' . $row->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you want to delete this collection?')" title="Delete"><i class="fa fa-trash-alt"></i></a>
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

    <?php foreach ($collection as $row) : ?>
        <div class="modal fade" id="modal-default-<?= $row->id ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Collection Details</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="text-muted">
                            <p>Date
                                <b class="d-block"><?= $row->collection_date ?></b>
                            </p>
                            <p>Category
                                <b class="d-block"><?= $row->category_name ?></b>
                            </p>
                            <p>Collection Name
                                <b class="d-block"><?= $row->collection_name ?></b>
                            </p>
                            <p>Collection Type
                                <b class="d-block"><?= $row->type_name ?></b>
                            </p>
                            <p>Upload By
                                <b class="d-block"><?= $row->name ?></b>
                            </p>
                            <h5 class="mt-3 text-muted">Collection Files</h5>
                            <ul class="list-unstyled">
                                <?php
                                $query = $this->db->query("select * from attachments where collection_id = '$row->id' ")->result();
                                foreach ($query as $q) {
                                    echo '<li>';
                                    echo '<a href="' . base_url('uploads/' . $row->slug . '/' . $q->collection_file) . '" class="btn-link text-secondary" target="_blank"><i class="far fa-fw fa-file-pdf"></i> ' . $q->collection_file . '</a>';
                                    echo '</li>';
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <a href="<?php echo base_url('collection/edit/' . $row->id); ?>" class="btn btn-success">Edit</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    <?php endforeach; ?>
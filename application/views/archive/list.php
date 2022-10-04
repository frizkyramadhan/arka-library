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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active"><?= $category->category_name ?></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12" id="accordion">
                    <div class="card card-primary card-outline">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                            <div class="card-header">
                                <h4 class="card-title w-100">
                                    Filter
                                </h4>
                            </div>
                        </a>
                        <div id="collapseOne" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>From</label>
                                                <input name="date1" class="form-control" type="date" value="<?= @$post['date1'] ?>" />
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>To</label>
                                                <input name="date2" class="form-control" type="date" value="<?= @$post['date2'] ?>" />
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Collection Name</label>
                                                <input name="collection_name" class="form-control" type="text" value="<?= @$post['collection_name'] ?>" />
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Collection File</label>
                                                <input name="collection_file" class="form-control" type="text" value="<?= @$post['collection_file'] ?>" />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group" align="right">
                                                <button type="submit" name="filter" class="btn btn-primary">
                                                    <i class="fa fa-search"></i> Filter
                                                </button>
                                                <button type="submit" name="reset" class="btn btn-secondary">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><?= $category->category_name ?> - Archive Table</h3>
                            <div class="card-tools">
                                <ul class="pagination pagination-sm float-left mr-2">
                                    <?= $pagination ?>
                                </ul>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-sm table-hover text-nowrap" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Collection Date</th>
                                        <th>Collection Name</th>
                                        <th width="50%">Files</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($row->result())) : ?>
                                        <td colspan="5">
                                            <div align="center">No Data Available</div>
                                        </td>
                                    <?php else : ?>
                                        <?php $no = $this->uri->segment(4) ? $this->uri->segment(4) + 1 : 1; ?>
                                        <?php foreach ($row->result() as $key => $data) : ?>
                                            <tr>
                                                <td style="width:5%;"><?= $no++ ?>.</td>
                                                <td><?= $data->collection_date ?></td>
                                                <td><?= $data->collection_name ?></td>
                                                <td>
                                                    <ul class="list-unstyled">
                                                        <?php
                                                        $query = $this->db->query("select * from attachments where collection_id = '$data->id' ")->result();
                                                        foreach ($query as $q) {
                                                            echo '<li>';
                                                            echo '<a href="' . base_url('uploads/' . $data->slug . '/' . $q->collection_file) . '" class="btn-link text-secondary" target="_blank"><i class="far fa-fw fa-file-pdf"></i> ' . $q->collection_file . '</a>';
                                                            echo '</li>';
                                                        }
                                                        ?>
                                                    </ul>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
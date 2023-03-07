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
                <li class="breadcrumb-item active">User Summary</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12" id="accordion">
            <div class="card card-primary card-outline">
              <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                <div class="card-header">
                  <h4 class="card-title w-100">
                    <b>Filter</b>
                  </h4>
                </div>
              </a>
              <div id="collapseOne" class="collapse" data-parent="#accordion">
                <div class="card-body">
                  <!-- <?= var_dump($post); ?> -->
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
                          <label>Collection File</label>
                          <input name="collection_file" class="form-control" type="text" value="<?= @$post['collection_file'] ?>" />
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label>Collection Name</label>
                          <input name="collection_name" class="form-control" type="text" value="<?= @$post['collection_name'] ?>" />
                        </div>
                      </div>
                      <div class="col-lg-12 text-right">
                        <div class="form-group">
                          <!-- <label>&nbsp;</label><br> -->
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
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title"><?= $user->name ?> - Collections</h3>
            <div class="card-tools">
              <ul class="pagination pagination-sm float-left mr-2">
                <?= $pagination ?>
              </ul>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
            <?= $this->session->flashdata('error'); ?>
            <?= $this->session->flashdata('file'); ?>
            <div class="row justify-content-between">
              <div class="col-6">
                <div class="text-left">
                  <!-- <a href="" class="mb-3 btn btn-success" data-toggle="modal" data-target="#modal-default"><i class="fa fa-upload"></i> Upload</a> -->
                </div>
              </div>
              <div class="col-6">
                <div class="text-right">
                  <a href="<?php echo base_url('dashboard') ?>" class="mb-3 btn bg-warning"><i class="fas fa-undo-alt"></i></i> Back</a>
                </div>
              </div>
            </div>
            <!-- <?php echo "<pre>";
                  print_r($query);
                  echo "</pre>" ?> -->
            <div class="table-responsive">
              <table class="table table-sm table-bordered table-condensed">
                <thead>
                  <tr class="table-active">
                    <th class="align-middle" width="5%">No</th>
                    <th class="align-middle">Collection File</th>
                    <th class="align-middle">Collection Name</th>
                    <th class="align-middle" width="10%">Upload Date</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php if (empty($attachment_list->result())) : ?>
                      <td colspan="4">
                        <div align="center">No Data Available</div>
                      </td>
                    <?php else : ?>
                      <?php $i = 1; ?>
                      <?php foreach ($attachment_list->result() as $key => $row) : ?>
                        <td class="align-middle text-right"><?= $i++; ?></td>
                        <td class="align-middle"><a href="<?= base_url('uploads/' . $row->department_code . '/' . $row->slug . '/' . $row->subcategory_id . '/' . $row->collection_file) ?>"><?= $row->collection_file; ?></a></td>
                        <td class="align-middle"><?= $row->category_name; ?>/<?= $row->subcategory_name; ?>/<?= $row->collection_name; ?></td>
                        <td class="align-middle"><?= date('d-m-Y', strtotime($row->upload_date)); ?></td>
                  </tr>
                <?php endforeach; ?>
              <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
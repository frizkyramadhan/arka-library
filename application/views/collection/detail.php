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
                          <input name="date1" class="form-control" type="month" value="<?= @$post['date1'] == null ? null : date('Y-m', strtotime($post['date1'])) ?>" />
                        </div>
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label>To</label>
                          <input name="date2" class="form-control" type="month" value="<?= @$post['date2'] == null ? null : date('Y-m', strtotime($post['date2'])) ?>" />
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
                          <label>Upload By</label>
                          <input name="name" class="form-control" type="text" value="<?= @$post['name'] ?>" />
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
            <h3 class="card-title"><?= $subcategory->subcategory_name ?> - Collections</h3>
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
                  <a href="" class="mb-3 btn btn-success" data-toggle="modal" data-target="#modal-default"><i class="fa fa-upload"></i> Upload</a>
                </div>
              </div>
              <div class="col-6">
                <div class="text-right">
                  <a href="<?php echo base_url('collection/' . $subcategory->slug) ?>" class="mb-3 btn bg-warning"><i class="fas fa-undo-alt"></i></i> Back</a>
                </div>
              </div>
            </div>
            <!-- <?php echo "<pre>";
                  print_r($query);
                  echo "</pre>" ?> -->
            <div class="table-responsive">
              <table id="example1" class="table table-sm table-bordered table-striped table-condensed">
                <thead>
                  <tr>
                    <th class="align-middle" width="5%">No.</th>
                    <th class="align-middle" width="10%">Periode</th>
                    <th class="align-middle">Collection Name</th>
                    <th class="align-middle" width="10%">Upload By</th>
                    <th class="align-middle" width="10%">Status</th>
                    <th class="align-middle text-center" width="10%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (empty($collection_list->result())) : ?>
                    <td colspan="6">
                      <div align="center">No Data Available</div>
                    </td>
                  <?php else : ?>
                    <?php $no = $this->uri->segment(4) ? $this->uri->segment(4) + 1 : 1; ?>
                    <?php foreach ($collection_list->result() as $key => $row) : ?>
                      <tr>
                        <td class="align-middle text-center"><?= $no++ ?></td>
                        <td class="align-middle"><?= date('M-Y', strtotime($row->collection_date)); ?></td>
                        <td class="align-middle text-bold"><?= $row->collection_name; ?></td>
                        <td class="align-middle"><?= $row->name; ?></td>
                        <td class="align-middle">
                          <?php if ($row->collection_status == 1) : ?>
                            <span class="badge bg-success">Active</span>
                          <?php else : ?>
                            <span class="badge bg-danger">Inactive</span>
                          <?php endif; ?>
                        </td>
                        <td class="align-middle">
                          <div align="center">
                            <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-default-<?= $row->id ?>" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="<?php echo base_url('collection/delete/' . $row->subcategory_id . '/' . $row->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this collection and all its files?')" title="Delete"><i class="fa fa-trash-alt"></i></a>
                          </div>
                        </td>
                      </tr>
                      <?php $files = $this->db->query("select * from attachments where collection_id = '$row->id' order by id desc ")->result(); ?>
                      <?php if ($files) : ?>
                        <tr>
                          <th></th>
                          <th colspan="3">Files</th>
                          <th class="text-center">Upload Date</th>
                          <th class="text-center">Delete File?</th>
                        </tr>
                        <?php foreach ($files as $file) : ?>
                          <td></td>
                          <td colspan="3"><?php echo '<a href="' . base_url('uploads/' . $row->department_code . '/' . $row->slug . '/' . $row->subcategory_id . '/' . $file->collection_file) . '" class="btn-link text-secondary" target="_blank"><i class="far fa-file-alt"></i> ' . $file->collection_file . '</a>'; ?></td>
                          <td><?php echo $file->upload_date; ?></td>
                          <td class="text-center"><a href="<?php echo base_url('collection/deleteFile/' . $row->subcategory_id . '/' . $file->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this collection?')" title="Delete"><i class="fas fa-unlink"></i></a></td>
                          </tr>
                        <?php endforeach; ?>
                      <?php endif; ?>
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

    <!-- add subcategory -->
    <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Add Collection for <?= $subcategory->subcategory_name ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?= form_open_multipart('collection/add/' . $subcategory->id) ?>
          <!-- <input type="hidden" name="id" value="<?= $this->uuid->v4(); ?>"> -->
          <input type="hidden" name="subcategory_id" value="<?= $subcategory->id; ?>">
          <div class="modal-body">
            <div class="form-group">
              <label for="inputName">Periode</label>
              <input type="month" class="form-control" name="collection_date" required>
            </div>
            <div class="form-group">
              <label for="inputName">Collection Name</label>
              <input type="text" class="form-control" name="collection_name" required>
            </div>
            <div class="form-group">
              <label>Upload File <small class="text-danger pl-3">.pdf,.doc,.docx,.xls,.xlsx,.jpg,.jpeg,.png,.rar,.zip</small></label>
              <div class="custom-file">
                <div class="input-group">
                  <input type="file" name="collection_files[]" multiple>
                </div>
                <input type="hidden" class="form-control" name="upload_date" value="<?php echo date("Y-m-d"); ?>">
              </div>
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


    <?php foreach ($collection_list->result() as $key => $row) : ?>
      <div class="modal fade" id="modal-default-<?= $row->id ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <?= form_open_multipart('collection/edit/' . $subcategory->id . '/' . $row->id) ?>
            <div class="modal-header">
              <h4 class="modal-title">Edit Collection for <?= $subcategory->subcategory_name ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <input type="hidden" name="subcategory_id" value="<?= $subcategory->id; ?>">
            <div class="modal-body">
              <div class="form-group">
                <label for="inputName">Periode</label>
                <input type="month" class="form-control" name="collection_date" value="<?= date('Y-m', strtotime($row->collection_date)) ?>" required>
              </div>
              <div class="form-group">
                <label for="inputName">Collection Name</label>
                <input type="text" class="form-control" name="collection_name" value="<?= $row->collection_name ?>" required>
              </div>
              <div class="form-group">
                <label for="inputName">Status</label>
                <select id="collection_status" name="collection_status" class="form-control custom-select" required>
                  <option value="1" <?= $row->collection_status == 1 ? 'selected' : '' ?>>Active</option>
                  <option value="0" <?= $row->collection_status == 0 ? 'selected' : '' ?>>Inactive</option>
                </select>
              </div>
              <div class="form-group">
                <label>Upload File <small class="text-danger pl-3">.pdf,.doc,.docx,.xls,.xlsx,.jpg,.jpeg,.png,.rar,.zip</small></label>
                <div class="custom-file">
                  <div class="input-group">
                    <input type="file" name="collection_files[]" multiple>
                  </div>
                  <input type="hidden" class="form-control" name="upload_date" value="<?php echo date("Y-m-d"); ?>">
                </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </div>
          <?= form_close() ?>
        </div>
      </div>
    <?php endforeach; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h1><?= $subtitle ?></h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- Main content -->
      <section class="content">
        <blockquote class="text-center">
          <h3>Welcome to ARKA Library.</h3>
          <small>Aplikasi ini berisi koleksi-koleksi dokumen <b>setiap Divisi / Departemen</b> yang bersifat <b>umum</b>.</small>
        </blockquote>
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>
                    <?php
                    $query = $this->db->query('SELECT * FROM collections WHERE collection_status = "1" AND department_id = "' . $dept_id . '"');
                    echo $query->num_rows();
                    ?>
                  </h3>
                  <p>Collections</p>
                </div>
                <div class="icon">
                  <i class="fas fa-book"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>
                    <?php
                    $query = $this->db->query('SELECT * FROM attachments JOIN collections ON attachments.collection_id = collections.id WHERE collections.collection_status = "1" AND collections.department_id = "' . $dept_id . '"');
                    echo $query->num_rows();
                    ?>
                  </h3>
                  <p>Files</p>
                </div>
                <div class="icon">
                  <i class="far fa-file-alt"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>
                    <?php
                    $query = $this->db->query('SELECT * FROM categories WHERE category_status = "1" AND department_id = "' . $dept_id . '"');
                    echo $query->num_rows();
                    ?>
                  </h3>
                  <p>Categories</p>
                </div>
                <div class="icon">
                  <i class="far fa-folder-open"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>
                    <?php
                    $query = $this->db->query('SELECT * FROM users WHERE user_status = "1" and department_id = "' . $dept_id . '"');
                    echo $query->num_rows();
                    ?>
                  </h3>
                  <p>Users</p>
                </div>
                <div class="icon">
                  <i class="far fa-user"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-md-12">
              <!-- Welcome Message -->
              <div class="card card-danger">
                <div class="card-header">
                  <h3 class="card-title">Quick Search</h3>
                </div>
                <div class="card-body">
                  <form action="<?= base_url('dashboard/search') ?>" method="post">
                    <div class="input-group">
                      <input type="text" name="search" class="form-control" placeholder="Search by Collection Name">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-danger"><i class="fas fa-search"></i></button>
                      </div>
                    </div>
                  </form>
                  <table class="table table-sm table-hover">
                    <tr>
                      <th width="5%">No</th>
                      <th width="40%">Collection Name</th>
                      <th width="35%">Path</th>
                      <th></th>
                    </tr>
                    <tr>
                      <?php if (empty($doclist)) : ?>
                        <td colspan="4">
                          <div align="center">No Data Available</div>
                        </td>
                      <?php else : ?>
                        <?php $i = 1; ?>
                        <?php foreach ($doclist as $row) : ?>
                          <td><?= $i++; ?></td>
                          <td><?= $row->collection_name; ?></td>
                          <td><a href="<?= base_url('collection/' . $row->slug) ?>"><?= $row->category_name; ?></a> / <a href="<?= base_url('collection/detail/' . $row->subcategory_id) ?>"><?= $row->subcategory_name ?></a></td>
                          <td></td>
                    </tr>
                    <?php $files = $this->db->query("select attachments.*, users.name from attachments left join users on attachments.upload_by = users.id where collection_id = '$row->collection_id' order by collection_id desc ")->result(); ?>
                    <?php if ($files) : ?>
                      <tr class="table-active">
                        <th></th>
                        <th>Files</th>
                        <th>Upload By</th>
                        <th class="text-right">Upload Date</th>
                      </tr>
                      <?php foreach ($files as $file) : ?>
                        <td></td>
                        <td><?php echo '<a href="' . base_url('uploads/' . $row->department_code . '/' . $row->slug . '/' . $row->subcategory_id . '/' . $file->collection_file) . '" class="btn-link text-secondary" target="_blank"><i class="far fa-file-alt"></i> ' . $file->collection_file . '</a>'; ?></td>
                        <td><?php echo $file->name; ?></td>
                        <td class="text-right"><?= date('d F Y', strtotime($file->upload_date)); ?></td>
                        </tr>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  <?php endforeach; ?>
                <?php endif; ?>
                  </table>
                  <?php echo $this->pagination->create_links(); ?>
                </div>
                <!-- /.card-body -->
              </div>
            </div>
          </div>
          <!-- /.card -->

          <div class="row">
            <div class="col-md-6">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Total Files per Departments</h3>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="example2" class="table table-sm table-hover">
                      <thead>
                        <tr>
                          <th>Departments</th>
                          <th>Count</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <?php foreach ($total as $t) : ?>
                            <td><?= $t->department_name ?></td>
                            <td style="text-align:right"><?= $t->count ?></td>
                        </tr>
                      <?php endforeach; ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th style="text-align:left">Total:</th>
                          <th style="text-align:right"></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
            </div>
            <div class="col-md-6">
              <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Total Files per Users</h3>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="example3" class="table table-sm table-hover">
                      <thead>
                        <tr>
                          <th>Users</th>
                          <th>Count</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <?php foreach ($total_per_user as $t) : ?>
                            <td><a href="<?= base_url('dashboard/users/' . $t->id) ?>"><?= $t->name ?></a></td>
                            <td style="text-align:right"><?= $t->count ?></td>
                        </tr>
                      <?php endforeach; ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th style="text-align:left">Total:</th>
                          <th style="text-align:right"></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <!-- PRODUCT LIST -->
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Top 10 New Collections</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <ul class="products-list product-list-in-card pl-2 pr-2">
                    <?php foreach ($recent as $row) : ?>
                      <li>
                        <div class="p-2">
                          <span class="text-info"><b><?= $row->collection_name ?></b></span>
                          <span class="badge badge-info float-right"><?= $row->upload_date ?></span>
                          <a href="<?= base_url('uploads/' . $row->department_code . '/' . $row->slug . '/' . $row->subcategory_id . '/' . $row->collection_file) ?>" class="product-title" target="blank"><span class="product-description">
                              <?= $row->collection_file ?>
                            </span></a>
                        </div>
                      </li>
                    <?php endforeach ?>
                  </ul>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                  <a href="<?= base_url('dashboard/sitemap') ?>" class="uppercase">View All Collections</a>
                </div>
                <!-- /.card-footer -->
              </div>
              <!-- /.card -->
            </div>

            <!-- /.col (LEFT) -->
            <div class="col-md-8">
              <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title">Files Amount by Categories</h3>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <select onchange="updateChartCollection(this)" class="custom-select form-control-border">
                      <!-- <option value="">-- Choose Category --</option> -->
                      <?php foreach ($category_list as $category) : ?>
                        <option value="<?= $category->id ?>"><?= $category->category_name ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                  <canvas id="myChart" style="min-height: 300px; height: 350px; max-height: 400px; max-width: 100%;"></canvas>
                </div>
              </div>
            </div>
          </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
      <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
        <i class="fas fa-chevron-up"></i>
      </a>
    </div>
    <!-- /.content-wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
    <!-- ChartJS -->
    <script src="<?= base_url('assets/plugins/chart.js/dist/chart.js') ?>"></script>
    <!-- Page specific script -->
    <script>
      // setup 
      const collectionValues = [
        <?php foreach ($chart as $c) : ?> {
            y: {
              <?= $c->id ?>: '<?= $c->subcategory_name ?>'
            },
            x: {
              <?= $c->id ?>: <?= $c->count ?>,
            }
          },
        <?php endforeach ?>
      ]
      // console.log(collectionValues)

      var backgroundcolor = [];
      var bordercolor = [];
      for (i = 0; i < collectionValues.length; i++) {
        var r = Math.floor(Math.random() * 255);
        var g = Math.floor(Math.random() * 255);
        var b = Math.floor(Math.random() * 255);
        backgroundcolor.push('rgba(' + r + ', ' + g + ', ' + b + ', 0.7)');
        bordercolor.push('rgba(' + r + ', ' + g + ', ' + b + ', 1)');
      }

      const data = {
        datasets: [{
          label: 'Files by Categories',
          data: collectionValues,
          backgroundColor: backgroundcolor,
          borderColor: bordercolor,
          borderWidth: 1,
          parsing: {
            xAxisKey: 'x.1',
            yAxisKey: 'y.1'
          }
        }]
      };

      // config 
      const config = {
        type: 'bar',
        data,
        options: {
          indexAxis: 'y',
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      };

      // render init block
      const myChart = new Chart(
        document.getElementById('myChart'),
        config
      );

      function updateChartCollection(option) {
        myChart.data.datasets[0].parsing.xAxisKey = `x.${option.value}`;
        myChart.data.datasets[0].parsing.yAxisKey = `y.${option.value}`;
        myChart.update();
      }
    </script>
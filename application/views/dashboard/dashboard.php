    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1><?= $subtitle ?></h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="col-md-12">
            <!-- Application buttons -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Categories</h3>
              </div>
              <div class="card-body text-center">
                <?php foreach ($category_list as $cl) : ?>
                  <a class="btn btn-app bg-warning" href="<?= base_url('archive/list/' . $cl->slug); ?>">
                    <span class="badge bg-success">
                      <?php
                      $query = $this->db->query('SELECT * FROM collections WHERE category_id = "' . $cl->id . '" AND collection_status = "1"');
                      echo $query->num_rows();
                      ?>
                    </span>
                    <i class="fas fa-folder"></i> <?= $cl->category_name ?>
                  </a>
                <?php endforeach; ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="row">
              <div class="col-md-8">
                <!-- DONUT CHART -->
                <div class="card card-danger">
                  <div class="card-header">
                    <h3 class="card-title">Chart</h3>
                  </div>
                  <div class="card-body">
                    <canvas id="donutChart" style="min-height: 250px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->

              </div>
              <!-- /.col (LEFT) -->
              <div class="col-md-4">
                <!-- Info Boxes Style 2 -->
                <div class="info-box mb-3 bg-success">
                  <span class="info-box-icon"><i class="fas fa-book"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Collections</span>
                    <span class="info-box-number"><?php
                                                  $query = $this->db->query('SELECT * FROM collections WHERE collection_status = "1"');
                                                  echo $query->num_rows();
                                                  ?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box mb-3 bg-danger">
                  <span class="info-box-icon"><i class="far fa-fw fa-file-pdf"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Files</span>
                    <span class="info-box-number"><?php
                                                  $query = $this->db->query('SELECT * FROM attachments');
                                                  echo $query->num_rows();
                                                  ?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box mb-3 bg-warning">
                  <span class="info-box-icon"><i class="far fa-folder-open"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Categories</span>
                    <span class="info-box-number"><?php
                                                  $query = $this->db->query('SELECT * FROM categories WHERE category_status = "1"');
                                                  echo $query->num_rows();
                                                  ?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box mb-3 bg-info">
                  <span class="info-box-icon"><i class="far fa-user"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text">Users</span>
                    <span class="info-box-number"><?php
                                                  $query = $this->db->query('SELECT * FROM users WHERE user_status = "1"');
                                                  echo $query->num_rows();
                                                  ?></span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <!-- /.row -->
            </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- jQuery -->
    <script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
    <!-- ChartJS -->
    <script src="<?= base_url('assets/plugins/chart.js/Chart.min.js') ?>"></script>
    <!-- Page specific script -->
    <script>
      $(function() {
        const d_labels = [<?php foreach ($dchart as $d) {
                            echo '"' . $d->category_name . '",';
                          } ?>];
        const backgoundcolor = [];
        const bordercolor = [];

        for (i = 0; i < d_labels.length; i++) {
          const r = Math.floor(Math.random() * 255);
          const g = Math.floor(Math.random() * 255);
          const b = Math.floor(Math.random() * 255);
          backgoundcolor.push('rgba(' + r + ',' + g + ',' + b + ',0.5)');
          bordercolor.push('rgba(' + r + ',' + g + ',' + b + ',0.5)');
        }
        //-------------
        //- DONUT CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData = {
          labels: d_labels,
          datasets: [{
            data: [<?php foreach ($dchart as $d) {
                      echo '"' . $d->count . '",';
                    } ?>],
            backgroundColor: backgoundcolor,
          }]
        }
        var donutOptions = {
          maintainAspectRatio: false,
          responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(donutChartCanvas, {
          type: 'pie',
          data: donutData,
          options: donutOptions
        })
      })
    </script>
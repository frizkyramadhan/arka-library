<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register - ARKA Library</title>

  <!-- Google Font: Source Sans Pro -->
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/font.css') ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css') ?>">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="<?= base_url() ?>" class="h1"><b>ARKA</b> Library</a>
      </div>
      <div class="card-body">
        <?= $this->session->flashdata('message'); ?>
        <?= form_open() ?>
        <div class="form-group mb-3">
          <div class="input-group">
            <input type="number" class="form-control" placeholder="NIK" name="nik" autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-id-badge"></span>
              </div>
            </div>
          </div>
          <?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group mb-3">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Name" name="name">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-font"></span>
              </div>
            </div>
          </div>
          <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group mb-3">
          <div class="input-group">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group mb-3">
          <div class="input-group">
            <select id="department_id" name="department_id" class="form-control custom-select">
              <option value="" selected disabled>Department</option>
              <?php foreach ($departments as $d) : ?>
                <option <?= set_select('department_id', $d->id) ?> value="<?= $d->id ?>"><?= $d->department_name;  ?></option>
              <?php endforeach; ?>
            </select>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-briefcase"></span>
              </div>
            </div>
          </div>
          <?= form_error('department_id', '<small class="text-danger">', '</small>'); ?>
        </div>
      </div>
      <div class="card-footer">
        <div class="row">
          <div class="col-12">
            <input name="register" type="submit" class="btn btn-primary btn-block" value="Register">
          </div>
        </div>
        <?= form_close() ?>
        <div class="row">
          <div class="col-12">
            <div class="mt-5 text-muted text-center">
              Already have an account? <a href="<?= base_url('auth') ?>" tabindex="4"><b>Login!</b></a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url('assets/dist/js/adminlte.min.js') ?>"></script>
</body>

</html>
<!-- Main Sidebar Container -->
<aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url() ?>" class="brand-link">
    <img src="<?= base_url('assets/dist/img/AdminLTELogo.png') ?>" alt="Plant Library" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">ARKA Library</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info">
        <div class="d-block text-light">
          <i class="fas fa-user-circle"></i>
          <?php
          $ci = &get_instance();
          $name_session = $ci->session->userdata('name');
          $level_session = $ci->session->userdata('level');
          $dcode = $ci->session->userdata('department_code');
          echo $name_session;
          ?>
          <!-- <pre>
            <?php
            // var_dump($ci->session);
            // die;
            ?>
          </pre> -->
        </div>
      </div>
    </div>
    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="<?= base_url('dashboard') ?>" class="nav-link <?= $this->uri->segment(1) == "" || $this->uri->segment(1) == "dashboard" ? "active" : "" ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <?php foreach ($category_list as $list) : ?>
          <li class="nav-item">
            <a href="<?= base_url('collection/' . $list->slug) ?>" class="nav-link <?= $this->uri->segment(2) == $list->slug ? "active" : "" ?>">
              <?= $this->uri->segment(2) == $list->slug ? "<i class='nav-icon fas fa-folder-open'></i>" : "<i class='nav-icon fas fa-folder'></i>" ?>
              <p>
                <?= $list->category_name ?>
              </p>
            </a>
          </li>
        <?php endforeach; ?>

        <?php if ($level_session != 'user') : ?>
          <li class="nav-header">MASTER DATA</li>
          <li class="nav-item">
            <a href="<?= base_url('category') ?>" class="nav-link <?= $this->uri->segment(1) == "category" ? "active" : "" ?>">
              <i class="nav-icon fas fa-sitemap"></i>
              <p>
                Categories
              </p>
            </a>
          </li>
          <?php if ($level_session == 'admin') : ?>
            <li class="nav-header">ADMINISTRATOR</li>
            <li class="nav-item">
              <a href="<?= base_url('user') ?>" class="nav-link <?= $this->uri->segment(1) == "user" ? "active" : "" ?>">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Users
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('department') ?>" class="nav-link <?= $this->uri->segment(1) == "department" ? "active" : "" ?>">
                <i class="nav-icon fas fa-briefcase"></i>
                <p>
                  Departments
                </p>
              </a>
            </li>
          <?php endif; ?>
        <?php endif; ?>
      </ul>
  </div>
  <!-- /.sidebar-menu -->
  <!-- /.sidebar -->
  <div class="sidebar-custom">
    <a href="<?= base_url('auth/logout') ?>" class="btn btn-block btn-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
  </div>
  <!-- /.sidebar-custom -->
</aside>
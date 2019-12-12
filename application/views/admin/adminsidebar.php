
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url('assets/img/pengasuh/') . $user['user_photos']?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $user['user_name']?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU UTAMA</li>
        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-database"></i> <span>Datamaster</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?= base_url("admin/pasien")?>"><i class="fa fa-circle-o"></i> Rehabilitan</a></li>
            <li class="active"><a href="index2.html"><i class="fa fa-circle-o"></i> Obat</a></li>
            <li class="active"><a href="index2.html"><i class="fa fa-circle-o"></i> Pengasuh</a></li>
            <li class="active"><a href="index2.html"><i class="fa fa-circle-o"></i> Jabatan</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-envelope-o"></i>
            <span>Surat Menyurat</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url()?>assets/pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
            <li><a href="<?=base_url()?>assets/pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
            <li><a href="<?=base_url()?>assets/pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="<?=base_url()?>assets/pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
          </ul>
        </li>
        <li>
          <a href="<?=base_url()?>assets/pages/widgets.html">
            <i class="fa fa-th"></i> <span>Layanan</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Keuangan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=base_url()?>assets/pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
            <li><a href="<?=base_url()?>assets/pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
            <li><a href="<?=base_url()?>assets/pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="<?=base_url()?>assets/pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
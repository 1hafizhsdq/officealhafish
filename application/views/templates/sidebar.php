
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

        <!-- query menu -->
        <?php
          $role     = $this->session->userdata('role_id');
          $sqlmenu  = "SELECT user_menu.id_user_menu, user_menu.menu
                       FROM user_menu JOIN user_access_menu
                       ON user_menu.id_user_menu = user_access_menu.menu_id
                       WHERE user_access_menu.role_id = '$role'
                       ORDER BY user_access_menu.menu_id ASC
                      ";
          $menu     = $this->db->query($sqlmenu)->result_array();
        ?>
        
      <ul class="sidebar-menu" data-widget="tree">
        <?php if($title == 'Dashboard'){?>
          <li class="treeview active">
        <?php }else{?>
        <li class="treeview">
        <?php } ?>
          <a href="<?= base_url() ?>Admin">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <?php foreach($menu as $m) : ?>
        <li class="header"><?= $m['menu']?></li>
        <?php
          $menuid     = $m['id_user_menu'];
          $sqlsubmenu = "SELECT user_sub_menu.*
                         FROM user_sub_menu JOIN user_menu
                         ON user_sub_menu.user_menu_id = user_menu.id_user_menu
                         WHERE user_sub_menu.user_menu_id = $menuid
                         AND user_sub_menu.is_activated = '1'
                        ";
          $submenu = $this->db->query($sqlsubmenu)->result_array();
        ?>
          <?php foreach($submenu as $sm) : ?>
            <?php if($title == $sm['title']) : ?>
            <li class="treeview active">
              <?php else : ?>
              <li class="treeview">
            <?php endif ; ?>
              <a href="#">
                <i class="<?= $sm['icon'] ?>"></i> <span><?= $sm['title'] ?></span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <?php
                  $submenuid   = $sm['id_user_submenu'];
                  $sqlsubmenu2 = "SELECT user_sub_menu2.*
                                  FROM user_sub_menu2 JOIN user_sub_menu
                                  ON user_sub_menu2.id_user_submenu = user_sub_menu.id_user_submenu
                                  WHERE user_sub_menu2.id_user_submenu = $submenuid
                                  AND user_sub_menu.is_activated = '1'
                                  ";
                  $submenu2    = $this->db->query($sqlsubmenu2)->result_array();
                ?>
                <?php foreach($submenu2 as $sm2) : ?>
                <?php if($bc == $sm2['title2']) : ?>
                  <li class="active"><a href="<?= $sm2['url']?>"><i class="fa fa-circle-o"></i><?= $sm2['title2'] ?></a></li>
                  <?php else : ?>
                  <li><a href="../../officealhafish/<?= $sm2['url']?>"><i class="fa fa-circle-o"></i><?= $sm2['title2'] ?></a></li>
                <?php endif ; ?>
                <?php endforeach ?>
              </ul>
            </li>
          <?php endforeach ?>
        <?php endforeach ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
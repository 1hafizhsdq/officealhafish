  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Pribadi
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                        <img src="<?=base_url('assets/img/pengasuh/') . $user['user_photos']?>" class="card-img" alt="..." width="100" height="140">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?=$user['user_name']?></h5>
                            <p class="card-text"><?= $user['user_NIP']?></p>
                            <p class="card-text"><?= $user['user_email']?></p>
                            <p class="card-text"><small class="text-muted">Member Since <?= date('d F Y', $user['date_created']) ?></small></p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col -->
          <!-- /.widget-user -->
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
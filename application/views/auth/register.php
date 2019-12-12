<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
  <b href="../../index2.html"><b>Al-Hafish</b>Office</b>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form action="<?= base_url('Auth/registration')?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama" value="<?=set_value('nama')?>">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <?= form_error('nama','<small class="text-danger">','</small>')?>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email"value="<?=set_value('email')?>">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <?= form_error('email','<small class="text-danger">','</small>')?>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?= form_error('password','<small class="text-danger">','</small>')?>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Retype password" name="repassword">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <center>
        <a href="login.html" class="text-center">Sudah memiliki akun</a>
    </center>
    
  </div>
  <!-- /.form-box -->
</div>
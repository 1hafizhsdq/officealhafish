
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Al-Hafish</b>Office</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Silahkan Sign In untuk mengkases akun anda</p>
    <?= $this->session->flashdata('message');?>
    <hr>
    <form action="<?= base_url('Auth/index')?>" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email" value="<?= set_value('email') ?>">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <?= form_error('email','<small class="text-danger">','</small>')?>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?= form_error('password','<small class="text-danger">','</small>')?>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <hr>
    <br>
        <center>
            <a href="#">Lupa Password ?</a><br>
            <a href="<?= base_url('Auth/registration')?>">Registrasi</a><br>
        </center>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->



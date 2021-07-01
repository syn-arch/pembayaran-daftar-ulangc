<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('vendor/lte/') ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url('vendor/lte/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('vendor/lte/') ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="#">DAFTAR ULANG <b>BBC</b></a>
    </div>

    <?php 
    $tgl_buka = $this->db->get('pengaturan')->row()->tgl_buka;
    $tgl_tutup = $this->db->get('pengaturan')->row()->tgl_tutup;
    ?>

    <?php if (strtotime(date('Y-m-d')) > strtotime($tgl_tutup)): ?>

    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Mohon maaf, Website daftar ulang sedang ditutup, silahkan periksa lagi nanti.</p>
      </div>
    </div>

  <?php else: ?>

    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Silahkan masukan nis dan tanggal lahir anda</p>
        
        <?php if($pesan =  $this->session->flashdata('error')) : ?>
          <div class="alert-message-error d-none"><?php echo $pesan ?></div>
        <?php endif; ?>

        <form method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Nis" name="nis">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <?php echo form_error('nis', '<small style="color:red;margin-top:-10px">','</small>') ?>
          <div class="input-group mb-3">
            <input type="date" class="form-control" placeholder="tgl" name="tgl">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <?php echo form_error('tgl', '<small style="color:red;margin-top:-10px">','</small>') ?>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>

  <?php endif ?>


</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url('vendor/lte/') ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('vendor/lte/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('vendor/lte/') ?>dist/js/adminlte.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
  var error = $('.alert-message-error').text()

  if (error != '') {
    swal('Error!', error, 'error')
  }
</script>

</body>
</html>

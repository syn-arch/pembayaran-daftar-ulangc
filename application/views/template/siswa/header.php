<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="BASE_URL" content="<?php echo base_url() ?>">

  <title><?php echo $judul ?></title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url('vendor/lte/') ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Data Tables -->
  <link rel="stylesheet" href="<?php echo base_url('vendor/lte/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('vendor/lte/') ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('vendor/lte/') ?>dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url('vendor/lte/') ?>plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="<?php echo base_url('vendor/lte/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
        <span class="brand-text font-weight-light">SMK BBC SCHOOL</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
            <a href="#" class="d-block"><?php echo $this->session->userdata('nama_siswa'); ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?php echo base_url('utama') ?>" class="nav-link <?= $judul == 'Utama' ? 'active' : '' ?>">
              <i class="nav-icon fa fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('transaksi/siswa') ?>" class="nav-link <?= $judul == 'Pembayaran' ? 'active' : '' ?>">
              <i class="nav-icon fa fa-credit-card"></i>
              <p>
                Pembayaran
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('laporan/riwayat') ?>" class="nav-link <?= $judul == 'Riwyat Transaksi' ? 'active' : '' ?>">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Riwayat Transaksi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('auth/logout_siswa') ?>" class="nav-link">
              <i class="nav-icon fa fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo $judul ?></h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">


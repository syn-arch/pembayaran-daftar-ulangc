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
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini" onload="window.print()">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-primary card-outline">
        <div class="card-header">
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <img src="<?php echo base_url('assets/img/logo.png') ?>" alt="" width="100" class="d-inline">
              <h4 class="d-inline">
                SMK BUDI BAKTI CIWIDEY
                <small class="float-right">Tanggal: <?php echo date('d/m/Y', strtotime($transaksi['tgl'])) ?></small>
              </h4>
            </div>
            <!-- /.col -->
          </div>

          <div class="float-left">
            <table class="table">
              <tr>
                <th>Nama</th>
                <td><?php echo $transaksi['nama_siswa'] ?></td>
              </tr>
              <tr>
                <th>Kelas</th>
                <td><?php echo $transaksi['nama_kelas'] ?></td>
              </tr>
            </table>
          </div>
          <div class="float-right">
            <table class="table">
              <tr>
                <th>Nama</th>
                <td><?php echo $transaksi['nama_siswa'] ?></td>
              </tr>
              <tr>
                <th>NIS</th>
                <td><?php echo $transaksi['nis'] ?></td>
              </tr>
            </table>
          </div>

          <div class="clearfix"></div>

          <table class="table">
            <thead>
              <tr>
                <th>Kategori</th>
                <th>Jumlah Bayar</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $transaksi['nama_kategori'] ?></td>
                <td><?php echo "Rp. " . number_format($transaksi['jumlah_bayar']) ?></td>
                <td><?php echo "Dibayar" ?></td>
              </tr>
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>


</body>
</html>

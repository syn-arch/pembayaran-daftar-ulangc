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
          <div class="float-left">
            <h4>Riwayat Pembayaran</h4>
          </div>
        </div>
        <div class="card-body">

          <div class="row">
            <div class="col-md-6">
              <table class="table">
                <tr>
                  <th>Nama Siswa</th>
                  <td><?php echo $siswa['nama_siswa'] ?></td>
                </tr>
                <tr>
                  <th>NIS</th>
                  <td><?php echo $siswa['nis'] ?></td>
                </tr>
                <tr>
                  <th>Jurusan</th>
                  <td><?php echo $siswa['nama_jurusan'] ?></td>
                </tr>
              </table>
            </div>
          </div>
          <div class="table-responsive mt-3">
            <table class="table table-bordered table-striped table-hover tables">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal Transaksi</th>
                  <th>Tanggal Transfer</th>
                  <th>Kategori</th>
                  <th>nominal</th>
                  <th>Jumlah Bayar</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; foreach ($laporan as $row): ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo date('d-m-Y', strtotime($row['tgl'])) ?></td>
                  <td><?php echo date('d-m-Y', strtotime($row['tgl_transaksi'])) ?></td>
                  <td><?php echo $row['nama_kategori'] ?></td>
                  <?php 
                  $data_pembayaran = [
                    'id_kategori' => $row['id_kategori'],
                    'id_jurusan' => $siswa['id_jurusan'], 
                    'id_tahun_ajaran' => $siswa['id_tahun_ajaran']
                  ];

                  $this->db->join('kategori', 'id_kategori');
                  $this->db->join('jurusan', 'id_jurusan');
                  $pb = $this->db->get_where('pembayaran', $data_pembayaran)->row_array();
                  ?>
                  <td><?php echo "Rp. "  . number_format($pb['nominal']) ?></td>
                  <td><?php echo "Rp. "  . number_format($row['jumlah_bayar']) ?></td>
                  <td>
                    <?php if ($row['status'] == 1) : ?>
                      <button class="btn btn-outline-success">DITERIMA</button>
                      <?php elseif($row['status'] == 3) : ?>
                        <button class="btn btn-outline-warning">PENDING</button>
                        <?php else : ?>
                          <button class="btn btn-outline-danger">DITOLAK</button>
                        <?php endif ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>

          </div>

        </div>
      </div>
    </div>


  </body>
  </html>

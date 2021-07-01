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
            <h4>Detail Laporan</h4>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <table class="table">
                <tr>
                  <td>Kategori</td>
                  <td><?php echo $kategori['nama_kategori'] ?></td>
                </tr>
                <tr>
                  <td>Kelas</td>
                  <td><?php echo $kelas['nama_kelas'] ?></td>
                </tr>
                <tr>
                  <td>Tahun Ajaran</td>
                  <td><?php echo $tahun_ajaran['tahun_ajaran'] ?></td>
                </tr>
                <tr>
                  <td>Nominal</td>
                  <td><?php echo 'Rp. ' . number_format($pembayaran['nominal']) ?></td>
                </tr>
                <tr>
                  <td>Total Pendapatan</td>
                  <td><?php echo 'Rp. ' . number_format($total) ?></td>
                </tr>
              </table>
            </div>
          </div>

          <div class="table-responsive mt-3">
            <table class="table table-bordered table-striped table-hover tables">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIS</th>
                  <th>Nama Siswa</th>
                  <th>Tanggal Transfer</th>
                  <th>Tanggal Transaksi</th>
                  <th>Jumlah Bayar</th>
                  <th>Sisa Bayar</th>
                  <th>Lunas</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; foreach ($result as $row): ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $row['nis'] ?></td>
                  <td><?php echo $row['nama_siswa'] ?></td>
                  <?php if ($row['tgl'] != ''): ?>
                     <td><?php echo date('d-m-Y', strtotime($row['tgl_transaksi'])) ?></td>
                    <td><?php echo date('d-m-Y', strtotime($row['tgl'])) ?></td>
                    <?php else: ?>
                      <td></td>
                    <?php endif; ?>
                    <td><?php echo "Rp. "  . number_format($row['jumlah_bayar']) ?></td>
                    <?php 
                    $this->db->select_sum('jumlah_bayar');
                    $this->db->where('id_kategori', '3');
                    $jumlah_bayar = $this->db->get_where('transaksi', ['nis' => $row['nis']])->row_array()['jumlah_bayar'];
                    ?>
                    <td><?php echo "Rp. "  . number_format($pembayaran['nominal'] - $jumlah_bayar) ?></td>
                    <td>
                      <?php if ($jumlah_bayar == $pembayaran['nominal']): ?>
                        <button class="btn btn-outline-success">LUNAS</button>
                        <?php else :?>
                          <button class="btn btn-outline-warning">BELUM LUNAS</button>
                        <?php endif;?>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>


</body>
</html>

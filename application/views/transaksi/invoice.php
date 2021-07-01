<div class="row">
  <div class="col-md-12">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <div class="float-left">
          <h4>Transaksi Baru</h4>
        </div>
        <div class="float-right">
            <?php if ($this->session->userdata('id_role') == 9): ?>
            	
          <a href="<?php echo base_url('transaksi/siswa') ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
            <?php else : ?>
          <a href="<?php echo base_url('transaksi') ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>

            <?php endif ?>
        </div>
      </div>
      <div class="card-body">
        <!-- title row -->
        <div class="row">
          <div class="col-12">
            <h4>
              <i class="fa fa-university"></i> SMK BUDI BAKTI CIWIDEY
              <small class="float-right">Tanggal: <?php echo date('d/m/Y', strtotime($transaksi['tgl'])) ?></small>
            </h4>
          </div>
          <!-- /.col -->
        </div>
        <div class="row">
          <div class="col-6">
            <p>Bukti pembayaran transaksi</p>
            <table class="table">
              <tr>
                <th>Nama Siswa</th>
                <td><?php echo $transaksi['nama_siswa'] ?></td>
              </tr>
              <tr>
                <th>NIS</th>
                <td><?php echo $transaksi['nis'] ?></td>
              </tr>
              <?php if($transaksi['status'] == 1) : ?>
              <tr>
                <th>Kelas</th>
                <td><?php echo $transaksi['nama_kelas'] ?></td>
              </tr>
              <?php endif ?>
            </table>
          </div>
          <!-- /.col -->
          <div class="col-6">
            <p class="lead">Detail Pembayaran</p>

            <div class="table-responsive">
              <table class="table">
                <tr>
                  <th>Kategori</th>
                  <td><?php echo $transaksi['nama_kategori'] ?></td>
                </tr>
                <tr>
                  <th>Nominal</th>
                  <td><?php echo "Rp. " .  number_format($pembayaran['nominal']) ?></td>
                </tr>
                <tr>
                  <th>Jumlah Dibayar</th>
                  <td><?php echo "Rp. " .  number_format($transaksi['jumlah_bayar']) ?></td>
                </tr>
                <tr>
                  <th>Status</th>
                  <td>DIBAYAR</td>
                </tr>
              </table>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <?php if($transaksi['status'] == 1) : ?>
        <div class="row no-print">
          <div class="col-12">
            <a href="<?php echo base_url('transaksi/invoice_print/' . $transaksi['id_transaksi']) ?>" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
          </div>
        </div>
        <?php endif ?>
      </div>
    </div>
  </div>
</div>


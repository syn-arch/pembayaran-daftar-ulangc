<div class="row">
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-info">
			<div class="inner">
				<h3><?php echo $jurusan ?></h3>

				<p>Data Jurusan</p>
			</div>
			<div class="icon">
				<i class="ion ion-bag"></i>
			</div>
			<a href="<?php echo base_url('master/jurusan') ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-success">
			<div class="inner">
				<h3><?php echo $kelas ?></h3>

				<p>Data Kelas</p>
			</div>
			<div class="icon">
				<i class="ion ion-stats-bars"></i>
			</div>
			<a href="<?php echo base_url('master/kelas') ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-warning">
			<div class="inner">
				<h3><?php echo $siswa ?></h3>

				<p>Data Siswa</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="<?php echo base_url('master/siswa') ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-6">
		<!-- small box -->
		<div class="small-box bg-danger">
			<div class="inner">
				<h3><?php echo $petugas ?></h3>

				<p>Data Petugas</p>
			</div>
			<div class="icon">
				<i class="ion ion-pie-graph"></i>
			</div>
			<a href="<?php echo base_url('user') ?>" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
</div>

<h4>Daftar Ulang <?php echo date('Y') ?></h4>

<div class="row">
	<div class="col-lg-3 col-6">
		<div class="small-box bg-info">
			<div class="inner">
				<?php 

				$this->db->where('tahun_ajaran !=', date('Y'));
				$this->db->join('tahun_ajaran', 'id_tahun_ajaran');
				$tot_siswa = $this->db->get('siswa')->num_rows();
				?>
				<h3><?php echo $tot_siswa ?></h3>
				<p>Jumlah Siswa Kelas 11 dan 12</p>
			</div>
			<div class="icon">
				<i class="ion ion-bag"></i>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-6">
		<div class="small-box bg-info">
			<div class="inner">
				<?php 
				$id_kategori = $this->db->get_where('kategori', ['nama_kategori' => 'Daftar Ulang'])->row_array()['id_kategori'];

				$this->db->where('id_kategori', $id_kategori);
				$this->db->where('tahun_ajaran !=', date('Y'));
				$this->db->join('tahun_ajaran', 'id_tahun_ajaran');
				$nominal = $this->db->get('pembayaran')->row_array()['nominal'];

				?>
				<h3><?php echo "Rp." . number_format($nominal) ?></h3>
				<p>Nominal</p>
			</div>
			<div class="icon">
				<i class="ion ion-bag"></i>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-6">
		<div class="small-box bg-info">
			<div class="inner">
				<?php 
				$id_kategori = $this->db->get_where('kategori', ['nama_kategori' => 'Daftar Ulang'])->row_array()['id_kategori'];

				$this->db->where('id_kategori', $id_kategori);
				$this->db->where('tahun_ajaran !=', date('Y'));
				$this->db->join('tahun_ajaran', 'id_tahun_ajaran');
				$nominal = $this->db->get('pembayaran')->row_array()['nominal'];
				$jumlah = $tot_siswa * (int) $nominal;
				?>
				<h3><?php echo "Rp." . number_format($jumlah) ?></h3>
				<p>Total Seluruh Jumlah Bayar</p>
			</div>
			<div class="icon">
				<i class="ion ion-bag"></i>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-6">
		<div class="small-box bg-info">
			<div class="inner">
				<?php 
				$this->db->select_sum('jumlah_bayar');
				$this->db->where('tahun_dibayar', date('Y'));
				$this->db->where('id_kategori', $id_kategori);
				$this->db->where('status', 1);
				$jumlah = $this->db->get('transaksi')->row_array()['jumlah_bayar'];
				?>
				<h3><?php echo "Rp." . number_format($jumlah) ?></h3>
				<p>Total Telah Diterima</p>
			</div>
			<div class="icon">
				<i class="ion ion-bag"></i>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<?php foreach ($this->db->get('jurusan')->result_array() as $row): ?>
	<div class="col-lg-3 col-6">
		<div class="small-box bg-success">
			<div class="inner">
				<?php 

				$tot_siswa_jurusan = $this->db->get_where('siswa', ['id_jurusan' => $row['id_jurusan']])->num_rows();

				$this->db->select_sum('jumlah_bayar');
				$this->db->where('tahun_dibayar', date('Y'));
				$this->db->where('siswa.id_jurusan', $row['id_jurusan']);
				$this->db->where('id_kategori', $id_kategori);
				$this->db->where('status', 1);
				$this->db->join('siswa', 'siswa.nis = transaksi.nis', 'left');
				$this->db->join('jurusan', 'siswa.id_jurusan = jurusan.id_jurusan', 'left');
				$bayar_jurusan = $this->db->get('transaksi')->row_array()['jumlah_bayar'];
				?>
				<h3><?php echo "Rp." . number_format($bayar_jurusan) ?></h3>
				<p>Total Jumlah Bayar <?php echo $row['singkatan'] ?></p>
			</div>
			<div class="icon">
				<i class="ion ion-bag"></i>
			</div>
		</div>
	</div>
<?php endforeach ?>
</div>
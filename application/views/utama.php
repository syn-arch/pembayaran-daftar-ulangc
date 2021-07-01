<h1><marquee behavior="" direction="">Selamat Datang, <?php echo $this->session->userdata('nama_siswa'); ?></marquee></h1>

<?php 

$data = [
	'nis' => $this->session->userdata('nis'),
	'id_kategori' => '3'
];

$bayar = $this->db->get_where('transaksi', $data)->row_array();

$pengumuman = $this->db->get('pengaturan_pembayaran')->row_array()['pesan'];

$pengumuman_sekolah = $this->db->get('pengaturan')->row_array()['pengumuman'];

?>

<div class="card card-primary card-outline">
	<div class="card-body">
		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<thead>
						<tr>
							<td><h2 class="text-center">Pengumuman</h2></td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<?php echo $pengumuman_sekolah ?>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>	
	</div>
</div>

<?php if ($bayar['status'] == 1): ?>
	<div class="card card-primary card-outline">
		<div class="card-body">
			<div class="row">
				<div class="col-md-12">
					<table class="table">
						<thead>
							<tr>
								<td><h2 class="text-center">Pengumuman</h2></td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<p class="text-center">
										<?php echo $pengumuman ?>
									</p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>	
		</div>
	</div>
<?php endif ?>

<?php if ($bayar['status'] == 0): ?>
	<div class="card card-primary card-outline">
		<div class="card-body">
			<div class="row">
				<div class="col-md-12">
					<table class="table">
						<thead>
							<tr>
								<td><h2 class="text-center">Perhatian</h2></td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<p class="text-center"><?= $bayar['keterangan'] ?></p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>	
		</div>
	</div>
	<?php endif ?>
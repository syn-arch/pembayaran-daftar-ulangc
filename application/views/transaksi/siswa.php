<div class="row">
	<div class="col-md-12">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<div class="float-left">
					<h4>Pembayaran Transaksi</h4>
				</div>
			</div>
			<div class="card-body">

				<?php if($pesan =  $this->session->flashdata('pesan')) : ?>
					<div class="alert-message d-none"><?php echo $pesan ?></div>
				<?php endif; ?>

				<?php if($error =  $this->session->flashdata('error')) : ?>
					<div class="alert-message-error d-none"><?php echo $error ?></div>
				<?php endif; ?>

				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped tables">
						<thead>
							<tr>
								<th>No</th>
								<th>Kategori</th>
								<th>Nominal</th>
								<th>Status</th>
								<th><i class="fa fa-cogs"></i></th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach ($kategori as $row): ?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $row['nama_kategori'] ?></td>
								<td><?php echo "Rp. " . number_format($row['nominal']) ?></td>
								<td>
									<?php 
									$siswa = $this->db->get_where('siswa', ['id_siswa' => $this->session->userdata('id_siswa')])->row_array();

													$this->db->select_sum('jumlah_bayar');
									$jumlah_bayar = $this->db->get_where('transaksi', ['id_kategori' => $row['id_kategori'], 'nis' => $siswa['nis']])->row_array()['jumlah_bayar']; 
									?>

									<?php if ($jumlah_bayar == $row['nominal']): ?>
										<button class="btn btn-success">LUNAS</button>
										<?php else : ?>
											<button class="btn btn-warning">BELUM LUNAS</button>
										<?php endif ?>
									</td>
									<td>
									<?php if ($jumlah_bayar == $row['nominal']): ?>
										<button class="btn btn-primary disabled"><i class="fa fa-credit-card"></i> Bayar</button>
										<?php else : ?>
										<a href="<?php echo base_url('transaksi/bayar/') . $row['id_kategori'] ?>" class="btn btn-primary"><i class="fa fa-credit-card"></i> Bayar</a>
										<?php endif ?>
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
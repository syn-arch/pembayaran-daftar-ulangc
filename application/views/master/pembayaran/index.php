<div class="row">
	<div class="col-md-12">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<div class="float-left">
					<h4>Data pembayaran</h4>
				</div>
				<div class="float-right">
					<a href="<?php echo base_url('master/tambah_pembayaran') ?>"class="btn btn-primary tambah-pembayaran"><i class="fa fa-plus"></i> Tambah pembayaran</a>
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
					<table class="table table-hover table-striped table-bordered tables">
						<thead>
							<tr>
								<th>No</th>
								<th>Jurusan</th>
								<th>Kategori</th>
								<th>Nominal</th>
								<th>Tahun Ajaran</th>
								<th><i class="fa fa-cogs"></i></th>
							</tr>
						</thead>
						<tbody>
							<?php $np=1; foreach ($pembayaran as $row ): ?>
								<tr>
									<td><?php echo $np++ ?></td>
									<td><?php echo $row['nama_jurusan'] ?></td>
									<td><?php echo $row['nama_kategori'] ?></td>
									<td><?php echo "Rp. " . number_format($row['nominal']) ?></td>
									<td><?php echo $row['tahun_ajaran'] ?></td>
									<td>
										<a href="<?php echo base_url('master/ubah_pembayaran/') . $row['id_pembayaran'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
										<a data-href="<?php echo base_url('master/hapus_pembayaran/') . $row['id_pembayaran'] ?>" class="btn btn-danger hapus_pembayaran"><i class="fa fa-trash"></i></a>
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
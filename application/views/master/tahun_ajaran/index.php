<div class="row">
	<div class="col-md-12">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<div class="float-left">
					<h4>Data tahun ajaran</h4>
				</div>
				<div class="float-right">
					<a href="<?php echo base_url('master/tambah_tahun_ajaran') ?>"class="btn btn-primary tambah-tahun_ajaran"><i class="fa fa-plus"></i> Tambah tahun ajaran</a>
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
								<th>ID</th>
								<th>Nama tahun ajaran</th>
								<th><i class="fa fa-cogs"></i></th>
							</tr>
						</thead>
						<tbody>
							<?php $np=1; foreach ($this->db->get('tahun_ajaran')->result() as $row ): ?>
								<tr>
									<td><?php echo $np++ ?></td>
									<td><?php echo $row->id_tahun_ajaran ?></td>
									<td><?php echo $row->tahun_ajaran ?></td>
									<td>
										<a href="<?php echo base_url('master/ubah_tahun_ajaran/') . $row->id_tahun_ajaran ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
										<a data-href="<?php echo base_url('master/hapus_tahun_ajaran/') . $row->id_tahun_ajaran ?>" class="btn btn-danger hapus_tahun_ajaran"><i class="fa fa-trash"></i></a>
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
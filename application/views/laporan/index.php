<div class="row">
	<div class="col-md-12">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<div class="float-left">
					<h4>Data Laporan</h4>
				</div>
				<div class="float-right">
				   
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-8 offset-md-2">
						<form method="POST">
							<div class="form-group">
								<label for="id_kategori">Kategori</label>
								<select name="id_kategori" id="id_kategori" class="form-control <?php if(form_error('id_kategori')) echo 'is-invalid'?>">
									<option value="">-- Pilih Kategori --</option>
									<?php foreach ($kategori as $row): ?>
										<option value="<?php echo $row['id_kategori'] ?>"><?php echo $row['nama_kategori'] ?></option>
									<?php endforeach ?>
								</select>
								<?php echo form_error('id_kategori', '<small style="color:red">','</small>') ?>
							</div>
							<div class="form-group">
								<label for="id_kelas">Kelas</label>
								<select name="id_kelas" id="id_kelas" class="form-control <?php if(form_error('id_kelas')) echo 'is-invalid'?>">
									<option value="">-- Pilih kelas --</option>
									<?php foreach ($kelas as $row): ?>
										<option value="<?php echo $row['id_kelas'] ?>"><?php echo $row['nama_kelas'] ?></option>
									<?php endforeach ?>
								</select>
								<?php echo form_error('id_kelas', '<small style="color:red">','</small>') ?>
							</div>
							<div class="form-group">
								<label for="id_tahun_ajaran">Tahun Ajaran</label>
								<select name="id_tahun_ajaran" id="id_tahun_ajaran" class="form-control id_tahun_ajaran <?php if(form_error('id_tahun_ajaran')) echo 'is-invalid'?>">
									<option value="">-- Pilih tahun ajaran --</option>
									<?php foreach ($tahun_ajaran as $row): ?>
										<option value="<?php echo $row['id_tahun_ajaran'] ?>"><?php echo $row['tahun_ajaran'] ?></option>
									<?php endforeach ?>
								</select>
								<?php echo form_error('id_tahun_ajaran', '<small style="color:red">','</small>') ?>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<div class="float-left">
					<h4>Transaksi Terakhir</h4>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-hovered table-striped table-bordered tables">
						<?php 

						$no=1;

								$this->db->select('*, transaksi.tgl');
								$this->db->join('siswa', 'nis', 'left');
								$this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas', 'left');
								$this->db->order_by('transaksi.tgl', 'desc');
								$this->db->limit(50);
						$result = $this->db->get('transaksi')->result_array();

						 ?>
						 <thead>
						 	<tr>
						 		<th>No</th>
						 		<th>NIS</th>
						 		<th>Nama Siswa</th>
						 		<th>Tanggal Bayar</th>
						 		<th>Jumlah Bayar</th>
						 		<th>Status</th>
						 		<th><i class="fa fa-print"></i></th>
						 	</tr>
						 </thead>
						 <tbody>
						 	<?php foreach ($result as $row): ?>
						 		<tr>
						 			<td><?php echo $no++ ?></td>
						 			<td><?php echo $row['nis'] ?></td>
						 			<td><?php echo $row['nama_siswa'] ?></td>
						 			<td><?php echo date('d-m-Y', strtotime($row['tgl'])) ?></td>
						 			<td><?php echo "Rp. " . number_format($row['jumlah_bayar']) ?></td>
						 			<td>
						 				<?php if ($row['status'] == 3): ?>
						 					<button class="btn btn-warning">MENUNGGU</button>
						 				<?php else :?>
						 					<button class="btn btn-success">DIKONFIRMASI</button>
						 			<?php endif ?>
						 			</td>
						 			<td><a href="<?php echo base_url('transaksi/invoice/' . $row['id_transaksi']) ?>" class="btn btn-info"><i class="fa fa-print"></i></a></td>
						 		</tr>
						 	<?php endforeach ?>
						 </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

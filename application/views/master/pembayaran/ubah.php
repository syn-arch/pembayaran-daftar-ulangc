<div class="row">
	<div class="col-md-12">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<div class="float-left">
					<h4>Tambah Data</h4>
				</div>
				<div class="float-right">
					<a href="<?php echo base_url('master/pembayaran') ?>"class="btn btn-primary tambah-pembayaran"><i class="fa fa-arrow-left"></i> Kembali</a>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-8 offset-md-2">
						<form method="POST">
							<div class="form-group">
								<label for="id_kategori">Kategori</label>
								<select name="id_kategori" id="id_kategori" class="form-control <?php if(form_error('nis')) echo 'is-invalid'?>">
									<option value="">-- Pilih Kategori --</option>
									<?php foreach ($kategori as $row): ?>
										<option value="<?php echo $row['id_kategori'] ?>" <?= $row['id_kategori'] == $pembayaran['id_kategori'] ? 'selected' : '' ?> ><?php echo $row['nama_kategori'] ?></option>
									<?php endforeach ?>
								</select>
								<?php echo form_error('id_kategori', '<small style="color:red">','</small>') ?>
							</div>
							<div class="form-group">
								<label for="id_jurusan">Jurusan</label>
								<select name="id_jurusan" id="id_jurusan" class="form-control <?php if(form_error('nis')) echo 'is-invalid'?>">
									<option value="">-- Pilih jurusan --</option>
									<?php foreach ($jurusan as $row): ?>
										<option value="<?php echo $row['id_jurusan'] ?>" <?= $row['id_jurusan'] == $pembayaran['id_jurusan'] ? 'selected' : '' ?>><?php echo $row['nama_jurusan'] ?></option>
									<?php endforeach ?>
								</select>
								<?php echo form_error('id_jurusan', '<small style="color:red">','</small>') ?>
							</div>
							<div class="form-group">
								<label for="id_tahun_ajaran">Tahun ajaran</label>
								<select name="id_tahun_ajaran" id="id_tahun_ajaran" class="form-control id_tahun_ajaran">
									<option value="">-- Pilih tahun ajaran --</option>
									<?php foreach ($tahun_ajaran as $row): ?>
										<option value="<?php echo $row['id_tahun_ajaran'] ?>" <?php echo $row['id_tahun_ajaran'] == $pembayaran['id_tahun_ajaran'] ? 'selected' : '' ?>><?php echo $row['tahun_ajaran'] ?></option>
									<?php endforeach ?>
								</select>
								<?php echo form_error('id_tahun_ajaran', '<small style="color:red">','</small>') ?>
							</div>
							<div class="form-group">
								<label for="nominal">Nominal</label>
								<input type="text" id="nominal" name="nominal" class="form-control nominal <?php if(form_error('nominal')) echo 'is-invalid'?>" placeholder="Nominal" value="<?php echo $pembayaran['nominal'] ?>">
								<?php echo form_error('nominal', '<small style="color:red">','</small>') ?>
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
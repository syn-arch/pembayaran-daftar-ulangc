
<div class="row">
	<div class="col-md-12">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<div class="float-left">
					<h4>Tambah Data</h4>
				</div>
				<div class="float-right">
					<a href="<?php echo base_url('master/kelas') ?>"class="btn btn-primary tambah-kelas"><i class="fa fa-arrow-left"></i> Kembali</a>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
				<div class="col-md-8 offset-md-2">
					<form method="POST">
						<div class="form-group">
							<label for="id_kelas">ID Kelas</label>
							<input type="text" id="id_kelas" name="id_kelas" class="form-control id_kelas <?php if(form_error('id_kelas')) echo 'is-invalid'?>" placeholder="ID Kelas" value="<?php echo set_value('id_kelas') ?>">
							<?php echo form_error('id_kelas', '<small style="color:red">','</small>') ?>
						</div>
						<div class="form-group">
							<label for="nama_kelas">Nama kelas</label>
							<input type="text" id="nama_kelas" name="nama_kelas" class="form-control nama_kelas <?php if(form_error('nama_kelas')) echo 'is-invalid'?>" placeholder="Nama kelas" value="<?php echo set_value('nama_kelas') ?>">
							<?php echo form_error('nama_kelas', '<small style="color:red">','</small>') ?>
						</div>
						<div class="form-group">
							<label for="id_jurusan">Jurusan</label>
							<select name="id_jurusan" id="id_jurusan" class="form-control <?php if(form_error('id_jurusan')) echo 'is-invalid'?>">
								<option value="">-- Pilih Jurusan --</option>
								<?php foreach ($jurusan as $row): ?>
									<option value="<?php echo $row['id_jurusan'] ?>"><?php echo $row['nama_jurusan'] ?></option>
								<?php endforeach ?>
							</select>
							<?php echo form_error('id_jurusan', '<small style="color:red">','</small>') ?>
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
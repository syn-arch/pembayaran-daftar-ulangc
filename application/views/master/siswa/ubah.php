<div class="row">
	<div class="col-md-12">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<div class="float-left">
					<h4 class="card-title"><?php echo $judul ?></h4>
				</div>
				<div class="float-right">
					<a href="<?php echo base_url('master/siswa') ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
				</div>
			</div>
			<div class="card-body">

				<?php if($pesan =  $this->session->flashdata('pesan')) : ?>
					<div class="alert-message d-none"><?php echo $pesan ?></div>
				<?php endif; ?>

				<?php if($error =  $this->session->flashdata('error')) : ?>
					<div class="alert-message-error d-none"><?php echo $error ?></div>
				<?php endif; ?>
				<form method="POST">
					<div class="row">
						<div class="col-md-8 offset-md-2">
							<div class="form-group">
								<label for="nama_siswa">Nama Siswa</label>
								<input type="text" class="form-control <?php if(form_error('nama_siswa')) echo 'is-invalid'?>" name="nama_siswa" id="nama_siswa" placeholder="Nama Siswa" value="<?php echo $siswa['nama_siswa'] ?>">
								<?php echo form_error('nama_siswa', '<small style="color:red">','</small>') ?>
							</div>
							<div class="form-group">
								<label for="nis">NIS</label>
								<input type="text" class="form-control <?php if(form_error('nis')) echo 'is-invalid'?>" name="nis" id="nis" placeholder="NIS" value="<?php echo $siswa['nis'] ?>">
								<?php echo form_error('nis', '<small style="color:red">','</small>') ?>
							</div>
							<div class="form-group">
								<label for="tgl">Tanggal Lahir</label>
								<input type="date" class="form-control <?php if(form_error('tgl')) echo 'is-invalid'?>" name="tgl" id="tgl" placeholder="tgl" value="<?php echo $siswa['tgl'] ?>">
								<?php echo form_error('tgl', '<small style="color:red">','</small>') ?>
							</div>
							<div class="form-group">
								<label for="id_tahun_ajaran">Tahun ajaran</label>
								<select name="id_tahun_ajaran" id="id_tahun_ajaran" class="form-control id_tahun_ajaran">
									<option value="">-- Pilih tahun ajaran --</option>
									<?php foreach ($tahun_ajaran as $row): ?>
										<option value="<?php echo $row['id_tahun_ajaran'] ?>" <?php echo $row['id_tahun_ajaran'] == $siswa['id_tahun_ajaran'] ? 'selected' : '' ?>><?php echo $row['tahun_ajaran'] ?></option>
									<?php endforeach ?>
								</select>
								<?php echo form_error('id_tahun_ajaran', '<small style="color:red">','</small>') ?>
							</div>
							<div class="form-group">
								<label for="jk">Jenis Kelamin</label>
								<select name="jk" id="jk" class="form-control jk">
									<option value="">-- Pilih Jurusan --</option>
									<option value="L" <?php echo $siswa['jk'] == "L" ? 'selected' : '' ?>>L</option>
									<option value="P" <?php echo $siswa['jk'] == "P" ? 'selected' : '' ?>>P</option>
								</select>
								<?php echo form_error('jk', '<small style="color:red">','</small>') ?>
							</div>
							<div class="form-group">
								<label for="id_jurusan">Jurusan</label>
								<select name="id_jurusan" id="id_jurusan" class="form-control id_jurusan">
									<option value="">-- Pilih Jurusan --</option>
									<?php foreach ($jurusan as $row): ?>
										<option value="<?php echo $row['id_jurusan'] ?>" <?php echo $row['id_jurusan'] == $siswa['id_jurusan'] ? 'selected' : '' ?>><?php echo $row['nama_jurusan'] ?></option>
									<?php endforeach ?>
								</select>
								<?php echo form_error('id_jurusan', '<small style="color:red">','</small>') ?>
							</div>
							<div class="form-group">
								<label for="id_kelas">kelas</label>
								<select name="id_kelas" id="id_kelas" class="form-control id_kelas">
									<option value="">-- Pilih Kelas --</option>
									<?php foreach ($kelas as $row): ?>
										<option value="<?php echo $row['id_kelas'] ?>" <?php echo $row['id_kelas'] == $siswa['id_kelas'] ? 'selected' : '' ?>><?php echo $row['nama_kelas'] ?></option>
									<?php endforeach ?>
								</select>
								<?php echo form_error('id_kelas', '<small style="color:red">','</small>') ?>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block">Submit</button>
							</div>
						</div>
					</div>
					
				</form>
			</div>
		</div>
	</div>
</div>
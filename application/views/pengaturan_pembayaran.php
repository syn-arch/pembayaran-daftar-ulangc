<div class="row">
	<div class="col-md-12">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<h4 class="card-title"><?php echo $judul ?></h4>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-8 offset-md-2">

						<?php if($pesan =  $this->session->flashdata('pesan')) : ?>
							<div class="alert-message d-none"><?php echo $pesan ?></div>
						<?php endif; ?>

						<?php if($error =  $this->session->flashdata('error')) : ?>
							<div class="alert-message-error d-none"><?php echo $error ?></div>
						<?php endif; ?>

						<form method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<label for="nama_bank">Nama Bank</label>
								<input type="text" id="nama_bank" name="nama_bank" class="form-control nama_bank <?php if(form_error('nama_bank')) echo 'is-invalid'?>" placeholder="Nama Bank" value="<?php echo $pengaturan['nama_bank'] ?>" >
								<?php echo form_error('nama_bank', '<small style="color:red">','</small>') ?>
							</div>
							<div class="form-group">
								<label for="atas_nama">Atas Nama</label>
								<input type="text" id="atas_nama" name="atas_nama" class="form-control atas_nama <?php if(form_error('atas_nama')) echo 'is-invalid'?>" placeholder="Atas Nama" value="<?php echo $pengaturan['atas_nama'] ?>">
								<?php echo form_error('atas_nama', '<small style="color:red">','</small>') ?>
							</div>
							<div class="form-group">
								<label for="no_rekening">No Rekening</label>
								<input type="text" id="no_rekening" name="no_rekening" class="form-control no_rekening <?php if(form_error('no_rekening')) echo 'is-invalid'?>" placeholder="No Rekening" value="<?php echo $pengaturan['no_rekening'] ?>">
								<?php echo form_error('no_rekening', '<small style="color:red">','</small>') ?>
							</div>
							<div class="form-group <?php if(form_error('pesan')) echo 'has-error'?>">
								<label for="pesan">Pesan Setelah Dikonfirmasi Bayar</label>
								<textarea name="pesan" id="pesan" cols="30" rows="10" class="form-control" placeholder="Pesan"><?php echo $pengaturan['pesan'] ?></textarea>
								<?php echo form_error('pesan', '<small style="color:red">','</small>') ?>
							</div>
							<div class="form-group <?php if(form_error('pengumuman')) echo 'has-error'?>">
								<label for="pengumuman">Pengumuman Sekolah</label>
								<textarea name="pengumuman" id="pengumuman" cols="30" rows="10" class="form-control" placeholder="pengumuman"><?php echo $pengaturan_p['pengumuman'] ?></textarea>
								<?php echo form_error('pengumuman', '<small style="color:red">','</small>') ?>
							</div>
							<div class="form-group <?php if(form_error('tgl_buka')) echo 'has-error'?>">
								<label for="tgl_buka">Tanggal Dibuka</label>
								<input name="tgl_buka" id="tgl_buka" type="date" class="form-control" placeholder="tgl_buka" value="<?php echo $pengaturan_p['tgl_buka'] ?>"></input>
								<?php echo form_error('tgl_buka', '<small style="color:red">','</small>') ?>
							</div>
							<div class="form-group <?php if(form_error('tgl_tutup')) echo 'has-error'?>">
								<label for="tgl_tutup">Tanggal Ditutup</label>
								<input name="tgl_tutup" id="tgl_tutup" type="date" class="form-control" placeholder="tgl_tutup" value="<?php echo $pengaturan_p['tgl_tutup'] ?>"></input>
								<?php echo form_error('tgl_tutup', '<small style="color:red">','</small>') ?>
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

<script>
	$(document).ready(function() {
		$('#pesan').summernote();
		$('#pengumuman').summernote();
	});
</script>
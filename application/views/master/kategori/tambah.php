
<div class="row">
	<div class="col-md-12">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<div class="float-left">
					<h4>Tambah Data</h4>
				</div>
				<div class="float-right">
					<a href="<?php echo base_url('master/kategori') ?>"class="btn btn-primary tambah-kategori"><i class="fa fa-arrow-left"></i> Kembali</a>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
				<div class="col-md-8 offset-md-2">
					<form method="POST">
						<div class="form-group">
							<label for="nama_kategori">Nama kategori</label>
							<input type="text" id="nama_kategori" name="nama_kategori" class="form-control nama_kategori <?php if(form_error('nama_kategori')) echo 'is-invalid'?>" placeholder="Nama kategori" value="<?php echo set_value('nama_kategori') ?>">
							<?php echo form_error('nama_kategori', '<small style="color:red">','</small>') ?>
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
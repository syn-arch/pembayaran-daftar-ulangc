
<div class="row">
	<div class="col-md-12">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<div class="float-left">
					<h4>Tambah Data</h4>
				</div>
				<div class="float-right">
					<a href="<?php echo base_url('master/tahun_ajaran') ?>"class="btn btn-primary tambah-tahun_ajaran"><i class="fa fa-arrow-left"></i> Kembali</a>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
				<div class="col-md-8 offset-md-2">
					<form method="POST">
						<div class="form-group">
							<label for="id_tahun_ajaran">ID Tahun ajaran</label>
							<input type="text" id="id_tahun_ajaran" name="id_tahun_ajaran" class="form-control id_tahun_ajaran <?php if(form_error('id_tahun_ajaran')) echo 'is-invalid'?>" placeholder="ID Tahun ajaran" value="<?php echo set_value('id_tahun_ajaran') ?>">
							<?php echo form_error('id_tahun_ajaran', '<small style="color:red">','</small>') ?>
						</div>
						<div class="form-group">
							<label for="tahun_ajaran">Tahun Ajaran</label>
							<input type="text" id="tahun_ajaran" name="tahun_ajaran" class="form-control tahun_ajaran <?php if(form_error('tahun_ajaran')) echo 'is-invalid'?>" placeholder="Tahun Ajaran" value="<?php echo set_value('tahun_ajaran') ?>">
							<?php echo form_error('tahun_ajaran', '<small style="color:red">','</small>') ?>
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
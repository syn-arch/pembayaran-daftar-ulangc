<div class="row">
	<div class="col-md-12">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<div class="float-left">
					<h4>Transaksi Baru</h4>
				</div>
			</div>
			<div class="card-body">

				<?php if($pesan =  $this->session->flashdata('pesan')) : ?>
					<div class="alert-message d-none"><?php echo $pesan ?></div>
				<?php endif; ?>

				<?php if($error =  $this->session->flashdata('error')) : ?>
					<div class="alert-message-error d-none"><?php echo $error ?></div>
				<?php endif; ?>

				<div class="row">
					<div class="col-md-8 offset-md-2">
						<form method="GET" enctype="multipart/form-data" action="<?php echo base_url('transaksi/detail') ?>">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="nis">NIS</label>
										<input type="text" id="nis" name="nis" class="form-control nis <?php if(form_error('nis')) echo 'is-invalid'?>" placeholder="NIS" value="<?php echo set_value('nis') ?>">
										<?php echo form_error('nis', '<small style="color:red">','</small>') ?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="id_kategori">Kategori</label>
										<select name="id_kategori" id="id_kategori" class="form-control <?php if(form_error('nis')) echo 'is-invalid'?>">
											<option value="">-- Pilih Kategori --</option>
											<?php foreach ($kategori as $row): ?>
												<option value="<?php echo $row['id_kategori'] ?>"><?php echo $row['nama_kategori'] ?></option>
											<?php endforeach ?>
										</select>
										<?php echo form_error('id_kategori', '<small style="color:red">','</small>') ?>
									</div>
								</div>
							</div>
							<div class="form-gruop">
								<button type="submit" class="btn btn-primary btn-block">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
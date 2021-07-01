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

						<?php if ($rekening): ?>
							<form method="POST" enctype="multipart/form-data">
								<input type="hidden" name="new" value="0">
								<input type="hidden" name="id_rekening" value="<?php echo $rekening['id_rekening'] ?>">
								<div class="form-group">
									<label for="bank">Nama Bank</label>
									<input type="text" id="bank" name="bank" class="form-control bank <?php if(form_error('bank')) echo 'is-invalid'?>" placeholder="Nama Bank" value="<?php echo $rekening['bank'] ?>" >
									<?php echo form_error('bank', '<small style="color:red">','</small>') ?>
								</div>
								<div class="form-group">
									<label for="atas_nama">Atas Nama</label>
									<input type="text" id="atas_nama" name="atas_nama" class="form-control atas_nama <?php if(form_error('atas_nama')) echo 'is-invalid'?>" placeholder="Atas Nama" value="<?php echo $rekening['atas_nama'] ?>">
									<?php echo form_error('atas_nama', '<small style="color:red">','</small>') ?>
								</div>
								<div class="form-group">
									<label for="no_rekening">No Rekening</label>
									<input type="text" id="no_rekening" name="no_rekening" class="form-control no_rekening <?php if(form_error('no_rekening')) echo 'is-invalid'?>" placeholder="No Rekening" value="<?php echo $rekening['no_rekening'] ?>">
									<?php echo form_error('no_rekening', '<small style="color:red">','</small>') ?>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-primary btn-block">Submit</button>
								</div>
							</form>
							<?php else: ?>
								<form method="POST" enctype="multipart/form-data">
									<input type="hidden" name="new" value="1">
									<div class="form-group">
										<label for="bank">Nama Bank</label>
										<input type="text" id="bank" name="bank" class="form-control bank <?php if(form_error('bank')) echo 'is-invalid'?>" placeholder="Nama Bank" value="<?php echo set_value('bank') ?>" >
										<?php echo form_error('bank', '<small style="color:red">','</small>') ?>
									</div>
									<div class="form-group">
										<label for="atas_nama">Atas Nama</label>
										<input type="text" id="atas_nama" name="atas_nama" class="form-control atas_nama <?php if(form_error('atas_nama')) echo 'is-invalid'?>" placeholder="Atas Nama" value="<?php echo set_value('atas_nama') ?>">
										<?php echo form_error('atas_nama', '<small style="color:red">','</small>') ?>
									</div>
									<div class="form-group">
										<label for="no_rekening">No Rekening</label>
										<input type="text" id="no_rekening" name="no_rekening" class="form-control no_rekening <?php if(form_error('no_rekening')) echo 'is-invalid'?>" placeholder="No Rekening" value="<?php echo set_value('no_rekening') ?>">
										<?php echo form_error('no_rekening', '<small style="color:red">','</small>') ?>
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-primary btn-block">Submit</button>
									</div>
								</form>
							<?php endif ?>


						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
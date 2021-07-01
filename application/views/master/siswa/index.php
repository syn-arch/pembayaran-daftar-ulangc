<div class="row">
	<div class="col-md-12">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<div class="float-left">
					<h4>Data Siswa</h4>
				</div>
				<div class="float-right">
					<a href="<?php echo base_url('excel/eksport_siswa') ?>" class="btn btn-success"><i class="fa fa-sign-out-alt"></i> Eksport</a>
					<a href="#modal-import" data-toggle="modal" class="btn btn-danger"><i class="fa fa-sign-in-alt"></i> Import</a>
					<a href="<?php echo base_url('master/tambah_siswa') ?>" class="btn btn-primary tambah-calon-siswa"><i class="fa fa-plus"></i> Tambah Siswa</a>
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
					<table class="table table-hover table-striped table-bordered" id="table-siswa">
						<thead>
							<tr>
								<th>No</th>
								<th>NIS</th>
								<th>Nama</th>
								<th>Jk</th>
                                <th>Jurusan</th>
                                <th>Kelas</th>
								<th><i class="fa fa-cogs"></i></th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-import">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Import Data Siswa</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="template">Template</label>
					<a href="<?php echo base_url('excel/template_siswa') ?>" class="btn btn-primary btn-block"><i class="fa fa-download"></i> Download Template</a>
				</div>
				<form action="<?php echo base_url('excel/import_siswa') ?>" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="file">Pilih File Excel</label>
						<input type="file" name="file" id="file" class="form-control">
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
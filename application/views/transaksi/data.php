<div class="row">
	<div class="col-md-12">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<div class="float-left">
					<h4>Data Transaksi</h4>
				</div>
				<div class="float-right">
				     <a href="<?php echo base_url('excel/export_laporan/') ?>" target="_blank" class="btn btn-success"><i class="fa fa-sign-in-alt"></i> Export</a>
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
					<table class="table table-hover table-striped table-bordered" id="data-transaksi">
						<thead>
							<tr>
								<th>No</th>
								<th>Tgl Transfer</th>
								<th>Nama</th>
								<th>Kategori</th>
								<th>Jumlah Bayar</th>
								<th>Status</th>
								<th><i class="fa fa-cogs"></i></th>
							</tr>
						</thead>
					</table>
				</div>

			</div>
		</div>
	</div>
</div>
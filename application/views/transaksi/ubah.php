<div class="row">
	<div class="col-md-12">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<div class="float-left">
					<h4>Data Transaksi</h4>
				</div>
				<div class="float-right">
					<?php if ($this->session->userdata('id_role') == 9): ?>
						<a href="<?php echo base_url('laporan/siswa') ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
					<?php else : ?>
						<a href="<?php echo base_url('transaksi/data') ?>" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
					<?php endif ?>
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
					<div class="col-md-12">
						<form method="POST" enctype="multipart/form-data">

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="nis">NIS</label>
										<input type="text" readonly="" id="nis" name="nis" class="form-control nis <?php if(form_error('nis')) echo 'is-invalid'?>" placeholder="NIS" value="<?php echo $transaksi['nis']  ?>">
										<?php echo form_error('nis', '<small style="color:red">','</small>') ?>
									</div>
									<div class="form-group">
										<label for="nama_siswa">Nama Siswa</label>
										<input type="text" readonly="" id="nama_siswa" name="nama_siswa" class="form-control nama_siswa <?php if(form_error('nama_siswa')) echo 'is-invalid'?>" placeholder="Nama Siswa" value="<?php echo $transaksi['nama_siswa'] ?>">
										<?php echo form_error('nama_siswa', '<small style="color:red">','</small>') ?>
									</div>
									<div class="form-group">
										<label for="id_kategori">Kategori</label>
										<select name="id_kategori" id="id_kategori" class="form-control <?php if(form_error('tahun_ajaran')) echo 'is-invalid'?>">
											<option value="">-- Pilih Kategori --</option>
											<?php foreach ($kategori as $row): ?>
												<option value="<?php echo $row['id_kategori'] ?>" <?= $row['id_kategori'] == $transaksi['id_kategori'] ? 'selected' : '' ?>><?php echo $row['nama_kategori'] ?></option>
											<?php endforeach ?>
										</select>
										<?php echo form_error('id_kategori', '<small style="color:red">','</small>') ?>
									</div>
									<?php if ($transaksi['nama_bank'] != ''): ?>
										<div class="form-group <?php if(form_error('nama_bank')) echo 'has-error'?>">
											<label for="nama_bank">Nama Bank</label>
											<input type="text" id="nama_bank" name="nama_bank" class="form-control nama_bank " placeholder="Nama Bank" value="<?php echo $transaksi['nama_bank'] ?>">
											<?php echo form_error('nama_bank', '<small style="color:red">','</small>') ?>
										</div>
										<div class="form-group <?php if(form_error('no_rekening')) echo 'has-error'?>">
											<label for="no_rekening">No Rekening</label>
											<input type="text" id="no_rekening" name="no_rekening" class="form-control no_rekening " placeholder="No Rekening" value="<?php echo $transaksi['no_rekening'] ?>">
											<?php echo form_error('no_rekening', '<small style="color:red">','</small>') ?>
										</div>
										<div class="form-group <?php if(form_error('atas_nama')) echo 'has-error'?>">
											<label for="atas_nama">Atas Nama</label>
											<input type="text" id="atas_nama" name="atas_nama" class="form-control atas_nama " placeholder="Atas Nama" value="<?php echo $transaksi['atas_nama'] ?>">
											<?php echo form_error('atas_nama', '<small style="color:red">','</small>') ?>
										</div>
										<div class="form-group <?php if(form_error('tgl_transaksi')) echo 'has-error'?>">
											<label for="tgl_transaksi">Tanggal Transaksi</label>
											<input type="date" id="tgl_transaksi" name="tgl_transaksi" class="form-control tgl_transaksi " placeholder="Tanggal Transaksi" value="<?php echo $transaksi['tgl_transaksi'] ?>">
											<?php echo form_error('tgl_transaksi', '<small style="color:red">','</small>') ?>
										</div>
										<div class="form-group <?php if(form_error('waktu_transfer')) echo 'has-error'?>">
											<label for="waktu_transfer">Waktu Transfer</label>
											<input type="time" id="waktu_transfer" name="waktu_transfer" class="form-control waktu_transfer " placeholder="Waktu Transfer" value="<?php echo $transaksi['waktu_transfer'] ?>">
											<?php echo form_error('waktu_transfer', '<small style="color:red">','</small>') ?>
										</div>
									<?php endif ?>
									<div class="form-group">
										<label for="jumlah_bayar">Jumlah Bayar</label>
										<input type="text" id="jumlah_bayar" name="jumlah_bayar" class="form-control jumlah_bayar <?php if(form_error('jumlah_bayar')) echo 'is-invalid'?>" placeholder="Jumlah Bayar" value="<?php echo str_replace(',', '.', number_format($transaksi['jumlah_bayar'])) ?>">
										<?php echo form_error('jumlah_bayar', '<small style="color:red">','</small>') ?>
									</div>
									<?php if ($this->session->userdata('id_role') != 9): ?>
										<div class="form-group">
											<input type="radio" name="status" id="1" value="1" <?= $transaksi['status'] == 1 ? 'checked' : '' ?>>
											<label for="1">Diterima</label><br>
											<input type="radio" name="status" id="0" value="0" <?= $transaksi['status'] == 0 ? 'checked' : '' ?>>
											<label for="0">Ditolak</label><br>
											<input type="radio" name="status" id="3" value="3" <?= $transaksi['status'] == 3 ? 'checked' : '' ?>>
											<label for="3">Pending</label><br>

											<?php echo form_error('status', '<small style="color:red">','</small>') ?>
										</div>
										<div class="form-group">
											<label for="status">Keterangan</label>
											<textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control" placeholder="Keterangan"><?= $transaksi['keterangan'] ?></textarea>
											<?php echo form_error('status', '<small style="color:red">','</small>') ?>
										</div>
									<?php endif ?>
									<div class="form-group">
										<button type="submit" class="btn btn-primary btn-block">Submit</button>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="bukti_pembayaran">Bukti Pembayaran</label>
										<input type="file" id="bukti_pembayaran" name="bukti_pembayaran" class="form-control bukti_pembayaran <?php if(form_error('bukti_pembayaran')) echo 'is-invalid'?>" placeholder="Bukti Pembayaran" value="<?php echo set_value('bukti_pembayaran') ?>">
										<?php echo form_error('bukti_pembayaran', '<small style="color:red">','</small>') ?>
									</div>
									<div class="form-group">
										<a href="<?php echo base_url('assets/img/gambar/') . $transaksi['bukti_pembayaran'] ?>" download>
											<img src="<?php echo base_url('assets/img/gambar/') . $transaksi['bukti_pembayaran'] ?>" alt="" class="img-fluid">
										</a>
									</div>

									<div class="form-group">
										<label for="ijazah1">Ijazah lembar 1</label>
										<input type="file" id="ijazah1" name="ijazah1" class="form-control ijazah1 <?php if(form_error('ijazah1')) echo 'is-invalid'?>" value="<?php echo set_value('ijazah1') ?>">
										<?php echo form_error('ijazah1', '<small style="color:red">','</small>') ?>
									</div>
									<div class="form-group">
										<label for="">IJAZAH lembar 1</label>
										<a href="<?php echo base_url('assets/img/gambar/') . $transaksi['ijazah1'] ?>" download>
											<img src="<?php echo base_url('assets/img/gambar/') . $transaksi['ijazah1'] ?>" alt="" class="img-fluid mt-4">
										</a>
									</div>
									<div class="form-group">
										<label for="ijazah2">Ijazah lembar 2</label>
										<input type="file" id="ijazah2" name="ijazah2" class="form-control ijazah2 <?php if(form_error('ijazah2')) echo 'is-invalid'?>" value="<?php echo set_value('ijazah2') ?>">
										<?php echo form_error('ijazah2', '<small style="color:red">','</small>') ?>
									</div>
									<div class="form-group">
										<label for="">IJAZAH lembar 2</label>
										<a href="<?php echo base_url('assets/img/gambar/') . $transaksi['ijazah2'] ?>" download>
											<img src="<?php echo base_url('assets/img/gambar/') . $transaksi['ijazah2'] ?>" alt="" class="img-fluid mt-4">
										</a>
									</div>
									<div class="form-group">
										<label for="raport1">Raport lembar 1</label>
										<input type="file" id="raport1" name="raport1" class="form-control raport1 <?php if(form_error('raport1')) echo 'is-invalid'?>" value="<?php echo set_value('raport1') ?>">
										<?php echo form_error('raport1', '<small style="color:red">','</small>') ?>
									</div>
									<div class="form-group">
										<label for="">RAPORT SEMESTER AKHIR lembar 1</label>
										<a href="<?php echo base_url('assets/img/gambar/') . $transaksi['raport1'] ?>" download>
											<img src="<?php echo base_url('assets/img/gambar/') . $transaksi['raport1'] ?>" alt="" class="img-fluid mt-4">
										</a>
									</div>
									<div class="form-group">
										<label for="raport2">Raport lembar 2</label>
										<input type="file" id="raport2" name="raport2" class="form-control raport2 <?php if(form_error('raport2')) echo 'is-invalid'?>" value="<?php echo set_value('raport2') ?>">
										<?php echo form_error('raport2', '<small style="color:red">','</small>') ?>
									</div>
									<div class="form-group">
										<label for="">RAPORT SEMESTER AKHIR lembar 2</label>
										<a href="<?php echo base_url('assets/img/gambar/') . $transaksi['raport2'] ?>" download>
											<img src="<?php echo base_url('assets/img/gambar/') . $transaksi['raport2'] ?>" alt="" class="img-fluid mt-4">
										</a>
									</div>



								</div>
							</div>


							
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
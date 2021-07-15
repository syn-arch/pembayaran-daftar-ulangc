<div class="row">
	<div class="col-md-12">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<div class="float-left">
					<h4>Detail Transaksi</h4>
				</div>
				<div class="float-right">
					<?php if ($this->session->userdata('id_role') === 9): ?>
						<a href="<?php echo base_url('transaksi/siswa') ?>" class="btn btn-primary">
							<i class="fa fa-arrow-left"></i> Kembali
						</a>
					<?php else : ?>
						<a href="<?php echo base_url('transaksi') ?>" class="btn btn-primary">
							<i class="fa fa-arrow-left"></i> Kembali
						</a>
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
					<div class="col-md-5">
						<table class="table table-borderless">
							<tr>
								<th>Nama</th>
								<td><?php echo $siswa['nama_siswa'] ?></td>
							</tr>
							<tr>
								<th>NIS</th>
								<td><?php echo $siswa['nis'] ?></td>
							</tr>
							<tr>
								<th>Jurusan</th>
								<td><?php echo $siswa['nama_jurusan'] ?></td>
							</tr>
							<tr>
								<th>Tahun Ajaran</th>
								<td><?php echo $siswa['tahun_ajaran'] ?></td>
							</tr>
						</table>

						<?php if ($this->session->userdata('id_role') === 9): ?>
							*Anda dapat transfer melalui no rekening dibawah
							<table class="table mt-4">
								<tr>
									<th>Bank Penerima</th>
									<td><?php echo $rekening['nama_bank'] ?></td>
								</tr>
								<tr>
									<th>Atas Nama Penerima</th>
									<td><?php echo $rekening['atas_nama'] ?></td>
								</tr>
								<tr>
									<th>No. Rekening Penerima</th>
									<td><?php echo $rekening['no_rekening'] ?></td>
								</tr>
							</table>
						<?php endif ?>
					</div>
					<div class="col-md-7">
						<table class="table table-borderless">
							<tr>
								<th>Kategori</th>
								<td><?php echo $pembayaran['nama_kategori'] ?></td>
							</tr>
							<tr>
								<th>Total Pembayaran</th>
								<td><?php echo "Rp. " . number_format($pembayaran['nominal']) ?></td>
							</tr>
							<tr>
								<th>Sudah Dibayar</th>
								<td><?php echo "Rp. " . number_format($sudah_dibayar) ?></td>
							</tr>
							<tr>
								<th>Belum Dibayar</th>
								<td><?php echo "Rp. " . number_format($belum_dibayar) ?></td>
							</tr>
							<tr>
								<th>Status</th>
								<td><?php echo $status ?></td>
							</tr>
							<?php if ($status != "LUNAS"): ?>
								<form method="post" enctype="multipart/form-data">
									<input type="hidden" name="nis" value="<?php echo $siswa['nis'] ?>">
									<input type="hidden" name="id_kategori" value="<?php echo $pembayaran['id_kategori'] ?>">
									<?php if ($this->session->userdata('id_role') == 9): ?>
										<tr>
											<th>Nama Bank Pengirim)*</th>
											<td><input type="text" name="nama_bank" placeholder="Nama Bank" class="form-control <?php if(form_error('nama_bank')) echo 'is-invalid'?>" autocomplete="off"></td>
										</tr>
										<tr>
											<th>Nama Pemilik Rekening Pengirim)*</th>
											<td><input type="text" name="atas_nama" placeholder="Atas Nama" class="form-control <?php if(form_error('atas_nama')) echo 'is-invalid'?>" autocomplete="off"></td>
										</tr>
										<tr>
											<th>No Rekening Pengirim)*</th>
											<td><input type="text" name="no_rekening" placeholder="No Rekening" class="form-control <?php if(form_error('no_rekening')) echo 'is-invalid'?>" autocomplete="off"></td>
										</tr>
									<?php endif ?>
									<tr>
										<th>Jumlah Bayar )*</th>
										<td><input type="text" name="jumlah_bayar" placeholder="Jumlah Bayar" class="form-control jml-byr <?php if(form_error('jumlah_bayar')) echo 'is-invalid'?>" autocomplete="off">
										</td>
									</tr>
									<tr>
										<th>Bukti Transfer</th>
										<td><input required type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="form-control <?php if(form_error('bukti_pembayaran')) echo 'is-invalid'?>"></td>
									</tr>
									<tr>
										<th>Tanggal Transfer</th>
										<td><input required type="date" name="tgl_transaksi" id="tgl_transaksi" class="form-control <?php if(form_error('tgl_transaksi')) echo 'is-invalid'?>"></td>
									</tr>
									<tr>
										<th>Waktu Transfer</th>
										<td><input required type="datetime-local" name="waktu_transfer" id="waktu_transfer" class="form-control <?php if(form_error('waktu_transfer')) echo 'is-invalid'?>"></td>
									</tr>
									<?php if ($pembayaran['nama_kategori'] == 'Daftar Ulang'): ?>
										<tr>
											<th>Scan Raport Semester Akhir lembar 1 )*</th>
											<td>
												<input type="file" name="raport1" class="form-control" required>
											</td>
										</tr>	
										<tr>
											<th>Scan Raport Semester Akhir lembar 2 )*</th>
											<td>
												<input type="file" name="raport2" class="form-control" required>
											</td>
										</tr>	
										<tr>
											<th>Scan ijazah / fotokopi yang sudah dilegalisir lembar 1 )*</th>
											<td>
												<input type="file" name="ijazah1" class="form-control" required>
											</td>
										</tr>	
										<tr>
											<th>Scan ijazah / fotokopi yang sudah dilegalisir lembar 2</th>
											<td>
												<input type="file" name="ijazah2" class="form-control">
											</td>
										</tr>	
									<?php endif ?>
									<tr>
										<td colspan=2>
											<button type="submit" class="btn btn-primary btn-block">Submit</button>
										</td>
									</tr>
								</form>
							<?php endif ?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
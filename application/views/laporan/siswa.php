<div class="row">
	<div class="col-md-12">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<div class="float-left">
					<h4>Detail Laporan</h4>
				</div>
				<div class="float-right">
					<a href="<?php echo base_url('laporan/cetak_siswa') ?>" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</a>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<table class="table">
							<tr>
								<th>Nama Siswa</th>
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
						</table>
					</div>
				</div>
				<div class="table-responsive mt-3">
					<table class="table table-bordered table-striped table-hover tables">
						<thead>
							<tr>
								<th>No</th>
								<th>Tanggal Transaksi</th>
								<th>Tanggal Transfer</th>
								<th>Kategori</th>
								<th>nominal</th>
								<th>Jumlah Bayar</th>
								<th>Status</th>
								<th><i class="fa fa-cogs"></i></th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach ($laporan as $row): ?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo date('d-m-Y', strtotime($row['tgl'])) ?></td>
								<td><?php echo date('d-m-Y', strtotime($row['tgl_transaksi'])) ?></td>
								<td><?php echo $row['nama_kategori'] ?></td>
								<?php 
								$data_pembayaran = [
									'id_kategori' => $row['id_kategori'],
									'id_jurusan' => $siswa['id_jurusan'], 
									'id_tahun_ajaran' => $siswa['id_tahun_ajaran']
								];

								$this->db->join('kategori', 'id_kategori');
								$this->db->join('jurusan', 'id_jurusan');
								$pb = $this->db->get_where('pembayaran', $data_pembayaran)->row_array();
								?>
								<td><?php echo "Rp. "  . number_format($pb['nominal']) ?></td>
								<td><?php echo "Rp. "  . number_format($row['jumlah_bayar']) ?></td>
								<td>
									<?php if ($row['status'] == 1) : ?>
										<button class="btn btn-success">DITERIMA</button>
										<?php elseif($row['status'] == 3) : ?>
											<button class="btn btn-warning">PENDING</button>
											<?php else : ?>
												<button class="btn btn-danger">DITOLAK</button>
											<?php endif ?>
										</td>
										<td>
											<a href="<?php echo base_url('transaksi/invoice/' . $row['id_transaksi']) . '?url=' .$url ?>" class="btn btn-primary">
												<i class="fa fa-print"></i>
											</a>
											<a href="<?php echo base_url('transaksi/ubah/') . $row['id_transaksi'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>

				</div>
			</div>
		</div>
	</div>

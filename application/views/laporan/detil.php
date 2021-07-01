<div class="row">
	<div class="col-md-12">
		<div class="card card-primary card-outline">
			<div class="card-header">
				<div class="float-left">
					<h4>Detail Laporan</h4>
				</div>
				<div class="float-right">
				    
					<a href="<?php echo base_url($url) ?>" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</a>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<table class="table">
							<tr>
								<td>Kategori</td>
								<td><?php echo $kategori['nama_kategori'] ?></td>
							</tr>
							<tr>
								<td>Kelas</td>
								<td><?php echo $kelas['nama_kelas'] ?></td>
							</tr>
							<tr>
								<td>Tahun Ajaran</td>
								<td><?php echo $tahun_ajaran['tahun_ajaran'] ?></td>
							</tr>
							<tr>
								<td>Nominal</td>
								<td><?php echo 'Rp. ' . number_format($pembayaran['nominal']) ?></td>
							</tr>
							<tr>
								<td>Total Pendapatan</td>
								<td><?php echo 'Rp. ' . number_format($total) ?></td>
							</tr>
						</table>
					</div>
				</div>

				<div class="table-responsive mt-3">
					<table class="table table-bordered table-striped table-hover tables">
						<thead>
							<tr>
								<th>No</th>
								<th>NIS</th>
								<th>Nama Siswa</th>
								<th>Tanggal Transfer</th>
								<th>Tanggal Transaksi</th>
								<th>Jumlah Bayar</th>
								<th>Sisa Bayar</th>
								<th>Lunas</th>
								<th><i class="fa fa-cogs"></i></th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach ($result as $row): ?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $row['nis'] ?></td>
								<td><?php echo $row['nama_siswa'] ?></td>
								<?php if ($row['tgl'] != ''): ?>
								    <td><?php echo date('d-m-Y', strtotime($row['tgl_transaksi'])) ?></td>
									<td><?php echo date('d-m-Y', strtotime($row['tgl'])) ?></td>
									<?php else: ?>
										<td></td>
									<?php endif; ?>
									<td><?php echo "Rp. "  . number_format($row['jumlah_bayar']) ?></td>
									<?php 
									$this->db->select_sum('jumlah_bayar');
									$this->db->where('id_kategori', 3);
									$jumlah_bayar = $this->db->get_where('transaksi', ['nis' => $row['nis']])->row_array()['jumlah_bayar'];
									?>
									<td><?php echo "Rp. "  . number_format($pembayaran['nominal'] - $jumlah_bayar) ?></td>
									<td>
										<?php if ($jumlah_bayar == $pembayaran['nominal']): ?>
											<button class="btn btn-success">LUNAS</button>
											<?php else :?>
												<button class="btn btn-warning">BELUM LUNAS</button>
											<?php endif;?>
										</td>
										<td>
											<?php if ($row['jumlah_bayar']): ?>
												<a target="_blank" href="<?php echo base_url('transaksi/invoice/' . $row['id_transaksi']) . '?url=' .$url ?>" class="btn btn-primary">
													<i class="fa fa-print"></i>
												</a>
												<?php else :?>
													<a href="#" class="btn btn-primary disabled">
														<i class="fa fa-print"></i>
													</a>
												<?php endif;?>
											</td>
										</tr>
									<?php endforeach ?>
								</tbody>
							</table>
						</div>

					</div>
				</div>
			</div>
		</div>

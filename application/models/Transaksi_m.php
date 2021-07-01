<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_m extends CI_Model {

	public function get_transaksi($id='')
	{
		if ($id ==  '') {
			return $this->db->get('transaksi')->result_array();
		}else{
			$this->db->select('*, transaksi.tgl');
			$this->db->join('kategori', 'id_kategori');
			$this->db->join('siswa', 'nis');
			$this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
			return $this->db->get_where('transaksi', ['id_transaksi' => $id])->row_array();
		}
	}

	public function resizeImage($filename)
	{
		$source_path = './assets/img/gambar/' . $filename;
		$target_path = './assets/img/gambar/';
		$config_manip = array(
			'image_library' => 'gd2',
			'source_image' => $source_path,
			'new_image' => $target_path,
			'maintain_ratio' => TRUE,
			'width' => 1000,
		);

		$this->image_lib->initialize($config_manip);
		$this->image_lib->resize();
		$this->image_lib->clear();
	}
	

	private function _upload_bukti($name = '', $url = 'transaksi/bayar')
	{
		$config['upload_path'] = './assets/img/gambar/';
		$config['allowed_types'] = 'jpeg|jpg|png|pdf';
		$config['max_size'] = '9048';
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload($name)){
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('error', $error);

			if ($this->session->userdata('id_role') == 9) {
				redirect($url,'refresh');
			}
			redirect('transaksi','refresh');
		}

		$gb = $this->upload->data('file_name');

		return $gb;
	}

	function get_all_transaksi() {
		$petugas = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();


		$this->datatables->select('transaksi.tgl_transaksi,transaksi.tgl, nama_siswa, nama_kategori, jumlah_bayar, status, id_transaksi, id_siswa, siswa.id_jurusan');
		$this->datatables->from('transaksi');
		$this->datatables->join('kategori', 'transaksi.id_kategori=kategori.id_kategori');
		$this->datatables->join('siswa', 'transaksi.nis=siswa.nis');
		$this->datatables->join('jurusan', 'siswa.id_jurusan=jurusan.id_jurusan');
		if ($this->session->userdata('petugas') == 1){
			$this->datatables->where('siswa.id_jurusan', $petugas['id_jurusan']);
		}
		$this->db->order_by('tgl_transaksi', 'desc');
		return $this->datatables->generate();
	}

	public function delete($id='')
	{
		$gb_lama = $this->get_transaksi($id)['bukti_pembayaran'];
		unlink(FCPATH . '/assets/img/gambar/' . $gb_lama);
		$this->db->delete('transaksi', ['id_transaksi' => $id]);
	}

	public function konfirmasi($id_transaksi)
	{
		$this->db->set('status', 1);
		$this->db->where('id_transaksi', $id_transaksi);
		$this->db->update('transaksi');
	}

	public function insert()
	{
		$post = $this->input->post();
		$this->db->join('tahun_ajaran', 'id_tahun_ajaran', 'left');
		$siswa = $this->db->get_where('siswa', ['nis' => $post['nis']])->row_array();
		$id_siswa = $siswa['id_siswa'];
		$kategori = $this->km->get_kategori($post['id_kategori']);

		$bukti_pembayaran = $this->_upload_bukti('bukti_pembayaran');

		$data = [
			'nis' => $post['nis'],
			'id_kategori' => $post['id_kategori'],
			'jumlah_bayar' => str_replace('.', '', $post['jumlah_bayar']),
			'tgl_transaksi' => $post['tgl_transaksi'],
			'waktu_transfer' => $post['waktu_transfer'],
			'tahun_dibayar' => date('Y'),
			'bukti_pembayaran' => $bukti_pembayaran
		];

		if ($siswa['tahun_ajaran'] != date('Y') && $kategori['nama_kategori'] == 'Daftar Ulang') {

			$ijazah1 = $this->_upload_bukti('ijazah1');
			$ijazah2 = $this->_upload_bukti('ijazah2');
			$raport1 = $this->_upload_bukti('raport1');
			$raport2 = $this->_upload_bukti('raport2');

			$data['raport1'] = $raport1;
			$data['ijazah1'] = $ijazah1;
			$data['ijazah2'] = $ijazah2;
			$data['raport2'] = $raport2;

			$this->resizeImage($bukti_pembayaran);
			$this->resizeImage($ijazah1);
			$this->resizeImage($ijazah2);
			$this->resizeImage($shun1);
			$this->resizeImage($shun2);
			$this->resizeImage($raport1);
			$this->resizeImage($raport2);

		}

		if ($this->session->userdata('id_role') == 9) {
			$data['nama_bank'] = $post['nama_bank'];
			$data['atas_nama'] = $post['atas_nama'];
			$data['no_rekening'] = $post['no_rekening'];
		}
		
		if ($this->session->userdata('id_role') != 9) {
			$data['status'] = 1;
		}else{
			$data['status'] = 3;
		}

		$this->db->insert('transaksi', $data);
	}

	public function update($id_transaksi)
	{
		$post = $this->input->post();

		$data = [
			'jumlah_bayar' => str_replace('.', '', $post['jumlah_bayar']),
			'id_kategori' => $post['id_kategori'],
			'keterangan' => $post['keterangan'],
			'waktu_transfer' => $post['waktu_transfer'],
			'tahun_dibayar' => date('Y')
		];
		
		$data['nama_bank'] = $post['nama_bank'];
		$data['atas_nama'] = $post['atas_nama'];
		$data['no_rekening'] = $post['no_rekening'];

		if ($this->session->userdata('id_role') != 9) {
			$data['status'] = $post['status'];
		}else{
			$data['status'] = '3';
		}

		if ($_FILES['bukti_pembayaran']['name']) {
			$gb_lama = $this->get_transaksi($id_transaksi)['bukti_pembayaran'];
			unlink(FCPATH . '/assets/img/gambar/' . $gb_lama);
			$data['bukti_pembayaran'] = $this->_upload_bukti('bukti_pembayaran', 'transaksi/ubah/' . $id_transaksi);
		}
		if ($_FILES['ijazah1']['name']) {
			$gb_lama = $this->get_transaksi($id_transaksi)['ijazah1'];
			unlink(FCPATH . '/assets/img/gambar/' . $gb_lama);
			$data['ijazah1'] = $this->_upload_bukti('ijazah1', 'transaksi/ubah/' . $id_transaksi);
		}
		if ($_FILES['ijazah2']['name']) {
			$gb_lama = $this->get_transaksi($id_transaksi)['ijazah2'];
			unlink(FCPATH . '/assets/img/gambar/' . $gb_lama);
			$data['ijazah2'] = $this->_upload_bukti('ijazah2', 'transaksi/ubah/' . $id_transaksi);
		}
		if ($_FILES['raport1']['name']) {
			$gb_lama = $this->get_transaksi($id_transaksi)['raport1'];
			unlink(FCPATH . '/assets/img/gambar/' . $gb_lama);
			$data['raport1'] = $this->_upload_bukti('raport1', 'transaksi/ubah/' . $id_transaksi);
		}
		if ($_FILES['raport2']['name']) {
			$gb_lama = $this->get_transaksi($id_transaksi)['raport2'];
			unlink(FCPATH . '/assets/img/gambar/' . $gb_lama);
			$data['raport2'] = $this->_upload_bukti('raport2', 'transaksi/ubah/' . $id_transaksi);
		}

		$this->db->where('id_transaksi', $id_transaksi);
		$this->db->update('transaksi', $data);
	}
}

/* End of file transaksi_m.php */
/* Location: ./application/models/transaksi_m.php */ ?>
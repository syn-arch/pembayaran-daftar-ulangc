<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pembayaran_m extends CI_Model {

	public function get_pembayaran($id='')
	{
		if ($id ==  '') {
					$this->db->join('kategori', 'id_kategori');
					$this->db->join('jurusan', 'id_jurusan');
					$this->db->join('tahun_ajaran', 'id_tahun_ajaran');
			return $this->db->get('pembayaran')->result_array();
		}else{
			return $this->db->get_where('pembayaran', ['id_pembayaran' => $id])->row_array();
		}
	}
	public function get_data_transaksi($nis, $id_kategori)
	{
		$this->db->join('siswa', 'nis');
		$this->db->join('kategori', 'id_kategori');
		return $this->db->get_where('transaksi', ['nis' => $nis, 'id_kategori' => $id_kategori])->row_array();
	}

	function get_all_pembayaran() {
		$this->datatables->select('nama_pembayaran, singkatan, id_pembayaran');
		$this->datatables->from('pembayaran');
		return $this->datatables->generate();
	}

	public function delete($id='')
	{
		$this->db->delete('pembayaran', ['id_pembayaran' => $id]);
	}

	public function insert()
	{
		$post = $this->input->post();

		$data = [
			'id_kategori' => $post['id_kategori'],
			'id_jurusan' => $post['id_jurusan'],
			'nominal' => $post['nominal'],
			'id_tahun_ajaran' => $post['id_tahun_ajaran']
		];
		$this->db->insert('pembayaran', $data);
	}

	public function update($id_pembayaran)
	{
		$post = $this->input->post();

		$data = [
			'id_kategori' => $post['id_kategori'],
			'id_jurusan' => $post['id_jurusan'],
			'nominal' => $post['nominal'],
			'id_tahun_ajaran' => $post['id_tahun_ajaran']
		];

		$this->db->where('id_pembayaran', $id_pembayaran);
		$this->db->update('pembayaran', $data);
	}

	
}

/* End of file pembayaran_m.php */
/* Location: ./application/models/pembayaran_m.php */ ?>
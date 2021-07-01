<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kategori_m extends CI_Model {

	public function get_kategori($id='')
	{
		if ($id ==  '') {
			return $this->db->get('kategori')->result_array();
		}else{
			return $this->db->get_where('kategori', ['id_kategori' => $id])->row_array();
		}
	}

	function get_all_kategori() {
		$this->datatables->select('nama_kategori, singkatan, id_kategori');
		$this->datatables->from('kategori');
		return $this->datatables->generate();
	}

	public function delete($id='')
	{
		$this->db->delete('kategori', ['id_kategori' => $id]);
	}

	public function insert()
	{
		$post = $this->input->post();

		$data = [
			'nama_kategori' => $post['nama_kategori']
		];
		$this->db->insert('kategori', $data);
	}

	public function update($id_kategori)
	{
		$post = $this->input->post();

		$data = [
			'nama_kategori' => $post['nama_kategori']
		];

		$this->db->where('id_kategori', $id_kategori);
		$this->db->update('kategori', $data);
	}

	
}

/* End of file kategori_m.php */
/* Location: ./application/models/kategori_m.php */ ?>
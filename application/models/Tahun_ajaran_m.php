<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun_ajaran_m extends CI_Model {

	public function get_tahun_ajaran($id='')
	{
		if ($id ==  '') {
			return $this->db->get('tahun_ajaran')->result_array();
		}else{
			return $this->db->get_where('tahun_ajaran', ['id_tahun_ajaran' => $id])->row_array();
		}
	}

	function get_all_tahun_ajaran() {
		$this->datatables->select('tahun_ajaran, id_tahun_ajaran');
		$this->datatables->from('tahun_ajaran');
		return $this->datatables->generate();
	}

	public function delete($id='')
	{
		$this->db->delete('tahun_ajaran', ['id_tahun_ajaran' => $id]);
	}

	public function insert()
	{
		$post = $this->input->post();

		$data = [
			'id_tahun_ajaran' => $post['id_tahun_ajaran'],
			'tahun_ajaran' => $post['tahun_ajaran']
		];
		$this->db->insert('tahun_ajaran', $data);
	}

	public function update($id_tahun_ajaran)
	{
		$post = $this->input->post();

		$data = [
			'tahun_ajaran' => $post['tahun_ajaran']
		];

		$this->db->where('id_tahun_ajaran', $id_tahun_ajaran);
		$this->db->update('tahun_ajaran', $data);
	}

	
}

/* End of file tahun_ajaran_m.php */
/* Location: ./application/models/tahun_ajaran_m.php */ ?>
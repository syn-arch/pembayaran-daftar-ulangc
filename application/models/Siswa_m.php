<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_m extends CI_Model {

	public function get_siswa($id='')
	{
		if ($id ==  '') {
			$this->db->join('kelas', 'id_kelas');
			$this->db->join('tahun_ajaran', 'id_tahun_ajaran');
			$this->db->join('jurusan', 'jurusan.id_jurusan = siswa.id_jurusan');
			return $this->db->get_where('siswa')->result_array();
		}else{
			$this->db->join('jurusan', 'jurusan.id_jurusan = siswa.id_jurusan');
			$this->db->join('kelas', 'id_kelas');
			$this->db->join('tahun_ajaran', 'id_tahun_ajaran');
			return $this->db->get_where('siswa', ['id_siswa' => $id])->row_array();
		}
	}

	function get_all_siswa() {

		$id_user = $this->session->userdata('id_user');
		$user = $this->db->get_where('user', ['id_user' => $id_user])->row_array();

		if($user['petugas']){
			$id_jurusan = $user['id_jurusan'];

			$this->datatables->join('kelas', 'id_kelas');
			$this->datatables->join('jurusan', 'jurusan.id_jurusan = siswa.id_jurusan');
			$this->datatables->select('id_siswa, nama_siswa, jk, nis, nama_jurusan, nama_kelas');
			$this->datatables->where('id_jurusan', $id_jurusan);
			$this->datatables->from('siswa');
			return $this->datatables->generate();
		}

		$this->datatables->join('kelas', 'id_kelas');
		$this->datatables->join('jurusan', 'jurusan.id_jurusan = siswa.id_jurusan');
		$this->datatables->select('id_siswa, nama_siswa, jk, nis, nama_jurusan, nama_kelas');
		$this->datatables->from('siswa');
		return $this->datatables->generate();
	}

	public function delete($id)
	{
		$this->db->delete('siswa', ['id_siswa' => $id]);
	}

	public function insert()
	{
		$post = $this->input->post();

		$data = [
			'nama_siswa' => $post['nama_siswa'],
			'nis' => $post['nis'],
			'jk' => $post['jk'],
			'id_jurusan' => $post['id_jurusan'],
			'id_tahun_ajaran' => $post['id_tahun_ajaran'],
			'tgl' => $post['tgl'],
			'id_kelas' => $post['id_kelas']
		];

		$this->db->insert('siswa', $data);
	}

	public function update($id_siswa)
	{
		$post = $this->input->post();

		$data = [
			'nama_siswa' => $post['nama_siswa'],
			'nis' => $post['nis'],
			'jk' => $post['jk'],
			'id_tahun_ajaran' => $post['id_tahun_ajaran'],
			'id_jurusan' => $post['id_jurusan'],
			'tgl' => $post['tgl'],
			'id_kelas' => $post['id_kelas']
		];

		$this->db->where('id_siswa', $id_siswa);
		$this->db->update('siswa', $data);
	}

	
}

/* End of file calon_siswa_m.php */
/* Location: ./application/models/calon_siswa_m.php */ ?>
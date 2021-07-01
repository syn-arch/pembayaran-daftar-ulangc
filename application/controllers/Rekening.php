<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cek_login();
	}

	public function index()
	{
		$data['judul'] = "Rekening Saya";
		$data['rekening'] = $this->db->get('rekening', ['id_siswa' => $this->session->userdata('id_siswa')] )->row_array();

		$valid = $this->form_validation;
		$valid->set_rules('atas_nama', 'atas_nama', 'required');
		$valid->set_rules('bank', 'bank', 'required');
		$valid->set_rules('no_rekening', 'no_rekening', 'required');

		if ($valid->run()) {
			$post = $this->input->post();

			if (!$post['new']) {
				$data = [
					'id_siswa' => $this->session->userdata('id_siswa'),
					'bank' => $post['bank'],
					'atas_nama' => $post['atas_nama'],
					'no_rekening' => $post['no_rekening']
				];
				
				$this->db->where('id_rekening', $post['id_rekening']);
				$this->db->update('rekening', $data);

				$this->session->set_flashdata('pesan', 'diubah');
				redirect('rekening','refresh');
			}else{
				$data = [
					'id_siswa' => $this->session->userdata('id_siswa'),
					'bank' => $post['bank'],
					'atas_nama' => $post['atas_nama'],
					'no_rekening' => $post['no_rekening']
				];

				$this->db->insert('rekening', $data);

				$this->session->set_flashdata('pesan', 'ditambah');
				redirect('rekening','refresh');
			}

		}

		$this->load->view('template/header', $data);
		$this->load->view('rekening', $data);
		$this->load->view('template/footer');
	}
}

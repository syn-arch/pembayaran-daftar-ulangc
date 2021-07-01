<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan_pembayaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('datatables');
		cek_login();
	}

	public function index()
	{
		$valid = $this->form_validation;
		$valid->set_rules('nama_bank','nama bank','required');
		$valid->set_rules('atas_nama','atas nama','required');
		$valid->set_rules('no_rekening','no rekening','required');

		if ($valid->run()) {

			$post = $this->input->post();

			$data = [
				'nama_bank' => $post['nama_bank'],
				'atas_nama' => $post['atas_nama'],
				'pesan' => $post['pesan'],
				'no_rekening' => $post['no_rekening']
			];

			$this->db->update('pengaturan_pembayaran', $data);

			$data_p = [
				'pengumuman' => $post['pengumuman'],
				'tgl_buka' => $post['tgl_buka'],
				'tgl_tutup' => $post['tgl_tutup']
			];

			$this->db->update('pengaturan', $data_p);

			$this->session->set_flashdata('pesan', 'diubah');
			redirect('pengaturan_pembayaran','refresh');
		}

		$data['judul'] = "Pengaturan Pembayaran";
		$data['pengaturan'] = $this->db->get('pengaturan_pembayaran')->row_array();
		$data['pengaturan_p'] = $this->db->get('pengaturan')->row_array();

		$this->load->view('template/header', $data);
		$this->load->view('pengaturan_pembayaran', $data);
		$this->load->view('template/footer');
	}

}


<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tahun_ajaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('datatables');
		$this->load->model('tahun_ajaran_m','jm');
		cek_login();
	}

	public function index()
	{
		$data['judul'] = "Data Tahun Ajaran";
		$data['role'] = $this->jm->get_tahun_ajaran();

		$this->load->view('template/header', $data);
		$this->load->view('master/tahun_ajaran/index', $data);
		$this->load->view('template/footer');
	}

	public function hapus($id='')
	{
		$this->jm->delete($id);
		$this->session->set_flashdata('pesan', 'dihapus');
		redirect('master/tahun_ajaran','refresh');
	}

	function get_tahun_ajaran_json() {
		header('Content-Type: application/json');
		echo $this->jm->get_all_tahun_ajaran();
	}

	public function tambah()
	{
		$valid = $this->form_validation;
		$valid->set_rules('tahun_ajaran','Nama tahun_ajaran','required');

		if ($valid->run()) {
			$this->jm->insert();
			$this->session->set_flashdata('pesan', 'ditambah');
			redirect('master/tahun_ajaran','refresh');
		}

		$data['judul'] = "Tambah tahun ajaran";

		$this->load->view('template/header', $data);
		$this->load->view('master/tahun_ajaran/tambah', $data);
		$this->load->view('template/footer');
	}

	public function get_tahun_ajaran($id = '')
	{
		echo json_encode($this->jm->get_tahun_ajaran($id));
	}

	public function ubah($id_tahun_ajaran)
	{
		$valid = $this->form_validation;
		$valid->set_rules('tahun_ajaran','Nama tahun_ajaran','required');

		if ($valid->run()) {
			$this->jm->update($id_tahun_ajaran);
			$this->session->set_flashdata('pesan', 'diubah');
			redirect('master/tahun_ajaran','refresh');
		}

		$data['judul'] = "Ubah tahun ajaran";
		$data['tahun_ajaran'] = $this->jm->get_tahun_ajaran($id_tahun_ajaran);

		$this->load->view('template/header', $data);
		$this->load->view('master/tahun_ajaran/ubah', $data);
		$this->load->view('template/footer');
	}

}

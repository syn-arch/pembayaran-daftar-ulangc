<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('datatables');
		$this->load->model('kategori_m','jm');
		cek_login();
	}

	public function index()
	{
		$data['judul'] = "Data Kategori";
		$data['role'] = $this->jm->get_kategori();

		$this->load->view('template/header', $data);
		$this->load->view('master/kategori/index', $data);
		$this->load->view('template/footer');
	}

	public function hapus($id='')
	{
		$this->jm->delete($id);
		$this->session->set_flashdata('pesan', 'dihapus');
		redirect('master/kategori','refresh');
	}

	function get_kategori_json() {
		header('Content-Type: application/json');
		echo $this->jm->get_all_kategori();
	}

	public function tambah()
	{
		$valid = $this->form_validation;
		$valid->set_rules('nama_kategori','Nama kategori','required');

		if ($valid->run()) {
			$this->jm->insert();
			$this->session->set_flashdata('pesan', 'ditambah');
			redirect('master/kategori','refresh');
		}

		$data['judul'] = "Tambah kategori";

		$this->load->view('template/header', $data);
		$this->load->view('master/kategori/tambah', $data);
		$this->load->view('template/footer');
	}

	public function get_kategori($id = '')
	{
		echo json_encode($this->jm->get_kategori($id));
	}

	public function ubah($id_kategori)
	{
		$valid = $this->form_validation;
		$valid->set_rules('nama_kategori','Nama kategori','required');

		if ($valid->run()) {
			$this->jm->update($id_kategori);
			$this->session->set_flashdata('pesan', 'diubah');
			redirect('master/kategori','refresh');
		}

		$data['judul'] = "Ubah kategori";
		$data['kategori'] = $this->jm->get_kategori($id_kategori);

		$this->load->view('template/header', $data);
		$this->load->view('master/kategori/ubah', $data);
		$this->load->view('template/footer');
	}

}

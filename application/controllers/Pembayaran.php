<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pembayaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('datatables');
		$this->load->model('pembayaran_m','pm');
		$this->load->model('kategori_m','km');
		$this->load->model('jurusan_m','jm');
		$this->load->model('kelas_m','kkm');
		$this->load->model('Tahun_ajaran_m','tam');
		cek_login();
	}

	public function index()
	{
		$data['judul'] = "Data Pembayaran";
		$data['pembayaran'] = $this->pm->get_pembayaran();

		$this->load->view('template/header', $data);
		$this->load->view('master/pembayaran/index', $data);
		$this->load->view('template/footer');
	}

	public function hapus($id='')
	{
		$this->pm->delete($id);
		$this->session->set_flashdata('pesan', 'dihapus');
		redirect('master/pembayaran','refresh');
	}

	function get_pembayaran_json() {
		header('Content-Type: application/json');
		echo $this->pm->get_all_pembayaran();
	}

	public function tambah()
	{
		$valid = $this->form_validation;
		$valid->set_rules('id_kategori','kategori','required');
		$valid->set_rules('id_jurusan','jurusan','required');
		$valid->set_rules('id_tahun_ajaran','id_tahun_ajaran','required');
		$valid->set_rules('nominal','nominal','required');

		if ($valid->run()) {
			$this->pm->insert();
			$this->session->set_flashdata('pesan', 'ditambah');
			redirect('master/pembayaran','refresh');
		}

		$data['judul'] = "Tambah pembayaran";
		$data['kategori'] = $this->km->get_kategori();
		$data['jurusan'] = $this->jm->get_jurusan();
		$data['kelas'] = $this->kkm->get_kelas();
		$data['tahun_ajaran'] = $this->tam->get_tahun_ajaran();

		$this->load->view('template/header', $data);
		$this->load->view('master/pembayaran/tambah', $data);
		$this->load->view('template/footer');
	}

	public function get_pembayaran($id = '')
	{
		echo json_encode($this->pm->get_pembayaran($id));
	}

	public function ubah($id_pembayaran)
	{
		$valid = $this->form_validation;
		$valid->set_rules('id_kategori','kategori','required');
		$valid->set_rules('id_jurusan','jurusan','required');
		$valid->set_rules('id_tahun_ajaran','id_tahun_ajaran','required');
		$valid->set_rules('nominal','nominal','required');

		if ($valid->run()) {
			$this->pm->update($id_pembayaran);
			$this->session->set_flashdata('pesan', 'diubah');
			redirect('master/pembayaran','refresh');
		}

		$data['judul'] = "Ubah pembayaran";
		$data['pembayaran'] = $this->pm->get_pembayaran($id_pembayaran);
		$data['kategori'] = $this->km->get_kategori();
		$data['jurusan'] = $this->jm->get_jurusan();
		$data['kelas'] = $this->kkm->get_kelas();
		$data['tahun_ajaran'] = $this->tam->get_tahun_ajaran();

		$this->load->view('template/header', $data);
		$this->load->view('master/pembayaran/ubah', $data);
		$this->load->view('template/footer');
	}

}

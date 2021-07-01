<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cek_login();
		$this->load->model('Kategori_m', 'ktm');
		$this->load->model('Kelas_m', 'km');
		$this->load->model('Siswa_m', 'sm');
		$this->load->model('Tahun_ajaran_m','tam');
	}

	public function index()
	{
		if ($this->session->userdata('id_role') == 9) {
			echo "403 Unauthorized";
			die;
		}

		$valid = $this->form_validation;
		$valid->set_rules('id_kategori', 'kategori', 'required');
		$valid->set_rules('id_kelas', 'kelas', 'required');
		$valid->set_rules('id_tahun_ajaran', 'tahun ajaran', 'required');

		if ($valid->run()) {
			$post = $this->input->post();
			redirect('laporan/detil?id_kategori='.$post['id_kategori'].'&id_kelas='.$post['id_kelas'].'&id_tahun_ajaran='.$post['id_tahun_ajaran']);
		}

		$data['judul'] = "Data Laporan";
		$data['kategori'] = $this->ktm->get_kategori();
		$data['kelas'] = $this->km->get_kelas();
		$data['tahun_ajaran'] = $this->tam->get_tahun_ajaran();

		$this->load->view('template/header', $data);
		$this->load->view('laporan/index', $data);
		$this->load->view('template/footer');
	}

	public function detil()
	{
		if ($this->session->userdata('id_role') == 9) {
			echo "403 Unauthorized";
			die;
		}
		$get = $this->input->get();

		$data['judul'] = "Detail Laporan";
		$data['kelas'] = $this->km->get_kelas($get['id_kelas']);
		$data['kategori'] = $this->ktm->get_kategori($get['id_kategori']);
		$data['tahun_ajaran'] = $this->tam->get_tahun_ajaran($get['id_tahun_ajaran']);

		$id_kelas = $get['id_kelas'];
		$id_kategori = $get['id_kategori'];
		$id_tahun_ajaran = $get['id_tahun_ajaran'];

		$result  =   "SELECT id_kelas,id_transaksi, status, id_kategori, transaksi.tgl, transaksi.tgl_transaksi, nama_siswa, nis, jumlah_bayar FROM siswa
		LEFT JOIN transaksi USING(nis)
		WHERE 
		id_kelas = '$id_kelas'
		AND id_tahun_ajaran = '$id_tahun_ajaran'
		";

		$data['result'] = $this->db->query($result)->result_array();
		$data['url'] = 'laporan/cetak?id_kategori='.$get['id_kategori'].'&id_kelas='.$get['id_kelas'].'&id_tahun_ajaran='.$get['id_tahun_ajaran'];

		$data_pembayaran = [
			'id_kategori' => $id_kategori, 
			'id_jurusan' => $data['kelas']['id_jurusan'], 
			'id_tahun_ajaran' => $id_tahun_ajaran
		];

		$this->db->join('kategori', 'id_kategori');
		$this->db->join('jurusan', 'id_jurusan');
		$data['pembayaran'] = $this->db->get_where('pembayaran', $data_pembayaran)->row_array();

		$this->db->select_sum('jumlah_bayar');
		$this->db->join('siswa', 'nis');
		$this->db->join('kelas', 'siswa.id_kelas=kelas.id_kelas');
		$this->db->where('id_kategori', $id_kategori);
		$this->db->where('siswa.id_kelas', $id_kelas);
		$this->db->where('id_tahun_ajaran', $id_tahun_ajaran);
		$this->db->where('status', 1);
		$this->db->select_sum('jumlah_bayar');
		$data['total'] = $this->db->get('transaksi')->row_array()['jumlah_bayar'];


		$this->load->view('template/header', $data);
		$this->load->view('laporan/detil', $data);
		$this->load->view('template/footer');
	}

	public function cetak()
	{
		if ($this->session->userdata('id_role') == 9) {
			echo "403 Unauthorized";
			die;
		}
		$get = $this->input->get();

		$data['judul'] = "Detail Laporan";
		$data['kelas'] = $this->km->get_kelas($get['id_kelas']);
		$data['kategori'] = $this->ktm->get_kategori($get['id_kategori']);
		$data['tahun_ajaran'] = $this->tam->get_tahun_ajaran($get['id_tahun_ajaran']);

		$id_kelas = $get['id_kelas'];
		$id_kategori = $get['id_kategori'];
		$id_tahun_ajaran = $get['id_tahun_ajaran'];

		$result  =   "SELECT id_kelas,id_transaksi, transaksi.tgl_transaksi, status, id_kategori, transaksi.tgl, nama_siswa, nis, jumlah_bayar FROM siswa
		LEFT JOIN transaksi USING(nis)
		WHERE 
		id_kelas = '$id_kelas'
		AND id_tahun_ajaran = '$id_tahun_ajaran'
		";

		$data['result'] = $this->db->query($result)->result_array();

		$data_pembayaran = [
			'id_kategori' => $id_kategori, 
			'id_jurusan' => $data['kelas']['id_jurusan'], 
			'id_tahun_ajaran' => $id_tahun_ajaran
		];

		$this->db->join('kategori', 'id_kategori');
		$this->db->join('jurusan', 'id_jurusan');
		$data['pembayaran'] = $this->db->get_where('pembayaran', $data_pembayaran)->row_array();

		$this->db->select_sum('jumlah_bayar');
		$this->db->join('siswa', 'nis');
		$this->db->join('kelas', 'siswa.id_kelas=kelas.id_kelas');
		$this->db->where('id_kategori', $id_kategori);
		$this->db->where('siswa.id_kelas', $id_kelas);
		$this->db->where('id_tahun_ajaran', $id_tahun_ajaran);
		$this->db->where('status', 1);
		$this->db->select_sum('jumlah_bayar');
		$data['total'] = $this->db->get('transaksi')->row_array()['jumlah_bayar'];

		$this->load->view('laporan/cetak', $data);
	}

	public function siswa()
	{
		$data['judul'] = "Riwayat Pembayaran";

		$id_siswa =  $this->session->userdata('id_siswa');
		$data['siswa'] = $this->sm->get_siswa($id_siswa);

		$this->db->join('siswa', 'nis');
		$this->db->join('tahun_ajaran', 'id_tahun_ajaran');
		$this->db->join('kategori', 'id_kategori');
		$this->db->select('*,transaksi.tgl');
		$data['laporan'] = $this->db->get_where('transaksi', ['siswa.id_siswa' => $id_siswa])->result_array();

		$data['url'] = 'laporan/siswa';

		$this->load->view('template/header', $data);
		$this->load->view('laporan/siswa', $data);
		$this->load->view('template/footer');
	}

	public function cetak_siswa()
	{
		$data['judul'] = "Riwayat Pembayaran";

		$id_siswa =  $this->session->userdata('id_siswa');
		$data['siswa'] = $this->sm->get_siswa($id_siswa);

		$this->db->join('siswa', 'nis');
		$this->db->join('kategori', 'id_kategori');
		
		$this->db->select('*,transaksi.tgl');
		$data['laporan'] = $this->db->get_where('transaksi', ['siswa.id_siswa' => $id_siswa])->result_array();

		$data['url'] = 'laporan/siswa';
		$this->load->view('laporan/cetak_siswa', $data);
	}
}

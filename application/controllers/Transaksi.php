		<?php
		defined('BASEPATH') OR exit('No direct script access allowed');

		class Transaksi extends CI_Controller {

			public function __construct()
			{
				parent::__construct();
				$this->load->library('datatables');
				$this->load->model('Siswa_m','sm');
				$this->load->model('Transaksi_m','tm');
				$this->load->model('Kategori_m','km');
				$this->load->model('Pembayaran_m','pm');
				cek_login();
			}

			public function index()
			{
				if ($this->session->userdata('id_role') == 9) {
					echo "403 Unauthorized";
					die;
				}

				$data['judul'] = "Transaksi Baru";
				$data['kategori'] = $this->km->get_kategori();

				$this->load->view('template/header', $data);
				$this->load->view('transaksi/index', $data);
				$this->load->view('template/footer');
			}

			public function detail()
			{
				$get = $this->input->get();

				if (!$this->db->get_where('siswa', ['nis' => $get['nis']])->row_array()) {
					$this->session->set_flashdata('error', 'Siswa dengan NIS ' . $get['nis'] . ' tidak ditemukan!');
					redirect('transaksi','refresh');
				}

				$valid = $this->form_validation;
				$valid->set_rules('jumlah_bayar', 'Jumlah Bayar', 'required');
				if (empty($_FILES['bukti_pembayaran']['name']))
				{
					$valid->set_rules('bukti_pembayaran', 'Bukti Pembayaran', 'required');
				}

				if ($valid->run()) {
					$this->tm->insert();
					$this->db->select_max('id_transaksi');
					$id_transaksi = $this->db->get('transaksi')->row_array()['id_transaksi'];
					redirect('transaksi/invoice/'.$id_transaksi .'?url=transaksi');
				}

				$data['judul'] = "Transaksi Baru";

				$this->db->join('jurusan', 'id_jurusan');
				$this->db->join('kelas', 'id_kelas');
				$this->db->join('tahun_ajaran', 'id_tahun_ajaran');
				$data['siswa'] = $this->db->get_where('siswa', ['nis' => $get['nis']])->row_array();

				$data_pembayaran = [
					'id_kategori' => $get['id_kategori'], 
					'id_jurusan' => $data['siswa']['id_jurusan'], 
					'id_tahun_ajaran' => $data['siswa']['id_tahun_ajaran']
				];

				$this->db->join('kategori', 'id_kategori');
				$this->db->join('jurusan', 'id_jurusan');
				$data['pembayaran'] = $this->db->get_where('pembayaran', $data_pembayaran)->row_array();

				if (!$data['pembayaran']) {
					$this->session->set_flashdata('error', 'Data Pembayaran Tidak Ada!');
					redirect('transaksi','refresh');
				}

				$this->db->select_sum('jumlah_bayar');
				$jumlah_bayar = $this->db->get_where('transaksi', ['id_kategori' => $get['id_kategori'], 'nis' => $get['nis'], 'tahun_dibayar' => date('Y')])->row_array()['jumlah_bayar'];

				$nominal_pembayaran = $data['pembayaran']['nominal'];

				$data['sudah_dibayar'] = $jumlah_bayar;
				$data['belum_dibayar'] = $nominal_pembayaran - $jumlah_bayar;

				if ($jumlah_bayar >= $nominal_pembayaran) {
					$data['status'] =  'LUNAS';
				}else{
					$data['status'] = 'BELUM LUNAS';
				}

				$this->load->view('template/header', $data);
				$this->load->view('transaksi/detail', $data);
				$this->load->view('template/footer');
			}

			public function invoice($id_transaksi)
			{
				$data['judul'] = "Invoice";
				$data['transaksi'] = $this->tm->get_transaksi($id_transaksi);


				if ($this->session->userdata('id_role') == 9) {
					$nis = $this->db->get_where('siswa', ['id_siswa' => $this->session->userdata('id_siswa')])->row_array()['nis'];
					if ($data['transaksi']['nis'] != $nis) {
						echo "403 Unauthorized";
						die;
					}
				}

				$data_pembayaran = [
					'id_kategori' => $data['transaksi']['id_kategori'], 
					'id_jurusan' => $data['transaksi']['id_jurusan'], 
					'id_tahun_ajaran' => $data['transaksi']['id_tahun_ajaran']
				];
				$this->db->join('kategori', 'id_kategori');
				$this->db->join('jurusan', 'id_jurusan');
				$data['pembayaran'] = $this->db->get_where('pembayaran', $data_pembayaran)->row_array();


				$this->load->view('template/header', $data);
				$this->load->view('transaksi/invoice', $data);
				$this->load->view('template/footer');
			}

			public function invoice_print($id_transaksi)
			{
				$data['judul'] = "Invoice";
				$data['transaksi'] = $this->tm->get_transaksi($id_transaksi);

				if ($this->session->userdata('id_role') == 9) {
				$nis = $this->db->get_where('siswa', ['id_siswa' => $this->session->userdata('id_siswa')])->row_array()['nis'];
					if ($data['transaksi']['nis'] != $nis) {
						echo "403 Unauthorized";
						die;
					}
				}

				$data_pembayaran = [
					'id_kategori' => $data['transaksi']['id_kategori'], 
					'id_jurusan' => $data['transaksi']['id_jurusan'], 
					'id_tahun_ajaran' => $data['transaksi']['id_tahun_ajaran']
				];
				$this->db->join('kategori', 'id_kategori');
				$this->db->join('jurusan', 'id_jurusan');
				$data['pembayaran'] = $this->db->get_where('pembayaran', $data_pembayaran)->row_array();

				$this->load->view('transaksi/cetak_invoice', $data);
			}

			public function data()
			{
				if ($this->session->userdata('id_role') == 9) {
					echo "403 Unauthorized";
					die;
				}
				
				$data['judul'] = "Data Transaksi";

				$this->load->view('template/header', $data);
				$this->load->view('transaksi/data', $data);
				$this->load->view('template/footer');
			}

			public function hapus($id='')
			{
				if ($this->session->userdata('id_role') == 9) {
					echo "403 Unauthorized";
					die;
				}

				$this->tm->delete($id);
				$this->session->set_flashdata('pesan', 'dihapus');
				redirect('transaksi/data','refresh');
			}

			function get_transaksi_json() {
				if ($this->session->userdata('id_role') == 9) {
					echo "403 Unauthorized";
					die;
				}
				header('Content-Type: application/json');
				echo $this->tm->get_all_transaksi();
			}

			public function ubah($id_transaksi)
			{
				$valid = $this->form_validation;
				$valid->set_rules('nis','nis','required');

				if ($valid->run()) {
					$this->tm->update($id_transaksi);
					$this->session->set_flashdata('pesan', 'diubah');
					if($this->session->userdata('id_role') == 9){
					    redirect('laporan/siswa','refresh');    
					}else{
					    redirect('transaksi/data','refresh');
					}
					
				}

				$data['judul'] = "Ubah Transaksi";
				$data['transaksi'] = $this->tm->get_transaksi($id_transaksi);
				$data['kategori'] = $this->km->get_kategori();

				$this->db->join('tahun_ajaran', 'id_tahun_ajaran', 'left');
				$data['siswa'] = $this->db->get_where('siswa', ['nis' => $data['transaksi']['nis']])->row_array();

				if ($data['siswa']['tahun_ajaran'] != date('Y')) {
					$data['ijazah'] = $this->db->get_where('gambar', ['id_siswa' => $data['siswa']['id_siswa'], 'jenis' => 'ijazah', 'tahun_ajaran' => date('Y')])->result_array();
					$data['shun'] = $this->db->get_where('gambar', ['id_siswa' => $data['siswa']['id_siswa'], 'jenis' => 'shun', 'tahun_ajaran' => date('Y')])->result_array();
					$data['raport'] = $this->db->get_where('gambar', ['id_siswa' => $data['siswa']['id_siswa'], 'jenis' => 'raport', 'tahun_ajaran' => date('Y')])->result_array();
				}

				$kategori = $this->km->get_kategori($data['transaksi']['id_kategori']);

				$data['nama_kategori'] = $kategori['nama_kategori'];

				$this->load->view('template/header', $data);
				$this->load->view('transaksi/ubah', $data);
				$this->load->view('template/footer');
			}

			public function siswa()
			{
				$data['judul'] = "Pembayaran";

				$siswa = $this->db->get_where('siswa', ['id_siswa' => $this->session->userdata('id_siswa') ])->row_array();

				$this->db->join('kategori', 'id_kategori');
				$data['kategori'] = $this->db->get_where('pembayaran', [
					'id_jurusan' => $siswa['id_jurusan'],
					'id_tahun_ajaran' => $siswa['id_tahun_ajaran']
				])->result_array();

				$this->load->view('template/header', $data);
				$this->load->view('transaksi/siswa', $data);
				$this->load->view('template/footer');
			}

			public function bayar($id_kategori = '3')
			{

				$valid = $this->form_validation;
				$valid->set_rules('atas_nama', 'atas nama', 'required');
				$valid->set_rules('nama_bank', 'nama_bank', 'required');
			    $valid->set_rules('no_rekening', 'no rekening', 'required');
				$valid->set_rules('jumlah_bayar', 'Jumlah Bayar', 'required');
				if (empty($_FILES['bukti_pembayaran']['name']))
				{
					$valid->set_rules('bukti_pembayaran', 'Bukti Pembayaran', 'required');
				}

				if ($valid->run()) {
					$this->tm->insert();
					$this->db->select_max('id_transaksi');
					$id_transaksi = $this->db->get('transaksi')->row_array()['id_transaksi'];
					redirect('transaksi/invoice/'.$id_transaksi .'?url=transaksi/siswa');
				}
				$this->db->join('jurusan', 'id_jurusan');
				$this->db->join('kelas', 'id_kelas');
				$this->db->join('tahun_ajaran', 'id_tahun_ajaran');
				$data['siswa'] = $this->db->get_where('siswa', ['id_siswa' => $this->session->userdata('id_siswa')])->row_array();

				$data['judul'] = "Pembayaran";
				$data_pembayaran = [
					'id_kategori' => $id_kategori, 
					'id_jurusan' => $data['siswa']['id_jurusan'], 
					'id_tahun_ajaran' => $data['siswa']['id_tahun_ajaran']
				];

				$this->db->join('kategori', 'id_kategori');
				$this->db->join('jurusan', 'id_jurusan');
				$data['pembayaran'] = $this->db->get_where('pembayaran', $data_pembayaran)->row_array();

				$this->db->select_sum('jumlah_bayar');
				$jumlah_bayar = $this->db->get_where('transaksi', ['id_kategori' => $id_kategori, 'nis' => $data['siswa']['nis'], 'tahun_dibayar' => date('Y')])->row_array()['jumlah_bayar'];

				$nominal_pembayaran = $data['pembayaran']['nominal'];

				$data['sudah_dibayar'] = $jumlah_bayar;
				$data['belum_dibayar'] = $nominal_pembayaran - $jumlah_bayar;

				if ($jumlah_bayar >= $nominal_pembayaran) {
					$data['status'] =  'LUNAS';
				}else{
					$data['status'] = 'BELUM LUNAS';
				}
				$data['rekening'] = $this->db->get('pengaturan_pembayaran')->row_array();

				$this->load->view('template/header', $data);
				$this->load->view('transaksi/detail', $data);
				$this->load->view('template/footer');
			}

		}

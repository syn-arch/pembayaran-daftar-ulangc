<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('login')) {
			redirect('dashboard','refresh');
		}

		$valid = $this->form_validation;

		$valid->set_rules('email', 'email', 'required');
		$valid->set_rules('password', 'Password', 'required');

		if ($valid->run() == TRUE) {

			$post = $this->input->post();

			$email = $post['email'];
			$password = $post['password'];

			$this->db->join('petugas', 'id_user');
			$user = $this->db->get_where('user', ['email' => $email])->row_array();

			if ($user) {

				if (password_verify($password, $user['password'])) {

					$data = [
						'login' => true,
						'id_user' => $user['id_user'],
						'id_role' => $user['id_role'],
						'nama_petugas' => $user['nama_petugas'],
						'gambar' => $user['gambar'],
						'petugas' => $user['petugas']
					];

					$this->session->set_userdata($data);
					
					if($user['petugas'] == 1){
					redirect('transaksi/data','refresh');    
					}

					redirect('dashboard','refresh');
					
				}else{
					$this->session->set_flashdata('error', 'email atau password anda salah!');
					redirect('admin','refresh');
				}
				
			}else{
				$this->session->set_flashdata('error', 'email atau password anda salah!');
				redirect('admin','refresh');
			}

		}

		$this->load->view('auth/login');
	}

	public function login()
	{
		if ($this->session->userdata('id_siswa')) {
			redirect('utama','refresh');
		}

		$valid = $this->form_validation;

		$valid->set_rules('tgl', 'tgl', 'required');
		$valid->set_rules('nis', 'nis', 'required');

		if ($valid->run()) {

			$post = $this->input->post();

			$tgl = $post['tgl'];
			$nis = $post['nis'];

			$siswa = $this->db->get_where('siswa', ['nis' => $nis, 'tgl' => $tgl])->row_array();

			if ($siswa) {

				$data = [
					'login' => true,
					'nis' => $siswa['nis'],
					'id_siswa' => $siswa['id_siswa'],
					'nama_siswa' => $siswa['nama_siswa'],
					'id_role' => 9
				];

				$this->session->set_userdata($data);

				redirect('utama','refresh');
				
			}else{
				$this->session->set_flashdata('error', 'NIS atau tanggal lahir anda salah');
				redirect('login','refresh');
			}
		}

		$this->load->view('auth/siswa');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin','refresh');
	}

	public function logout_siswa()
	{
		$this->session->sess_destroy();
		redirect('login','refresh');
	}
}

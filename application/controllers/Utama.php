<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utama extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		cek_login();
	}

	public function index()
	{
		$data['judul'] = "Utama";

		$this->load->view('template/header', $data);
		$this->load->view('utama', $data);
		$this->load->view('template/footer');
	}
}

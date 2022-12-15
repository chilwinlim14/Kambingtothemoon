<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Silsilah_keluarga extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('auth');
		}
		// $this->load->model('Mod_daftar_ternak');
		$this->user = $this->ion_auth->user()->row();
	}

	public function index()
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Ternak',
			'subjudul'	=> 'Silsilah Keluarga',
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('silsilah_keluarga/data');
		$this->load->view('_template/dashboard/_footer');
	}
}

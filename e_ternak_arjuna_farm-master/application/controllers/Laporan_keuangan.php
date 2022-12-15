<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_keuangan extends CI_Controller
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
			'judul'		=> 'Manajemen Keuangan',
			'subjudul'	=> 'Laporan Keuangan',
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('laporan_keuangan/data');
		$this->load->view('_template/dashboard/_footer');
	}

	public function tambah()
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Keuangan',
			'subjudul'	=> 'Tambah Laporan Keuangan',
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('laporan_keuangan/tambah');
		$this->load->view('_template/dashboard/_footer');
	}
	public function editLaporanKeuangan()
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Keuangan',
			'subjudul'	=> 'Edit Laporan Keuangan',
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('laporan_keuangan/editLaporanKeuangan');
		$this->load->view('_template/dashboard/_footer');
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('auth');
		}
		$this->load->model('Dashboard_model', 'dashboard');

		$this->load->library(['datatables', 'form_validation']); 
		$this->load->model('Treatment_ternak_model', 'treatment');
		$this->load->model('Mating_model', 'mating');
		$this->user = $this->ion_auth->user()->row();
	}

	public function index()
	{	
		// var_dump($this->mating->getDataMatingsDashboard());die;
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Dashboard',
			'subjudul'	=> 'Data Aplikasi',
			'data_treatment'=> $this->treatment->getDataTreatmentTerdekat(),
			'data_matings'=> $this->mating->getDataMatingsDashboard()
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('dashboardternak');
		$this->load->view('_template/dashboard/_footer');
	}
}

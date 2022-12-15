<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_peternak extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('auth');
		}
		$this->load->model('Dashboard_model', 'dashboard');
		$this->load->model('Master_model', 'master');
		$this->load->model('Data_peternak_model', 'data_peternak');
		$this->user = $this->ion_auth->user()->row();
	}

	public function index()
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Pengaturan',
			'subjudul'	=> 'Data Diri Peternakan',
            'data_peternak' => $this->data_peternak->getDataPeternak(),
		];
     

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('data_peternak/data');
		$this->load->view('_template/dashboard/_footer');
	}

    public function edit()
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Pengaturan',
			'subjudul'	=> 'Edit Data Diri Peternakan',
            'data_peternak' => $this->data_peternak->getDataPeternak(),
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('data_peternak/edit');
		$this->load->view('_template/dashboard/_footer');
	}

    public function save()
	{
		$inisial 	= $this->input->post('inisial', true);
		$nama_peternak 	= $this->input->post('nama_peternak', true);
		$pemilik 	= $this->input->post('pemilik', true);
		$no_telpon 	= $this->input->post('no_telpon', true);
		$email 	= $this->input->post('email', true);
		$asosiasi 	= $this->input->post('asosiasi', true);
		
	// Contoh Validasi
		// $this->form_validation->set_rules('nip', 'NIP', 'required|numeric|trim|min_length[8]|max_length[12]' . $u_nip);
		// $this->form_validation->set_rules('nama_dosen', 'Nama Dosen', 'required|trim|min_length[3]|max_length[50]');
		// $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email' . $u_email);
		// $this->form_validation->set_rules('matkul', 'Mata Kuliah', 'required');

		// if ($this->form_validation->run() == FALSE) {
		// 	$data = [
		// 		'status'	=> false,
		// 		'errors'	=> [
		// 			'nip' => form_error('nip'),
		// 			'nama_dosen' => form_error('nama_dosen'),
		// 			'email' => form_error('email'),
		// 			'matkul' => form_error('matkul'),
		// 		]
		// 	];
		// 	$this->output_json($data);
		// } else {
            $id = 1;
			$input = [
				'inisial_peternakan'	=> $inisial,
				'nama_peternakan' 	    => $nama_peternak,
				'pemilik' 		        => $pemilik,
				'email' 		        => $email,
				'asosiasi' 		        => $asosiasi,
				'no_telpon' 	        => $no_telpon
			];
			
            // contoh create dan edit secara bersama
            // if ($method === 'add') {
			// 	$action = $this->master->create('dosen', $input);
			// } else if ($method === 'edit') {
			// 	$action = $this->master->update('dosen', $input, 'id_dosen', $id_dosen);
			// }

			$action = $this->master->update('data_peternak', $input, 'id', $id);
			
            // die($action);

			if ($action) {
				redirect('data_peternak/'); 
			} else {
				// $this->output_json(['status' => false]);
			}
		// }
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Treatment extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('auth');
		}
        $this->load->library(['datatables', 'form_validation']); 
		$this->load->model('Users_model', 'users');
		$this->load->model('Master_model', 'master');
		$this->load->model('Master_treatment_model','treatment');
		$this->user = $this->ion_auth->user()->row();
	}

	public function index()
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Master Data',
			'subjudul'	=> 'Manajemen treatment',
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('treatment/data');
		$this->load->view('_template/dashboard/_footer');
        $this->load->view('treatment/data-js');
	}

    public function output_json($data, $encode = true)
	{
		if ($encode) $data = json_encode($data);
		$this->output->set_content_type('application/json')->set_output($data);
	}

    public function data()
	{
	
		$this->output_json($this->treatment->getDataMasterTreatment(), false);
	}

	public function tambah()
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Master Data',
			'subjudul'	=> 'Tambah treatment',
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('treatment/tambah');
		$this->load->view('_template/dashboard/_footer');
        $this->load->view('treatment/tambah-js');
	}

	public function edit($id_treatment)
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Master Data',
			'subjudul'	=> 'Edit treatment',
			'data_treatment' => $this->treatment->getDataMasterTreatment_byId($id_treatment)->row()
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('treatment/edit');
		$this->load->view('_template/dashboard/_footer');
		$this->load->view('treatment/edit-js');
	}

	public function save()
	{
		$id_treatment = $this->input->post('id_treatment', true);
		$method = $this->input->post('method', true);
		
		$nama_treatment = $this->input->post('nama_treatment', true);
		$keterangan = $this->input->post('keterangan', true);

		$this->form_validation->set_rules('nama_treatment', 'nama_treatment', 'required|trim');


		if ($this->form_validation->run() === FALSE) {
			$data['status'] = false;
			$data['errors'] = [
				'nama_treatment' => form_error('nama_treatment'),
			];
			$this->output_json($data);
		} else {
			$input = [
				'nama_treatment' => $nama_treatment,
				'keterangan' => $keterangan
			];

			if($method === 'add'){
				$action = $this->master->create('master_treatment',$input);
			}elseif ($method === 'edit'){
				$action = $this->master->update('master_treatment',$input, 'id_treatment', $id_treatment);
			}

			if ($action) {
				$this->output_json(['status' => true]);
			} else {
				$this->output_json(['status' => false]);
			}
		}
	}

	function delete($id)
	{
		$this->db->where('id_treatment', $id);
		$this->db->delete('master_treatment');
		$this->output_json(['status' => true]);
	}
}



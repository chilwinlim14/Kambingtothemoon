<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jurnal_ternak extends CI_Controller
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
		$this->load->model('Jurnal_ternak_model', 'jurnal');
		$this->load->model('Ternak_model', 'ternak');
		$this->user = $this->ion_auth->user()->row();
	}

	public function index()
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Ternak',
			'subjudul'	=> 'Jurnal Ternak',
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('jurnal_ternak/data');
		$this->load->view('_template/dashboard/_footer');
		$this->load->view('jurnal_ternak/data-js');
	}

	public function output_json($data, $encode = true)
	{
		if ($encode) $data = json_encode($data);
		$this->output->set_content_type('application/json')->set_output($data);
	}

	
	public function data()
	{
		$this->output_json($this->jurnal->get_data_jurnal_ternak(), false);
	}


	public function tambah()
	{	
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Ternak',
			'subjudul'	=> 'Tambah Jurnal Ternak',
			'data_ternak'=> $this->ternak->getDataternakResult(),
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('jurnal_ternak/tambah');
		$this->load->view('_template/dashboard/_footer');
		$this->load->view('jurnal_ternak/tambah-js');
	}

	public function edit($id_jurnal)
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Ternak',
			'subjudul'	=> 'Edit Jurnal Ternak',
			'data_ternak'=> $this->ternak->getDataternakResult(),
			'data_jurnal'=> $this->jurnal->get_data_jurnal_ternak_byId($id_jurnal)
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('jurnal_ternak/editjurnal');
		$this->load->view('_template/dashboard/_footer');
		$this->load->view('jurnal_ternak/edit-js');
	}

	public function save()
	{
		$id_jurnal = $this->input->post('id_jurnal', true);
		$method = $this->input->post('method', true);
		
		$id_ternak = $this->input->post('id_ternak', true);
		$catatan_jurnal = $this->input->post('catatan_jurnal', true);
		$tanggal = $this->input->post('tanggal', true);

		$this->form_validation->set_rules('tanggal', 'tanggal', 'required|trim');


		if ($this->form_validation->run() === FALSE) {
			$data['status'] = false;
			$data['errors'] = [
				'tanggal' => form_error('tanggal'),
			];
			$this->output_json($data);
		} else {
			$input = [
				'catatan_jurnal' => $catatan_jurnal,
				'tanggal' => $tanggal,
				'id_ternak' => $id_ternak,
			];

			if($method === 'add'){
				$action = $this->master->create('jurnal_ternak',$input);
			}elseif ($method === 'edit'){
				$action = $this->master->update('jurnal_ternak',$input, 'id_jurnal', $id_jurnal);
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
		$this->db->where('id_jurnal', $id);
		$this->db->delete('jurnal_ternak');
		$this->output_json(['status' => true]);
	}
}

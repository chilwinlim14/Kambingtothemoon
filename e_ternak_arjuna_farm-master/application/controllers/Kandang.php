<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kandang extends CI_Controller
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
		$this->load->model('Kandang_model','kandang');
		$this->user = $this->ion_auth->user()->row();
	}

	public function index()
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Master Data',
			'subjudul'	=> 'Manajemen Kandang',
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('kandang/data');
		$this->load->view('_template/dashboard/_footer');
        $this->load->view('kandang/data-js');
	}

    public function output_json($data, $encode = true)
	{
		if ($encode) $data = json_encode($data);
		$this->output->set_content_type('application/json')->set_output($data);
	}

    public function data()
	{
	
		$this->output_json($this->kandang->getDataKandang(), false);
	}

	public function tambah()
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Master Data',
			'subjudul'	=> 'Tambah Kandang',
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('kandang/tambah');
		$this->load->view('_template/dashboard/_footer');
        $this->load->view('kandang/tambah-js');
	}

	public function edit($id_kandang)
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Master Data',
			'subjudul'	=> 'Edit Kandang',
			'data_kandang' => $this->kandang->getDataKandang_byId($id_kandang)->row()
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('kandang/edit');
		$this->load->view('_template/dashboard/_footer');
		$this->load->view('kandang/edit-js');
	}

	public function save()
	{
		$id_kandang = $this->input->post('id_kandang', true);
		$method = $this->input->post('method', true);
		
		$nama_kandang = $this->input->post('nama_kandang', true);
		$blok = $this->input->post('blok', true);

		$this->form_validation->set_rules('nama_kandang', 'nama_kandang', 'required|trim');


		if ($this->form_validation->run() === FALSE) {
			$data['status'] = false;
			$data['errors'] = [
				'nama_kandang' => form_error('nama_kandang'),
			];
			$this->output_json($data);
		} else {
			$input = [
				'nama_kandang' => $nama_kandang,
				'blok' => $blok
			];

			if($method === 'add'){
				$action = $this->master->create('master_kandang',$input);
			}elseif ($method === 'edit'){
				$action = $this->master->update('master_kandang',$input, 'id_kandang', $id_kandang);
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
		$this->db->where('id_kandang', $id);
		$this->db->delete('master_kandang');
		$this->output_json(['status' => true]);
	}
}



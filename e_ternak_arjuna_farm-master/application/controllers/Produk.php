<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
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
		$this->load->model('Master_produk_model','produk');
		$this->user = $this->ion_auth->user()->row();
	}

	public function index()
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Master Data',
			'subjudul'	=> 'Manajemen produk',
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('produk/data');
		$this->load->view('_template/dashboard/_footer');
        $this->load->view('produk/data-js');
	}

    public function output_json($data, $encode = true)
	{
		if ($encode) $data = json_encode($data);
		$this->output->set_content_type('application/json')->set_output($data);
	}

    public function data()
	{
	
		$this->output_json($this->produk->getDataMasterproduk(), false);
	}

	public function tambah()
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Master Data',
			'subjudul'	=> 'Tambah produk',
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('produk/tambah');
		$this->load->view('_template/dashboard/_footer');
        $this->load->view('produk/tambah-js');
	}

	public function edit($id_produk)
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Master Data',
			'subjudul'	=> 'Edit produk',
			'data_produk' => $this->produk->getDataMasterproduk_byId($id_produk)->row()
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('produk/edit');
		$this->load->view('_template/dashboard/_footer');
		$this->load->view('produk/edit-js');
	}

	public function save()
	{
		$id_produk = $this->input->post('id_produk', true);
		$method = $this->input->post('method', true);
		
		$nama_produk = $this->input->post('nama_produk', true);
		

		$this->form_validation->set_rules('nama_produk', 'nama_produk', 'required|trim');


		if ($this->form_validation->run() === FALSE) {
			$data['status'] = false;
			$data['errors'] = [
				'nama_produk' => form_error('nama_produk'),
			];
			$this->output_json($data);
		} else {
			$input = [
				'nama_produk' => $nama_produk
			];

			if($method === 'add'){
				$action = $this->master->create('master_produk',$input);
			}elseif ($method === 'edit'){
				$action = $this->master->update('master_produk',$input, 'id_produk', $id_produk);
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
		$this->db->where('id_produk', $id);
		$this->db->delete('master_produk');
		$this->output_json(['status' => true]);
	}
}



<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
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
		$this->load->model('Penjualan_model','penjualan');
		$this->load->model('Ternak_model','ternak');
		$this->load->model('Kontak_model','kontak');
		$this->user = $this->ion_auth->user()->row();
	}

	public function output_json($data, $encode = true)
	{
		if ($encode) $data = json_encode($data);
		$this->output->set_content_type('application/json')->set_output($data);
	}


	public function data()
	{
		$this->output_json($this->penjualan->get_data_penjualan(), false);
	}

	public function index()
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Keuangan',
			'subjudul'	=> 'Penjualan',
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('penjualan/data');
		$this->load->view('_template/dashboard/_footer');
		$this->load->view('penjualan/data-js');
	}

	public function tambah()
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Keuangan',
			'subjudul'	=> 'Tambah Penjualan',
			'data_ternak' => $this->ternak->getDataternakResult(),
			'data_kontak' => $this->kontak->getDataKontakResult(),
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('penjualan/tambah');
		$this->load->view('_template/dashboard/_footer');
		$this->load->view('penjualan/tambah-js');
	}
	public function editPenjualan($id_penjualan)
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Keuangan',
			'subjudul'	=> 'Edit Penjualan',
			'data_ternak' => $this->ternak->getDataternakResult(),
			'data_kontak' => $this->kontak->getDataKontakResult(),
			'data_penjualan' => $this->penjualan->get_data_penjualan_byId($id_penjualan),
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('penjualan/editPenjualan');
		$this->load->view('_template/dashboard/_footer');
		$this->load->view('penjualan/edit-js');
	}

	public function save()
	{
		$id_penjualan = $this->input->post('id_penjualan', true);
		$method = $this->input->post('method', true);

		$tanggal = $this->input->post('tanggal', true);
		$id_ternak = $this->input->post('id_ternak', true);
		$pembeli = $this->input->post('pembeli', true);
		$deposit = $this->input->post('deposit', true);
		$harga = $this->input->post('harga', true);
		$utang = $this->input->post('utang', true);
		$status = $this->input->post('status', true);
		

		$this->form_validation->set_rules('tanggal', 'tanggal', 'required|trim');
		$this->form_validation->set_rules('id_ternak', 'id_ternak', 'required|trim');
		$this->form_validation->set_rules('pembeli', 'pembeli', 'required|trim');
		$this->form_validation->set_rules('deposit', 'deposit', 'required|trim');
		$this->form_validation->set_rules('harga', 'harga', 'required|trim');
		$this->form_validation->set_rules('utang', 'utang', 'required|trim');
		$this->form_validation->set_rules('status', 'status', 'required|trim');


		if ($this->form_validation->run() === FALSE) {
			$data['status'] = false;
			$data['errors'] = [
				'tanggal' 		=> form_error('tanggal'),
				'id_ternak' 	=> form_error('id_ternak'),
				'pembeli' 		=> form_error('pembeli'),
				'deposit' 		=> form_error('deposit'),
				'harga' 		=> form_error('harga'),
				'utang' 		=> form_error('utang'),
				'status' 		=> form_error('status')
			];
			$this->output_json($data);
		} else {
			$input = [
				'tanggal' 				=> $tanggal,
				'id_ternak' 			=> $id_ternak,
				'pembeli' 				=> $pembeli,
				'deposit' 				=> $deposit,
				'harga' 				=> $harga,
				'utang' 				=> $utang,
				'status' 				=> $status
			];

			if ($method === 'add') {
				$action = $this->master->create('penjualan', $input);
			} elseif ($method === 'edit') {
				$action = $this->master->update('penjualan', $input, 'id_penjualan', $id_penjualan);
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
		$this->db->where('id_penjualan', $id);
		$this->db->delete('penjualan');
		$this->output_json(['status' => true]);
	}
}

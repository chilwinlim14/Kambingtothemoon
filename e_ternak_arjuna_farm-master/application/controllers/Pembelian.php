<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian extends CI_Controller
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
		$this->load->model('Pembelian_model','pembelian');
		$this->load->model('Ternak_model','ternak');
		$this->load->model('Kontak_model','kontak');
		$this->user = $this->ion_auth->user()->row();
	}

	public function index()
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Keuangan',
			'subjudul'	=> 'Pembelian',
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('pembelian/data');
		$this->load->view('_template/dashboard/_footer');
		$this->load->view('pembelian/data-js');
	}

	public function output_json($data, $encode = true)
	{
		if ($encode) $data = json_encode($data);
		$this->output->set_content_type('application/json')->set_output($data);
	}


	public function data()
	{
		$this->output_json($this->pembelian->get_data_pembelian(), false);
	}


	public function tambah()
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Keuangan',
			'subjudul'	=> 'Tambah Pembelian',
			'data_ternak' => $this->ternak->getDataternakResult(),
			'data_kontak' => $this->kontak->getDataKontakResult(),
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('pembelian/tambah');
		$this->load->view('_template/dashboard/_footer');
		$this->load->view('pembelian/tambah-js');
	}
	public function editPembelian($id_pembelian)
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Keuangan',
			'subjudul'	=> 'Edit Pembelian',
			'data_ternak' => $this->ternak->getDataternakResult(),
			'data_kontak' => $this->kontak->getDataKontakResult(),
			'data_pembelian'=>$this->pembelian->get_data_pembelian_byId($id_pembelian),
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('pembelian/editPembelian');
		$this->load->view('_template/dashboard/_footer');
		$this->load->view('pembelian/edit-js');
	}

	public function save()
	{
		$id_pembelian = $this->input->post('id_pembelian', true);
		$method = $this->input->post('method', true);

		$tanggal = $this->input->post('tanggal', true);
		$id_ternak = $this->input->post('id_ternak', true);
		$penjual = $this->input->post('penjual', true);
		$harga = $this->input->post('harga', true);
		$keterangan = $this->input->post('keterangan', true);
		

		$this->form_validation->set_rules('tanggal', 'tanggal', 'required|trim');
		$this->form_validation->set_rules('id_ternak', 'id_ternak', 'required|trim');
		$this->form_validation->set_rules('penjual', 'penjual', 'required|trim');
		$this->form_validation->set_rules('harga', 'harga', 'required|trim');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required|trim');


		if ($this->form_validation->run() === FALSE) {
			$data['status'] = false;
			$data['errors'] = [
				'tanggal' 		=> form_error('tanggal'),
				'id_ternak' 	=> form_error('id_ternak'),
				'penjual' 		=> form_error('penjual'),
				'harga' 		=> form_error('harga'),
				'keterangan' => form_error('keterangan')
			];
			$this->output_json($data);
		} else {
			$input = [
				'tanggal' 				=> $tanggal,
				'id_ternak' 			=> $id_ternak,
				'penjual' 				=> $penjual,
				'harga' 				=> $harga,
				'keterangan' 			=> $keterangan
			];

			if ($method === 'add') {
				$action = $this->master->create('pembelian', $input);
			} elseif ($method === 'edit') {
				$action = $this->master->update('pembelian', $input, 'id_pembelian', $id_pembelian);
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
		$this->db->where('id_pembelian', $id);
		$this->db->delete('pembelian');
		$this->output_json(['status' => true]);
	}
}

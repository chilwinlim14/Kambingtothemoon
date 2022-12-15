<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produksi extends CI_Controller
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
		$this->load->model('Produksi_model', 'produksi');
		$this->load->model('Master_produk_model', 'produk');
		$this->load->model('Ternak_model', 'ternak');
		$this->user = $this->ion_auth->user()->row();
	}

	public function index()
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Keuangan',
			'subjudul'	=> 'Produksi',
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('produksi/data');
		$this->load->view('_template/dashboard/_footer');
		$this->load->view('produksi/data-js');
	}

	public function output_json($data, $encode = true)
	{
		if ($encode) $data = json_encode($data);
		$this->output->set_content_type('application/json')->set_output($data);
	}

	
	public function data()
	{
		$this->output_json($this->produksi->get_data_produksi(), false);
	}

	public function tambah()
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Keuangan',
			'subjudul'	=> 'Tambah Produksi',
			'data_ternak'=> $this->ternak->getDataternakResult(),
			'data_produk'=> $this->produk->getDataMasterprodukResult(),
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('produksi/tambah');
		$this->load->view('_template/dashboard/_footer');
		$this->load->view('produksi/tambah-js');
	}
	public function editProduksi($id_produksi)
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Keuangan',
			'subjudul'	=> 'Edit Produksi',
			'data_ternak'=> $this->ternak->getDataternakResult(),
			'data_produk'=> $this->produk->getDataMasterprodukResult(),
			'data_produksi'=> $this->produksi->get_data_produksi_byId($id_produksi),
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('produksi/editProduksi');
		$this->load->view('_template/dashboard/_footer');
		$this->load->view('produksi/edit-js');
	}

	public function save()
	{
		$id_produksi = $this->input->post('id_produksi', true);
		$method = $this->input->post('method', true);
		
		$tanggal = $this->input->post('tanggal', true);
		$id_ternak = $this->input->post('id_ternak', true);
		$produk = $this->input->post('produk', true);
		$jumlah = $this->input->post('jumlah', true);
		$catatan = $this->input->post('catatan', true);
		

		$this->form_validation->set_rules('tanggal', 'tanggal', 'required|trim');
		$this->form_validation->set_rules('id_ternak', 'id_ternak', 'required|trim');
		$this->form_validation->set_rules('produk', 'produk', 'required|trim');
		$this->form_validation->set_rules('jumlah', 'jumlah', 'required|trim');
		$this->form_validation->set_rules('catatan', 'catatan', 'required|trim');


		if ($this->form_validation->run() === FALSE) {
			$data['status'] = false;
			$data['errors'] = [
				'tanggal' 	=> form_error('tanggal'),
				'id_ternak' 	=> form_error('id_ternak'),
				'produk' => form_error('produk'),
				'jumlah' => form_error('jumlah'),
				'catatan' => form_error('catatan')
			];
			$this->output_json($data);
		} else {
			$input = [
				'tanggal' 		=> $tanggal,
				'id_ternak' 	=> $id_ternak,
				'produk' 		=> $produk,
				'jumlah' 		=> $jumlah,
				'catatan' 		=> $catatan
			];

			if ($method === 'add') {
				$action = $this->master->create('produksi', $input);
			} elseif ($method === 'edit') {
				$action = $this->master->update('produksi', $input, 'id_produksi', $id_produksi);
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
		$this->db->where('id_produksi', $id);
		$this->db->delete('produksi');
		$this->output_json(['status' => true]);
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller
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
		$this->load->model('Kontak_model','kontak');
		$this->user = $this->ion_auth->user()->row();
	}

	public function index()
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Keuangan',
			'subjudul'	=> 'Kontak',
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('kontak/data');
		$this->load->view('_template/dashboard/_footer');
		$this->load->view('kontak/data-js');
	}

	public function output_json($data, $encode = true)
	{
		if ($encode) $data = json_encode($data);
		$this->output->set_content_type('application/json')->set_output($data);
	}

    public function data()
	{
	
		$this->output_json($this->kontak->getDataKontak(), false);
	}

	public function tambah()
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Keuangan',
			'subjudul'	=> 'Tambah Kontak',
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('kontak/tambah');
		$this->load->view('_template/dashboard/_footer');
		$this->load->view('kontak/tambah-js');
	}
	public function editKontak($id_kontak)
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Keuangan',
			'subjudul'	=> 'Edit Kontak',
			'data_kontak' => $this->kontak->getDataKontak_byId($id_kontak)->row()
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('kontak/editKontak');
		$this->load->view('_template/dashboard/_footer');
		$this->load->view('kontak/editKontak-js');
	}
	public function save()
	{
		$id_kontak = $this->input->post('id_kontak', true);
		$method = $this->input->post('method', true);
		
		$nama = $this->input->post('nama', true);
		$alamat = $this->input->post('alamat', true);
		$nomor_telepon = $this->input->post('nomor_telepon', true);
		$email = $this->input->post('email', true);
		$catatan = $this->input->post('catatan', true);

		$this->form_validation->set_rules('alamat', 'alamat', 'required|trim');
		$this->form_validation->set_rules('nomor_telepon', 'nomor_telepon', 'required|trim');


		if ($this->form_validation->run() === FALSE) {
			$data['status'] = false;
			$data['errors'] = [
				'nama' => form_error('nama'),
				'alamat' => form_error('alamat'),
				'nomor_telepon' => form_error('nomor_telepon')
			];
			$this->output_json($data);
		} else {
			$input = [
				'nama'		 	=> $nama,		
				'alamat'		 	=> $alamat,		
				'nomor_telepon' 			=> $nomor_telepon,
				'email' 			=> $email,
				'catatan' 			=> $catatan
			];

			if($method === 'add'){
				$action = $this->master->create('kontak',$input);
			}elseif ($method === 'edit'){
				$action = $this->master->update('kontak',$input, 'id_kontak', $id_kontak);
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
		$this->db->where('id_kontak', $id);
		$this->db->delete('kontak');
		$this->output_json(['status' => true]);
	}
}

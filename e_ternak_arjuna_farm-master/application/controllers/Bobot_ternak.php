<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bobot_ternak extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('auth');
		}
		$this->load->library(['datatables', 'form_validation']); // Load Library Ignited-Datatables
		$this->load->model('Users_model', 'users');
		$this->load->model('Master_model', 'master');
		$this->load->model('Bobot_ternak_model', 'bobot_ternak');
		$this->load->model('Ternak_model','ternak');
		$this->user = $this->ion_auth->user()->row();
	}

	public function index()
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Kesehatan',
			'subjudul'	=> 'Bobot Ternak',
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('bobot_ternak/data');
		$this->load->view('_template/dashboard/_footer');
		$this->load->view('bobot_ternak/data-js');
	}

	public function output_json($data, $encode = true)
	{
		if ($encode) $data = json_encode($data);
		$this->output->set_content_type('application/json')->set_output($data);
	}


	public function data()
	{
		$this->output_json($this->bobot_ternak->get_data_bobot_ternak(), false);
	}

	public function tambah()
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Kesehatan',
			'subjudul'	=> 'Tambah Bobot Ternak',
			'data_ternak' => $this->ternak->getDataternakResult(),
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('bobot_ternak/tambah');
		$this->load->view('_template/dashboard/_footer');
		$this->load->view('bobot_ternak/tambah-js');
	}
	public function editbobot($id_bobot)
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Kesehatan',
			'subjudul'	=> 'Edit Bobot Ternak',
			'data_ternak' => $this->ternak->getDataternakResult(),
			"data_bobot"=> $this->bobot_ternak->get_data_bobot_ternak_byId($id_bobot)
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('bobot_ternak/editbobot');
		$this->load->view('_template/dashboard/_footer');
		$this->load->view('bobot_ternak/editbobot-js');
	}

	public function save()
	{
		$id_bobot = $this->input->post('id_bobot', true);
		$method = $this->input->post('method', true);

		$tanggal_timbang = $this->input->post('tanggal_timbang', true);
		$id_ternak = $this->input->post('id_ternak', true);
		$umur_timbang = $this->input->post('umur_timbang', true);
		$bobot = $this->input->post('bobot', true);
		$hamil = $this->input->post('hamil', true);


		$this->form_validation->set_rules('tanggal_timbang', 'tanggal_timbang', 'required|trim');
		$this->form_validation->set_rules('id_ternak', 'id_ternak', 'required|trim');
		$this->form_validation->set_rules('umur_timbang', 'umur_timbang', 'required|trim');
		$this->form_validation->set_rules('bobot', 'bobot', 'required|trim');
		$this->form_validation->set_rules('hamil', 'hamil', 'required|trim');


		if ($this->form_validation->run() === FALSE) {
			$data['status'] = false;
			$data['errors'] = [
				'tanggal_timbang' => form_error('tanggal_timbang'),
				'id_terak' => form_error('id_ternak'),
				'umur_timbang' => form_error('umur_timbang'),
				'bobot' => form_error('bobot'),
				'hamil' => form_error('hamil')
			];
			$this->output_json($data);
		} else {
			$input = [
				'tanggal_timbang' 		=> $tanggal_timbang,
				'id_ternak' 			=> $id_ternak,
				'umur_timbang' 			=> $umur_timbang,
				'bobot' 				=> $bobot,
				'hamil' 				=> $hamil
			];

			if ($method === 'add') {
				$action = $this->master->create('bobot_ternak', $input);
			} elseif ($method === 'edit') {
				$action = $this->master->update('bobot_ternak', $input, 'id_bobot', $id_bobot
			);
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
		$this->db->where('id_bobot', $id);
		$this->db->delete('bobot_ternak');
		$this->output_json(['status' => true]);
	}

}


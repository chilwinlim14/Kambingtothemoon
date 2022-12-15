<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diet_ternak extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('auth');
		}
		$this->load->library(['datatables', 'form_validation']); // Load Library Ignited-Datatables
		$this->load->model('Users_model', 'users');
		$this->load->model('Kandang_model', 'kandang');
		$this->load->model('Master_model', 'master');
		$this->load->model('Diet_ternak_model', 'm_diet_ternak');
		$this->user = $this->ion_auth->user()->row();
		$this->form_validation->set_error_delimiters('', '');
	}

	public function index()
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Kesehatan',
			'subjudul'	=> 'Diet Ternak',
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('diet_ternak/data');
		$this->load->view('_template/dashboard/_footer');
		$this->load->view('diet_ternak/data-js');
	}

	public function output_json($data, $encode = true)
	{
		if ($encode) $data = json_encode($data);
		$this->output->set_content_type('application/json')->set_output($data);
	}


	public function data()
	{
		$this->output_json($this->m_diet_ternak->get_data_diet_ternak(), false);
	}


	public function tambah()
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Kesehatan',
			'subjudul'	=> 'Tambah Diet Ternak',
			'kandang'	=> $this->kandang->getDataKandangResult(),
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('diet_ternak/tambah');
		$this->load->view('_template/dashboard/_footer');
		$this->load->view('diet_ternak/tambah-js');
	}

	public function editdiet($id_diet)
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Kesehatan',
			'subjudul'	=> 'Edit Diet Ternak',
			'data_diet' => $this->m_diet_ternak->get_data_diet_ternak_byId($id_diet)->row()
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('diet_ternak/editdiet');
		$this->load->view('_template/dashboard/_footer');
		$this->load->view('diet_ternak/edit-js');
	}

	public function save()
	{
		$id_diet = $this->input->post('id_diet', true);
		$method = $this->input->post('method', true);

		$hari = $this->input->post('hari', true);
		$waktu_pemberian = $this->input->post('waktu_pemberian', true);
		$kandang = $this->input->post('kandang', true);
		$pakan = $this->input->post('pakan', true);


		$this->form_validation->set_rules('hari', 'Hari', 'required|trim');
		$this->form_validation->set_rules('waktu_pemberian', 'waktu_pemberian', 'required|trim');
		$this->form_validation->set_rules('kandang', 'kandang', 'required|trim');
		$this->form_validation->set_rules('pakan', 'pakan', 'required|trim');


		if ($this->form_validation->run() === FALSE) {
			$data['status'] = false;
			$data['errors'] = [
				'hari' => form_error('hari'),
				'waktu_pemberian' => form_error('waktu_pemberian'),
				'kandang' => form_error('kandang'),
				'pakan' => form_error('pakan')
			];
			$this->output_json($data);
		} else {
			$input = [
				'hari' 				=> $hari,
				'waktu_pemberian' 	=> $waktu_pemberian,
				'kandang' 			=> $kandang,
				'pakan' 			=> $pakan
			];

			if ($method === 'add') {
				$action = $this->master->create('diet_ternak', $input);
			} elseif ($method === 'edit') {
				$action = $this->master->update('diet_ternak', $input, 'id_diet', $id_diet);
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
		$this->db->where('id_diet', $id);
		$this->db->delete('diet_ternak');
		$this->output_json(['status' => true]);
	}
}

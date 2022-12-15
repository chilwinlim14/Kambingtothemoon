<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Treatment_ternak extends CI_Controller
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
		$this->load->model('Treatment_ternak_model','m_treatment');
		$this->load->model('Ternak_model','ternak');
		$this->load->model('Master_treatment_model','treatment');
		$this->user = $this->ion_auth->user()->row();
	}

	public function index()
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Kesehatan',
			'subjudul'	=> 'Treatment Ternak',
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('treatment_ternak/data');
		$this->load->view('_template/dashboard/_footer');
		$this->load->view('treatment_ternak/data-js');
	}

	public function output_json($data, $encode = true)
	{
		if ($encode) $data = json_encode($data);
		$this->output->set_content_type('application/json')->set_output($data);
	}


	public function data()
	{
		$this->output_json($this->m_treatment->get_data_treatment_ternak(), false);
	}

	public function tambah()
	{	
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Kesehatan',
			'subjudul'	=> 'Tambah Treatment Ternak',
			'data_ternak' => $this->ternak->getDataternakResult(),
			'data_treatment' => $this->treatment->getDataMasterTreatmentResult(),
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('treatment_ternak/tambah');
		$this->load->view('_template/dashboard/_footer');
		$this->load->view('treatment_ternak/tambah-js');
	}

	public function edittreatment($id_treatment_ternak)
	{
		$user = $this->user;
		$status = ["Selesai", "Belum", "Batal"];
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Kesehatan',
			'subjudul'	=> 'Edit Treatment Ternak',
			'status'	=> $status,
			'data_ternak' => $this->ternak->getDataternakResult(),
			'data_treatment' => $this->treatment->getDataMasterTreatmentResult(),
			'data_treatment_ternak' => $this->m_treatment->get_data_treatment_ternak_byId($id_treatment_ternak)
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('treatment_ternak/edittreatment');
		$this->load->view('_template/dashboard/_footer');
		$this->load->view('treatment_ternak/edittreatment-js');
	}

	public function save()
	{
		$id_treatment_ternak = $this->input->post('id_treatment_ternak', true);
		$method = $this->input->post('method', true);
		
		$tanggal = $this->input->post('tanggal', true);
		$id_ternak = $this->input->post('id_ternak', true);
		$id_treatment = $this->input->post('id_treatment', true);
		$status_treatment = $this->input->post('status_treatment', true);
		$ternak = $this->ternak->getDataternak_byId($id_ternak);
		$tanggal_lahir = $ternak->tanggal_lahir;
		$age = date_diff(date_create($tanggal), date_create($tanggal_lahir));

		$umur_treatment = $age->format("%y tahun %m bulan");

		$this->form_validation->set_rules('tanggal', 'tanggal', 'required|trim');
		$this->form_validation->set_rules('id_ternak', 'id_ternak', 'required|trim');
		$this->form_validation->set_rules('id_treatment', 'id_treatment', 'required|trim');
		// $this->form_validation->set_rules('status_treatment', 'status_treatment', 'required|trim');


		if ($this->form_validation->run() === FALSE) {
			$data['status'] = false;
			$data['errors'] = [
				'tanggal' 			=> form_error('tanggal'),
				'id_ternak' 		=> form_error('id_ternak'),
				'id_treatment' 		=> form_error('id_treatment')
			];
			$this->output_json($data);
		} else {
			$input = [
				'tanggal' 				=> $tanggal,
				'id_ternak' 			=> $id_ternak,
				'id_treatment' 			=> $id_treatment,
				'status_treatment' 			=> $status_treatment,
				'umur_treatment' 			=> $umur_treatment
			];

			if ($method === 'add') {
				$action = $this->master->create('treatment_ternak', $input);
			} elseif ($method === 'edit') {
				$action = $this->master->update('treatment_ternak', $input, 'id_treatment_ternak', $id_treatment_ternak);
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
		$this->db->where('id_treatment_ternak', $id);
		$this->db->delete('treatment_ternak');
		$this->output_json(['status' => true]);
	}

}

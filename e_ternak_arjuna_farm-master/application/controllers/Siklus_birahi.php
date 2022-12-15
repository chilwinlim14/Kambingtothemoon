<?php
defined('BASEPATH') or exit('No direct script access allowed');

class siklus_birahi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('auth');
		}
		$this->load->library(['datatables', 'form_validation']); 
		$this->load->model('Siklus_birahi_model','siklus_birahi');
		$this->load->model('Ternak_model','ternak');
		$this->load->model('Master_model','master');
		$this->user = $this->ion_auth->user()->row();
	}

	public function index()
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Pembiakan',
			'subjudul'	=> 'Siklus Birahi',
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('siklus_birahi/data');
		$this->load->view('_template/dashboard/_footer');
		$this->load->view('siklus_birahi/data-js');
	}

	public function output_json($data, $encode = true)
	{
		if ($encode) $data = json_encode($data);
		$this->output->set_content_type('application/json')->set_output($data);
	}

	public function data()
	{
		$this->output_json($this->siklus_birahi->getDataSiklusBirahi(), false);
	}
	
    public function tambah()
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Pembiakan',
			'subjudul'	=> 'Tambah Siklus Birahi',
			'data_ternak_betina'=> $this->ternak->getDataternakBetina(),
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('siklus_birahi/tambah');
		$this->load->view('_template/dashboard/_footer');
		$this->load->view('siklus_birahi/tambah-js');
	}
	public function pengaturanBirahi()
	{
		// var_dump($this->siklus_birahi->getDataPengaturanSiklusBirahi());die;
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Pembiakan',
			'subjudul'	=> 'Pengaturan Siklus Birahi',
			'siklus_birahi'=> $this->siklus_birahi->getDataPengaturanSiklusBirahi(),
		];
		
		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('siklus_birahi/pengaturanBirahi');
		$this->load->view('_template/dashboard/_footer');
		$this->load->view('siklus_birahi/pengaturanBirahi-edit-js');
		
	}

	public function EditSiklusBirahi()
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Pembiakan',
			'subjudul'	=> 'Edit Siklus Birahi',
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('siklus_birahi/editSiklusBirahi');
		$this->load->view('_template/dashboard/_footer');
	}

	public function save()
	{
		$id_siklus_birahi = $this->input->post('id_siklus_birahi', true);
		$method = $this->input->post('method', true);
		$setting = $this->siklus_birahi->getDataPengaturanSiklusBirahi();
		$id_ternak_betina = $this->input->post('id_ternak_betina', true);
		$proestrus = $this->input->post('proestrus', true);
		// $estrus    = date('Y-m-d', strtotime('+'. $setting->estrus .'days', strtotime($proestrus))); 
		// var_dump($estrus);die;
		$siklus_selanjutnya = $setting->proestrus+$setting->estrus+$setting->anestrus;
		$estrus= date('Y-m-d', strtotime('+'. $setting->estrus .'days', strtotime($proestrus)));
		$diestrus= date('Y-m-d', strtotime('+'. $setting->diestrus .'days', strtotime($proestrus)));
		$anestrus= date('Y-m-d', strtotime('+'. $setting->anestrus .'days', strtotime($proestrus)));
		$siklus_selanjutnya= date('Y-m-d', strtotime('+'. $siklus_selanjutnya .'days', strtotime($proestrus)));

		$this->form_validation->set_rules('proestrus', 'proestrus', 'required|trim');


		if ($this->form_validation->run() === FALSE) {
			$data['status'] = false;
			$data['errors'] = [
				'proestrus' => form_error('proestrus'),
			];
			$this->output_json($data);
		} else {
			$input = [
				'id_ternak_betina' => $id_ternak_betina,
				'proestrus' => $proestrus,
				'estrus' => $estrus,
				'diestrus' => $diestrus,
				'anestrus' => $anestrus,
				'siklus_selanjutnya' => $siklus_selanjutnya,
			];

			if($method === 'add'){
				$action = $this->master->create('siklus_birahi',$input);
			}elseif ($method === 'edit'){
				$action = $this->master->update('siklus_birahi',$input, 'id_siklus_birahi', $id_siklus_birahi);
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
		$this->db->where('id_siklus_birahi', $id);
		$this->db->delete('siklus_birahi');
		$this->output_json(['status' => true]);
	}

	public function pengaturan_save()
	{
		$id = $this->input->post('id', true);
		$method = $this->input->post('method', true);
		
		$inputProestrus = $this->input->post('inputProestrus', true);
		$inputDiestrus = $this->input->post('inputDiestrus', true);
		$inputAnestrus = $this->input->post('inputAnestrus', true);
		$inputEstrus = $this->input->post('inputEstrus', true);
		

		// if ($this->form_validation->run() === FALSE) {
		// 	$data['status'] = false;
		// 	$data['errors'] = [
		// 	];
		// 	$this->output_json($data);
		// } else {
			$input = [
				'proestrus' => $inputProestrus,
				'diestrus' => $inputDiestrus,
				'anestrus' => $inputAnestrus,
				'estrus' => $inputEstrus,
				
			];

			if($method === 'add'){
				$action = $this->master->create('pengaturan_siklus_birahi',$input);
			}elseif ($method === 'edit'){
				$action = $this->master->update('pengaturan_siklus_birahi',$input, 'id', $id);
			}

			if ($action) {
				$this->output_json(['status' => true]);
			} else {
				$this->output_json(['status' => false]);
			}
		// }
	}
	
}


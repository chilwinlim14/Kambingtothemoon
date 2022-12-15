<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Matings extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('auth');
		}
		$this->load->model('Mating_model','mating');
		$this->load->library(['datatables', 'form_validation']); 
		$this->load->model('Master_model','master');
		$this->load->model('Ternak_model', 'ternak');
		$this->user = $this->ion_auth->user()->row();
	}

	public function index()
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Pembiakan',
			'subjudul'	=> 'Perkawinan',
			
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('matings/data');
		$this->load->view('_template/dashboard/_footer');
		$this->load->view('matings/data-js');
	}

	public function output_json($data, $encode = true)
	{
		if ($encode) $data = json_encode($data);
		$this->output->set_content_type('application/json')->set_output($data);
	}

	public function data()
	{
		$this->output_json($this->mating->getDataMatings(), false);
	}

    public function tambah()
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Pembiakan',
			'subjudul'	=> 'Tambah Catatan Kawin',
			'pejantan' => $this->ternak->getDataternakJantan(),
			'indukan' => $this->ternak->getDataternakBetina(),
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('matings/tambah');
		$this->load->view('_template/dashboard/_footer');
	}

	public function save()
	{
		$id_matings = $this->input->post('id_matings', true);
		$method = $this->input->post('method', true);
		$setting = $this->mating->getDataPengaturanSiklusKawin();
		$id_ternak_jantan = $this->input->post('id_ternak_jantan', true);
		$id_ternak_betina = $this->input->post('id_ternak_betina', true);
		$tanggal_kawin = $this->input->post('tanggal_kawin', true);
		
		$pisah_jantan = date('Y-m-d', strtotime('+'. $setting->pisah_jantan .'days', strtotime($tanggal_kawin)));
		$cek_kehamilan = date('Y-m-d', strtotime('+'. $setting->cek_kehamilan .'days', strtotime($tanggal_kawin)));
		$pisah_kandang = date('Y-m-d', strtotime('+'. $setting->pisah_kandang .'days', strtotime($tanggal_kawin)));
		$lahiran = date('Y-m-d', strtotime('+'. $setting->inkubasi .'days', strtotime($tanggal_kawin)));
		$sapih = date('Y-m-d', strtotime('+'. $setting->sapih_anak .'days', strtotime($lahiran)));
		$kawin_kembali = date('Y-m-d', strtotime('+'. $setting->kawin_kembali .'days', strtotime($lahiran)));

		$this->form_validation->set_rules('tanggal_kawin', 'tanggal_kawin', 'required|trim');
		$this->form_validation->set_rules('id_ternak_betina', 'id_ternak_betina', 'required|trim');
		$this->form_validation->set_rules('id_ternak_jantan', 'id_ternak_jantan', 'required|trim');

		if ($this->form_validation->run() === FALSE) {
			$data['status'] = false;
			$data['errors'] = [
				'tanggal_kawin' => form_error('tanggal_kawin'),
				'id_ternak_betina' => form_error('id_ternak_betina'),
				'id_ternak_jantan' => form_error('id_ternak_jantan'),
			];
			$this->output_json($data);
		} else {
			$input = [
				'id_ternak_jantan' => $id_ternak_jantan,
				'id_ternak_betina' => $id_ternak_betina,
				'tanggal_kawin' => $tanggal_kawin,
				'pisah_jantan'=> $pisah_jantan,
				'cek_kehamilan'=> $cek_kehamilan,
				'pisah_kandang'=> $pisah_kandang,
				'lahiran'=> $lahiran,
				'sapih'=> $sapih,    
				'kawin_kembali'=> $kawin_kembali,
			];

			if($method === 'add'){
				$action = $this->master->create('matings',$input);
			}elseif ($method === 'edit'){
				$action = $this->master->update('matings',$input, 'id_matings', $id_matings);
			}

			if ($action) {
				$this->output_json(['status' => true]);
			} else {
				$this->output_json(['status' => false]);
			}
		}
	}

    public function pengaturanMatings()
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Pembiakan',
			'subjudul'	=> 'Pengaturan Matings',
			'siklus_kawin' => $this->mating->getDataPengaturanSiklusKawin(),
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('matings/pengaturanMatings');
		$this->load->view('_template/dashboard/_footer');
		$this->load->view('matings/pengaturanMatings-edit-js');
	}

	public function pengaturan_save()
	{
		$id = $this->input->post('id', true);
		$method = $this->input->post('method', true);
		
		$inkubasi = $this->input->post('inkubasi', true);
		$pisah_jantan = $this->input->post('pisah_jantan', true);
		$cek_kehamilan = $this->input->post('cek_hamil', true);
		$pisah_kandang = $this->input->post('pisah_kandang', true);
		$kawin_kembali = $this->input->post('kawin_kembali', true);
		$sapih_anak = $this->input->post('sapih_anak', true);
		

		// if ($this->form_validation->run() === FALSE) {
		// 	$data['status'] = false;
		// 	$data['errors'] = [
		// 	];
		// 	$this->output_json($data);
		// } else {
			$input = [
				'inkubasi' => $inkubasi,
				'pisah_jantan' => $pisah_jantan,
				'cek_kehamilan' => $cek_kehamilan,
				'pisah_kandang' => $pisah_kandang,
				'kawin_kembali' => $kawin_kembali,
				'sapih_anak' => $sapih_anak
			];

			if($method === 'add'){
				$action = $this->master->create('pengaturan_siklus_perkawinan',$input);
			}elseif ($method === 'edit'){
				$action = $this->master->update('pengaturan_siklus_perkawinan',$input, 'id', $id);
			}

			if ($action) {
				$this->output_json(['status' => true]);
			} else {
				$this->output_json(['status' => false]);
			}
		// }
	}
    public function editMatings()
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Pembiakan',
			'subjudul'	=> 'Edit Matings',
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('matings/editMatings');
		$this->load->view('_template/dashboard/_footer');
	}

}
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ternak extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('auth');
		}
		$this->load->model('Kandang_model', 'kandang');
		$this->load->model('Ternak_model', 'ternak');
		$this->load->library(['datatables', 'form_validation']);
		$this->load->model('Siklus_birahi_model', 'siklus_birahi');
		$this->load->model('Master_model', 'master');
		$this->user = $this->ion_auth->user()->row();
		$this->form_validation->set_error_delimiters('', '');
	}

	public function index()
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Ternak',
			'subjudul'	=> 'Daftar Ternak',
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('daftar_ternak/data');
		$this->load->view('_template/dashboard/_footer');
		$this->load->view('daftar_ternak/data-js');
	}

	public function output_json($data, $encode = true)
	{
		if ($encode) $data = json_encode($data);
		$this->output->set_content_type('application/json')->set_output($data);
	}

	public function data()
	{
		$this->output_json($this->ternak->getDataTernak(), false);
	}

	public function tambah()
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Ternak',
			'subjudul'	=> 'Tambah Ternak',
			'kandang'	=> $this->kandang->getDataKandangResult(),
			'bapak_ternak' => $this->ternak->getDataternakJantan(),
			'ibu_ternak' => $this->ternak->getDataternakBetina(),
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('daftar_ternak/tambah');
		$this->load->view('_template/dashboard/_footer');
		$this->load->view('daftar_ternak/tambah-js');
	}

	public function profil($key)
	{
		$ternak = $this->ternak->getDataTernakByTagInisial($key);
		$user = $this->user;
		// var_dump($this->ternak->getDataTernakbobot($ternak->id_ternak));die;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Ternak',
			'subjudul'	=> 'Profil Ternak',
			'data_ternak' => $this->ternak->getDataTernakByTagInisial($key),
			'umur' => $this->ternak->getDataTernakUmur($ternak->id_ternak),
			'bobot' => $this->ternak->getDataTernakbobot($ternak->id_ternak),
			'bapak' => $this->ternak->getDataternak_byId($ternak->bapak_ternak),
			'ibu' => $this->ternak->getDataternak_byId($ternak->ibu_ternak),
			'foto_ternak' => $this->ternak->get_data_foto_ternak_by_idternak($ternak->id_ternak)
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('daftar_ternak/profil');
		$this->load->view('_template/dashboard/_footer');
		$this->load->view('daftar_ternak/profil-js');
	}

	public function editprofil($key)
	{
		$ternak = $this->ternak->getDataTernakByTagInisial($key);
		$status = ["Pemilik","Peternak","UntukDijual","Terjual","Mati"];
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Ternak',
			'subjudul'	=> 'Edit Profil Ternak',
			'kandang'	=> $this->kandang->getDataKandangResult(),
			'status'=> $status,
			'bapak_ternak' => $this->ternak->getDataternakBapak($ternak->id_ternak),
			'ibu_ternak' => $this->ternak->getDataternakIbu($ternak->id_ternak),
			'data_ternak' => $this->ternak->getDataTernakByTagInisial($key),
			'umur' => $this->ternak->getDataTernakUmur($ternak->id_ternak),
			'bobot' => $this->ternak->getDataTernakbobot($ternak->id_ternak),
			'bapak' => $this->ternak->getDataternak_byId($ternak->bapak_ternak),
			'ibu' => $this->ternak->getDataternak_byId($ternak->ibu_ternak),
			'foto_ternak' => $this->ternak->get_data_foto_ternak_by_idternak($ternak->id_ternak)
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('daftar_ternak/editprofil');
		$this->load->view('_template/dashboard/_footer');
		$this->load->view('daftar_ternak/editprofil-js');
	}
	public function cari($key)
	{
		// $key = $this->input->post('key', true);
		// die($key);
		$ternak = $this->ternak->getDataTernakByTagInisial($key);
		// $action = true;
		if ($ternak) {
			$this->output_json(['status' => true,'nomor_tag'=>$ternak->nomor_tag]);
		} else {
			$this->output_json(['status' => false]);
		}
	}
	public function save()
	{
		$id_ternak = $this->input->post('id_ternak', true);
		$method = $this->input->post('method', true);

		$inisial = $this->input->post('inisial', true);
		$nomor_tag = $this->input->post('nomor_tag', true);
		$jenis_kelamin = $this->input->post('jenis_kelamin', true);
		$tanggal_lahir = $this->input->post('tanggal_lahir', true);
		$estimasi = $this->input->post('estimasi', true);
		$ras = $this->input->post('ras', true);
		$id_kandang = $this->input->post('id_kandang', true);
		$status = $this->input->post('status', true);
		$bapak_ternak = $this->input->post('bapak_ternak', true);
		$ibu_ternak = $this->input->post('ibu_ternak', true);
		$keterangan = $this->input->post('keterangan', true);

		$this->form_validation->set_rules('nomor_tag', 'nomor_tag', 'required|trim');
		$this->form_validation->set_rules('inisial', 'Inisial', 'required|trim');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim');
		$this->form_validation->set_rules('status', 'Status', 'required|trim');

		if ($this->form_validation->run() === FALSE) {
			$data['status'] = false;
			$data['errors'] = [
				'nomor_tag' => form_error('nomor_tag'),
				'inisial' => form_error('inisial'),
				'jenis_kelamin' => form_error('jenis_kelamin'),
				'tanggal_lahir' => form_error('tanggal_lahir'),
				'status' => form_error('status')
			];
			$this->output_json($data);
		} else {
			if (!empty($_FILES['foto_ternak']['name'])) {

				$config['upload_path'] = "./uploads/foto_ternak";
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['encrypt_name'] = TRUE;
				$this->load->library('upload', $config);

				if ($this->upload->do_upload("foto_ternak")) {
					$data_upload = array('upload_data' => $this->upload->data());

					if ($method === 'edit') {
						$data_lama = $this->ternak->getDataternak_byId($id_ternak);
						if ($data_lama->foto_ternak != NULL) {
							$file_lama = './uploads/foto_ternak/' . $data_lama->foto_ternak;
							unlink($file_lama);
						}
					}

					$input = [
						'inisial' 		=> $inisial,
						'nomor_tag' 	=> $nomor_tag,
						'jenis_kelamin' => $jenis_kelamin,
						'tanggal_lahir' => $tanggal_lahir,
						'estimasi' 		=> $estimasi,
						'ras' 			=> $ras,
						'id_kandang' 	=> $id_kandang,
						'id_peternak' 	=> 1,
						'status' 		=> $status,
						'bapak_ternak' 	=> $bapak_ternak,
						'ibu_ternak' 	=> $ibu_ternak,
						'keterangan' 	=> $keterangan,
						'foto_ternak'   => $data_upload['upload_data']['file_name']
					];

					if ($method === 'add') {
						$action = $this->master->create('ternak', $input);
					} elseif ($method === 'edit') {
						$action = $this->master->update('ternak', $input, 'id_ternak', $id_ternak);
					}
				} else {
					$data = [
						'status'     => false,
						'msg'        => $this->upload->display_errors()
					];
					$this->output_json($data);
				}
			} else {
				$input = [
					'inisial' 		=> $inisial,
					'nomor_tag' 	=> $nomor_tag,
					'jenis_kelamin' => $jenis_kelamin,
					'tanggal_lahir' => $tanggal_lahir,
					'estimasi' 		=> $estimasi,
					'ras' 			=> $ras,
					'id_kandang' 	=> $id_kandang,
					'id_peternak' 	=> 1,
					'status' 		=> $status,
					'bapak_ternak' 	=> $bapak_ternak,
					'ibu_ternak' 	=> $ibu_ternak,
					'keterangan' 	=> $keterangan
				];

				if ($method === 'add') {
					$action = $this->master->create('ternak', $input);
				} elseif ($method === 'edit') {
					$action = $this->master->update('ternak', $input, 'id_ternak', $id_ternak);
				}
			}

			if ($action) {
				$this->output_json(['status' => true,'nomor_tag'=>$nomor_tag]);
			} else {
				$this->output_json(['status' => false]);
			}
		}
	}

	public function add_foto_ternak($key)
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Ternak',
			'subjudul'	=> 'Tambah Foto Ternak',
			'data_ternak' => $this->ternak->getDataTernakByTagInisial($key)
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('daftar_ternak/add_foto_ternak');
		$this->load->view('_template/dashboard/_footer');
		$this->load->view('daftar_ternak/add_foto_ternak-js');
	}

	public function edit_foto_ternak($id, $key)
	{
		$user = $this->user;
		$data = [
			'user' 		=> $user,
			'judul'		=> 'Manajemen Ternak',
			'subjudul'	=> 'Edit Foto Ternak',
			'nomor_tag' => $key,
			'foto_ternak' => $this->ternak->get_data_foto_ternak_by_id($id)->row()
		];

		$this->load->view('_template/dashboard/_header', $data);
		$this->load->view('daftar_ternak/edit_foto_ternak');
		$this->load->view('_template/dashboard/_footer');
		$this->load->view('daftar_ternak/edit_foto_ternak-js');
	}

	public function save_foto_ternak()
	{
		$id_ternak = $this->input->post('id_ternak', true);
		$method = $this->input->post('method', true);

		$id = $this->input->post('id', true);

		$nomor_tag = $this->input->post('nomor_tag', true);
		$keterangan = $this->input->post('keterangan', true);

		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');


		if ($this->form_validation->run() === FALSE) {
			$data['status'] = false;
			$data['errors'] = [
				'keterangan' => form_error('keterangan'),
			];
			$this->output_json($data);
		} else {
			if ($method === 'add') {

				if (!empty($_FILES['foto_ternak']['name'])) {

					$config['upload_path'] = "./uploads/ternak_galeri";
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['encrypt_name'] = TRUE;
					$this->load->library('upload', $config);

					if ($this->upload->do_upload("foto_ternak")) {
						$data_upload = array('upload_data' => $this->upload->data());

						$input = [
							'id_ternak'		=> $id_ternak,
							'foto'        	=> $data_upload['upload_data']['file_name'],
							'keterangan'    => $keterangan
						];

						if ($method === 'add') {
							$action = $this->master->create('ternak_galeri', $input);
						} else if ($method === 'edit') {
							$action = $this->master->update('ternak_galeri', $input, 'id', $id);
						}

						if ($action) {
							$data = [
								'status'     => true,
								'nomor_tag'  => $nomor_tag
							];
							$this->output_json($data);
						} else {
							$this->output_json(['status' => false]);
						}
					} else {
						$data = [
							'status'     => false,
							'msg'        => $this->upload->display_errors()
						];
						$this->output_json($data);
					}
				} else {
					$data = [
						'status'     => false,
						'msg'        => 'Foto Belum Dipilih!'
					];
					$this->output_json($data);
				}
			} else if ($method === 'edit') {
				if (!empty($_FILES['foto_ternak']['name'])) {

					$config['upload_path'] = "./uploads/ternak_galeri";
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['encrypt_name'] = TRUE;
					$this->load->library('upload', $config);

					if ($this->upload->do_upload("foto_ternak")) {
						$data_upload = array('upload_data' => $this->upload->data());

						$data_lama = $this->ternak->get_data_foto_ternak_by_id($id)->row();
						if ($data_lama->foto != NULL) {
							$file_lama = './uploads/ternak_galeri/' . $data_lama->foto;
							unlink($file_lama);
						}

						$input = [
							'foto'        	=> $data_upload['upload_data']['file_name'],
							'keterangan'    => $keterangan
						];

						if ($method === 'add') {
							$action = $this->master->create('ternak_galeri', $input);
						} else if ($method === 'edit') {
							$action = $this->master->update('ternak_galeri', $input, 'id', $id);
						}
					} else {
						$data = [
							'status'     => false,
							'msg'        => $this->upload->display_errors()
						];
						$this->output_json($data);
					}
				} else {

					$input = [
						'keterangan'    => $keterangan
					];

					if ($method === 'add') {
						$action = $this->master->create('ternak_galeri', $input);
					} else if ($method === 'edit') {
						$action = $this->master->update('ternak_galeri', $input, 'id', $id);
					}
				}

				if ($action) {
					$data = [
						'status'     => true,
						'nomor_tag'  => $nomor_tag
					];
					$this->output_json($data);
				} else {
					$this->output_json(['status' => false]);
				}
			}
		}
	}

	public function delete_foto_ternak($id)
	{
		$data_lama = $this->ternak->get_data_foto_ternak_by_id($id)->row();
		$action = $this->ternak->delete_foto_ternak($id);

		if ($data_lama->foto != NULL) {
			$file_lama = './uploads/ternak_galeri/' . $data_lama->foto;
			unlink($file_lama);
		}

		if ($action) {
			$this->output_json(['status' => true]);
		} else {
			$this->output_json(['status' => false]);
		}
	}
}

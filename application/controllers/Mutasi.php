<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mutasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_id();
		$this->load->model('Kader_model');
		$this->load->model('Import_model');
		$this->load->model('Mutasi_model');
		$this->load->library('excell');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Mutasi Kader';

		$dpra = $data['user']['dpra'];
		$dpc = $data['user']['dpc'];

		$data['kader'] = $this->Kader_model->getAllDataKader($dpra,$dpc);
		$data['mutasi'] = $this->Mutasi_model->getAllDataMutasi();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('template/navbar');
		$this->load->view('mutasi/index');
		$this->load->view('template/footer');
	}

	public function buat_mutasi(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Buat Mutasi Kader';
		$dpra = $data['user']['dpra'];
		$dpc = $data['user']['dpc'];

		$data['dpra'] = $this->db->get_where('dpra', ['id' => $dpra])->row_array();
		$data['dpc'] = $this->db->get_where('dpc', ['id' => $dpc])->row_array();
		$data['kader'] = $this->Kader_model->getAllDataKader($dpra,$dpc);

		$this->form_validation->set_rules('nama_kader', 'Nama', 'required');
		$this->form_validation->set_rules('nik_kader', 'NIK', 'required');
		$this->form_validation->set_rules('no_hp_kader', 'No HP', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('pendidikan', 'pendidikan', 'required');

		if ($this->form_validation->run()==false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar');
			$this->load->view('template/navbar');
			$this->load->view('mutasi/buat_mutasi');
			$this->load->view('template/footer');
		}else{
			$nama = $this->input->post('nama_kader');
			$nik = $this->input->post('nik_kader');
			$data = [
				'dpc_id' => $dpc,
				'dpra_id' => $dpra,
				'no_anggota' => $this->input->post('no_anggota'),
				'nama' => $nama,
				'nik' => $nik,
				'no_hp' => $this->input->post('no_hp_kader'),
				'email' => $this->input->post('email'),
				'alamat' => $this->input->post('alamat'),
				'pembina' => $this->input->post('pembina'),
				'pendidikan' => $this->input->post('pendidikan'),
				'catatan' => $this->input->post('catatan'),
				'tanggal_daftar' => date('Y-m-d H:i:s'),
				'persetujuan'=> 1,
			];
			$this->db->insert('kader', $data);
			$this->session->set_flashdata('message', '
				<div class="alert alert-success text-success">
				Data kader berhasil ditambah!
				</div>');
			redirect('mutasi/detail_mutasi?nama='.$nama.'&nik='.$nik);
		}
	}

	public function detail_mutasi(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Detail Mutasi Kader';

		$data['dpra'] = $this->db->get('dpra')->result_array();
		$data['dpc'] = $this->db->get('dpc')->result_array();
		$nama = $this->input->get('nama');
		$nik = $this->input->get('nik');

		$data['kader'] = $this->Kader_model->getDataKaderByNameNIK($nama, $nik);
		
		if ($data['kader'] == null) {
			$this->session->set_flashdata('message', '
				<div class="alert alert-danger text-danger">
				Data kader tidak ditemukan!
				</div>');
			redirect('mutasi/buat_mutasi');
		}else{
			$this->form_validation->set_rules('jenis', 'Nama', 'required');
			if($this->form_validation->run() == false){
				$this->load->view('template/header', $data);
				$this->load->view('template/sidebar');
				$this->load->view('template/navbar');
				$this->load->view('mutasi/detail_mutasi');
				$this->load->view('template/footer');
			}else{
				date_default_timezone_set('Asia/Jakarta');
				$idkader = $data['kader']['id'];
				$inputdpc = $this->input->post('dpc_id');
				$inputdpra = $this->input->post('dpra_id');
				$jenis = $this->input->post('jenis');
				$catatan = $this->input->post('catatan');
				$dataa = [
					'id_kader' => $idkader,
					'jenis_mutasi' => $jenis,
					'dpc' => $inputdpc,
					'dpra' => $inputdpra,
					'catatan' => $catatan,
					'file' => $this->fungsiUploadFile('file'),
					'persetujuan' => 0,
					'tanggal_mutasi' => date('Y-m-d H:i:s'),
				];
				$this->db->insert('mutasi', $dataa);

				$this->db->set('persetujuan', 0);
				$this->db->where('id', $idkader);
				$this->db->update('kader');

				$this->session->set_flashdata('message', '
					<div class="alert alert-success text-success">
					Data mutasi berhasil dibuat!
					</div>');
				redirect('mutasi');
			}
		}
	}

	public function edit_mutasi($idmutasi){
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Edit Mutasi Kader';
		$data['mutasi'] = $this->db->get_where('mutasi', ['id_mutasi' => $idmutasi])->row_array();
		$idkader = $data['mutasi']['id_kader'];
		$data['kader'] = $this->Kader_model->getDataKaderById($idkader);

		$this->form_validation->set_rules('jenis', 'Nama', 'required');


		if($this->form_validation->run() == false){
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar');
			$this->load->view('template/navbar');
			$this->load->view('mutasi/edit_mutasi');
			$this->load->view('template/footer');
		}else{
			date_default_timezone_set('Asia/Jakarta');
			$idkader = $data['kader']['id'];
			$inputdpc = $this->input->post('dpc_id');
			$inputdpra = $this->input->post('dpra_id');
			$jenis = $this->input->post('jenis');
			$catatan = $this->input->post('catatan');

			$oldfile = $this->input->post('oldfile');

			if (!empty($_FILES['file']['name'])) {
				$dataa = array(
					'id_kader' => $idkader,
					'jenis_mutasi' => $jenis,
					'dpc' => $inputdpc,
					'dpra' => $inputdpra,
					'catatan' => $catatan,
					'file' => $this->fungsiUploadFile('file'),
					'persetujuan' => 0,
				);
				unlink(FCPATH . 'assets/file/upload/'. $oldfile);
			}else{
				$dataa = array(
					'id_kader' => $idkader,
					'jenis_mutasi' => $jenis,
					'dpc' => $inputdpc,
					'dpra' => $inputdpra,
					'catatan' => $catatan,
					'file' => $oldfile,
					'persetujuan' => 0,
				);
			}
			$this->db->where('id_mutasi', $idmutasi);
			$this->db->update('mutasi', $dataa);

			$this->db->set('persetujuan', 0);
			$this->db->where('id', $idkader);
			$this->db->update('kader');

			$this->session->set_flashdata('message', '
				<div class="alert alert-success text-success">
				Data mutasi berhasil diubah!
				</div>');
			redirect('mutasi');
		}
	}

	public function hapus_mutasi($idmutasi){
		$_id = $this->db->get_where('mutasi', ['id_mutasi' => $idmutasi])->row_array();
		$idkader = $_id['id_kader'];

		$this->db->set('persetujuan', 1);
		$this->db->where('id', $idkader);
		$this->db->update('kader');

		$query = $this->db->delete('mutasi', ['id_mutasi' =>$idmutasi]);
		if ($query) {
			unlink(FCPATH . 'assets/file/upload/'. $_id['file']);
		}
		$this->session->set_flashdata('message', '
			<div class="alert alert-success text-success">
			Data Mutasi Berhasil dihapus!
			</div>');
		redirect('mutasi');
	}

	public function getDataDpc()
	{
		$searchTerm = $this->input->post('searchTerm');
		$response   = $this->Mutasi_model->getdpc($searchTerm);
		echo json_encode($response);
	}

	public function getDataDpraByDpc($id_dpc)
	{
		$searchTerm = $this->input->post('searchTerm');
		$response   = $this->Mutasi_model->getdpra($id_dpc, $searchTerm);
		echo json_encode($response);
	}

	public function fungsiUploadFile($namainputan){
		$config['upload_path']          = './assets/file/upload/';
		$config['allowed_types']        = 'jpg|jpeg|png|doc|docx|ppt|pptx|xls|xlsx|rar|zip|pdf';
		$config['max_size']             = 0;
		$this->load->library('upload', $config);
		$this->upload->do_upload($namainputan);
		return $this->upload->data("file_name");
	}
}
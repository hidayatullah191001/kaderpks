<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kader extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_id();
		$this->load->model('Kader_model');
		$this->load->model('Import_model');
		$this->load->library('excell');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Data Kader';

		$dpra = $data['user']['dpra'];
		$dpc = $data['user']['dpc'];

		$data['kader'] = $this->Kader_model->getAllDataKader($dpra,$dpc);

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('template/navbar');
		$this->load->view('kader/index');
		$this->load->view('template/footer');
	}

	public function tambah_kader(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Tambah Data Kader';

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
			$this->load->view('kader/tambah_kader');
			$this->load->view('template/footer');
		}else{
			date_default_timezone_set('Asia/Jakarta');
			$data = [
				'dpc_id' => $dpc,
				'dpra_id' => $dpra,
				'no_anggota' => $this->input->post('no_anggota'),
				'nama' => $this->input->post('nama_kader'),
				'nik' => $this->input->post('nik_kader'),
				'no_hp' => $this->input->post('no_hp_kader'),
				'email' => $this->input->post('email'),
				'alamat' => $this->input->post('alamat'),
				'pembina' => $this->input->post('pembina'),
				'pendidikan' => $this->input->post('pendidikan'),
				'catatan' => $this->input->post('catatan'),
				'tanggal_daftar' => date('Y-m-d H:i:s'),
			];
			$this->db->insert('kader', $data);
			$this->session->set_flashdata('message', '
				<div class="alert alert-success text-success">
				Data kader berhasil ditambah!
				</div>');
			redirect('kader');
		}
	}


	public function edit_kader($idkader = null){
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Edit Data Kader';

		$dpra = $data['user']['dpra'];
		$dpc = $data['user']['dpc'];

		$data['dpra'] = $this->db->get_where('dpra', ['id' => $dpra])->row_array();
		$data['dpc'] = $this->db->get_where('dpc', ['id' => $dpc])->row_array();

		$data['kader'] = $this->Kader_model->getDataKaderById($idkader);

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
			$this->load->view('kader/edit_kader');
			$this->load->view('template/footer');
		}else{
			$this->Kader_model->updateKader($idkader);
			$this->session->set_flashdata('message', '
				<div class="alert alert-success text-success">
				Data kader berhasil diedit!
				</div>');
			redirect('kader');
		}
	}

	public function hapus_kader($idkader){
		$this->db->delete('kader', ['id' =>$idkader]);
		$this->session->set_flashdata('message', '
			<div class="alert alert-success text-success">
			Data kader berhasil dihapus!
			</div>');
		redirect('kader');
	}

	public function import_kader(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Import Kader';

		$dpra = $data['user']['dpra'];
		$dpc = $data['user']['dpc'];

		$data['dpra'] = $this->db->get_where('dpra', ['id' => $dpra])->row_array();
		$data['dpc'] = $this->db->get_where('dpc', ['id' => $dpc])->row_array();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('template/navbar');
		$this->load->view('kader/import_kader');
		$this->load->view('template/footer');
	}

	public function import_excel(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$dpra = $data['user']['dpra'];
		$dpc = $data['user']['dpc'];
		date_default_timezone_set('Asia/Jakarta');

		if (isset($_FILES["fileExcel"]["name"])) {
			$path = $_FILES["fileExcel"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();	
				for($row=5; $row<=$highestRow; $row++)
				{
					$no_anggota = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$nama = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
					$nik = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$no_hp = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$email = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
					$alamat = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
					$pembina = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
					$pendidikan = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
					$catatan = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
					$temp_data[] = array(
						'dpc_id' => $dpc,
						'dpra_id' => $dpra,
						'no_anggota' => $no_anggota,
						'nama'	=> $nama,
						'nik'	=> $nik,
						'no_hp'	=> $no_hp,
						'email'	=> $email,
						'alamat' => $alamat,
						'pembina' => $pembina,
						'pendidikan' => $pendidikan,
						'catatan' => $catatan,
						'tanggal_daftar' => date('Y-m-d H:i:s'),
					); 	
				}
			}
			$insert = $this->Import_model->insert($temp_data);
			if($insert){
				$this->session->set_flashdata('message', '
					<div class="alert alert-success text-success">
					Data kader berhasi di Import ke Database!
					</div>');
				redirect('kader/upload_kader');
			}else{
				$this->session->set_flashdata('status', '<span class="glyphicon glyphicon-remove"></span> Terjadi Kesalahan');
				redirect('kader/upload_kader');
			}
		}else{
			echo "Tidak ada file yang masuk";
		}
	}

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kantor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_id();
		$this->load->model('Kantor_model');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Data DPC';
		$data['dpc'] = $this->Kantor_model->getAllDataDPC();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('template/navbar');
		$this->load->view('kantor/index');
		$this->load->view('template/footer');
	}

	public function tambah_dpc(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Tambah Kantor DPC';

		$this->form_validation->set_rules('nama_dpc', 'Nama DPC', 'required');
		$this->form_validation->set_rules('no_hp', 'No Handphone', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		
		if ($this->form_validation->run()==false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar');
			$this->load->view('template/navbar');
			$this->load->view('kantor/tambah_dpc');
			$this->load->view('template/footer');
		}else{
			$data = [
				'nama_dpc' => $this->input->post('nama_dpc'),
				'no_telp_dpc' => $this->input->post('no_hp'),
				'alamat_dpc' => $this->input->post('alamat'),
			];
			$this->db->insert('dpc', $data);
			$this->session->set_flashdata('message', '
				<div class="alert alert-success text-success">
				Data kantor DPC berhasil ditambah!
				</div>');
			redirect('kantor');
		}
	}

	public function edit_dpc($iddpc=null){
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Edit Kantor DPC';

		$data['dpc'] = $this->db->get_where('dpc', ['id' => $iddpc])->row_array();

		$this->form_validation->set_rules('nama_dpc', 'Nama DPC', 'required');
		$this->form_validation->set_rules('no_hp', 'No Handphone', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		
		if ($this->form_validation->run()==false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar');
			$this->load->view('template/navbar');
			$this->load->view('kantor/edit_dpc');
			$this->load->view('template/footer');
		}else{
			$data = [
				'nama_dpc' => $this->input->post('nama_dpc'),
				'no_telp_dpc' => $this->input->post('no_hp'),
				'alamat_dpc' => $this->input->post('alamat'),
			];
			$this->db->where('id', $iddpc);
			$this->db->update('dpc', $data);
			$this->session->set_flashdata('message', '
				<div class="alert alert-success text-success">
				Data kantor DPC berhasil diperbarui!
				</div>');
			redirect('kantor');
		}
	}

	public function hapus_dpc($iddpc = null){
		$this->db->delete('dpc', ['id' =>$iddpc]);
		$this->session->set_flashdata('message', '
			<div class="alert alert-success text-success">
			Data kantor DPC berhasil dihapus!
			</div>');
		redirect('kantor');
	}

	public function data_dpra(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Data DPRa';
		$data['dpra'] = $this->Kantor_model->getAllDataDPRa();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('template/navbar');
		$this->load->view('kantor/data_dpra');
		$this->load->view('template/footer');
	}


	public function tambah_dpra(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Tambah Kantor DPRa';

		$data['dpc'] = $this->Kantor_model->getAllDataDPC();

		$this->form_validation->set_rules('id_dpc', 'Kantor DPC', 'required');
		$this->form_validation->set_rules('nama_dpra', 'Nama DPRa', 'required');
		$this->form_validation->set_rules('no_hp', 'No Handphone', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		
		if ($this->form_validation->run()==false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar');
			$this->load->view('template/navbar');
			$this->load->view('kantor/tambah_dpra');
			$this->load->view('template/footer');
		}else{
			$data = [
				'dpc_id' => $this->input->post('id_dpc'),
				'nama_dpra' => $this->input->post('nama_dpra'),
				'no_telp_dpra' => $this->input->post('no_hp'),
				'alamat_dpra' => $this->input->post('alamat'),
			];
			$this->db->insert('dpra', $data);
			$this->session->set_flashdata('message', '
				<div class="alert alert-success text-success">
				Data kantor DPRa berhasil ditambah!
				</div>');
			redirect('kantor/data_dpra');
		}
	}

	public function edit_dpra($iddpra=null){
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Edit Kantor DPRa';

		$data['dpra'] = $this->db->get_where('dpra', ['id' => $iddpra])->row_array();
		$data['dpc'] = $this->Kantor_model->getAllDataDPC();

		$this->form_validation->set_rules('id_dpc', 'Kantor DPC', 'required');
		$this->form_validation->set_rules('nama_dpra', 'Nama DPRa', 'required');
		$this->form_validation->set_rules('no_hp', 'No Handphone', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		
		if ($this->form_validation->run()==false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar');
			$this->load->view('template/navbar');
			$this->load->view('kantor/edit_dpra');
			$this->load->view('template/footer');
		}else{
			$data = [
				'dpc_id' => $this->input->post('id_dpc'),
				'nama_dpra' => $this->input->post('nama_dpra'),
				'no_telp_dpra' => $this->input->post('no_hp'),
				'alamat_dpra' => $this->input->post('alamat'),
			];
			$this->db->where('id', $iddpra);
			$this->db->update('dpra', $data);
			$this->session->set_flashdata('message', '
				<div class="alert alert-success text-success">
				Data kantor DPRa berhasil diperbarui!
				</div>');
			redirect('kantor/data_dpra');
		}
	}

	public function hapus_dpra($iddpra = null){
		$this->db->delete('dpra', ['id' =>$iddpra]);
		$this->session->set_flashdata('message', '
			<div class="alert alert-success text-success">
			Data kantor DPRa berhasil dihapus!
			</div>');
		redirect('kantor/data_dpra');
	}
}
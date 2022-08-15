<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dpc extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_id();
		$this->load->model('User_model');
		$this->load->model('Kader_model');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Dashboard';

		$dpra = $data['user']['dpra'];
		$dpc = $data['user']['dpc'];

		$data['pengguna'] = $this->User_model->getDataUserDpc($this->session->userdata('email'));
		$data['dpra'] = $this->db->get_where('dpra', ['id' => $dpra])->row_array();
		$data['dpc'] = $this->db->get_where('dpc', ['id' => $dpc])->row_array();
		if ($dpra == 0) {
			$data['nama_dpra'] = "-";
		}else{
			$data['nama_dpra'] = $data['dpra']['nama_dpra'];
		}
		if ($dpc == 0) {
			$data['nama_dpc'] = "-";
		}else{
			$data['nama_dpc'] = $data['dpc']['nama_dpc'];
		}
		$data['jumlah_kader'] = $this->Kader_model->jumlahKader($dpra, $dpc);

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('template/navbar');
		$this->load->view('dpc/index');
		$this->load->view('template/footer');
	}

	public function data_kader(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Data Kader';

		$dpc = $data['user']['dpc'];
		$data['kader'] = $this->Kader_model->getAllDataKaderByDpc($dpc);

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('template/navbar');
		$this->load->view('dpc/data_kader');
		$this->load->view('template/footer');
	}
}

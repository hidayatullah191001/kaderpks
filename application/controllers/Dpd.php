<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dpd extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_id();
		$this->load->model('User_model');
		$this->load->model('Kader_model');
		$this->load->model('Import_model');
		$this->load->model('Mutasi_model');
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

	public function data_mutasi()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Data Mutasi';

		$data['mutasi'] = $this->Mutasi_model->getAllDataMutasi();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('template/navbar');
		$this->load->view('dpd/data_mutasi');
		$this->load->view('template/footer');
	}

	public function detail_mutasi($id=null)
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Detail Data Mutasi';

		$data['mutasi'] = $this->Mutasi_model->getDataMutasi($id);
		$idkader = $data['mutasi']['id_kader'];
		$data['kader'] = $this->Kader_model->getDataKaderById($idkader);
		$data['id_mutasi'] = $id;

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('template/navbar');
		$this->load->view('dpd/detail_mutasi', $data);
		$this->load->view('template/footer');
	}

	public function proses_mutasi($id = null){
		$data['mutasi'] = $this->Mutasi_model->getDataMutasiById($id);
		$id_kader = $data['mutasi']['id_kader'];
		$jenis_mutasi = $data['mutasi']['jenis_mutasi'];
		$dpc_tujuan = $data['mutasi']['dpc'];
		$dpra_tujuan = $data['mutasi']['dpra'];

		if ($jenis_mutasi == 'Keluar') {
			$this->db->set('dpc_id', $dpc_tujuan);
			$this->db->set('dpra_id', $dpra_tujuan);
			$this->db->set('persetujuan', 1);
			$this->db->where('id', $id_kader);
			$this->db->update('kader');

			$this->db->set('persetujuan', 1);
			$this->db->where('id_mutasi', $id);
			$this->db->update('mutasi');
		}else if($jenis_mutasi == 'Masuk'){
			$this->db->set('persetujuan', 1);
			$this->db->set('status', 1);
			$this->db->where('id', $id_kader);
			$this->db->update('kader');

			$this->db->set('persetujuan', 1);
			$this->db->where('id_mutasi', $id);
			$this->db->update('mutasi');
		}
		$this->session->set_flashdata('message', '
			<div class="alert alert-success text-success">
			Data Mutasi Kader telah disetujui!
			</div>');
		redirect('dpd/data_mutasi');
	}

	public function user_management()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'User Management';

		$data['userr'] = $this->db->get('user')->result_array();

		$data['role'] = $this->db->get('user_role')->result_array();
		$data['dpra'] = $this->db->get('dpra')->result_array();
		$data['dpc'] = $this->db->get('dpc')->result_array();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('dpd/manage', $data);
		$this->load->view('template/footer');
	}

	public function add_user(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Add New User';

		$data['userr'] = $this->db->get('user')->result_array();

		$data['role'] = $this->db->get('user_role')->result_array();
		$data['dpra'] = $this->db->get('dpra')->result_array();
		$data['dpc'] = $this->db->get('dpc')->result_array();

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'This email has already registered!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
			'matches' => 'Password dont match!',
			'min_length' => 'Password to short!'
		]);
		$this->form_validation->set_rules('password2', 'Passoword', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('message', '
				<div class="alert alert-danger text-danger">
				Something wrong!
				</div>');
			redirect('dpd/user_management');
		} else {
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => htmlspecialchars($this->input->post('role_id', true)),
				'dpra' => htmlspecialchars($this->input->post('select_dpra', true)),
				'dpc'=> htmlspecialchars($this->input->post('select_dpc', true)),
				'is_active' => 1,
				'date_created' => time()
			];
			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success text-success">
				Akun berhasil dibuat!
				</div>');
			redirect('dpd/user_management');
		}
	}

	public function edit_user($iduser=null){
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Edit Akun User';

		$data['role'] = $this->db->get('user_role')->result_array();
		$data['dpra'] = $this->db->get('dpra')->result_array();
		$data['dpc'] = $this->db->get('dpc')->result_array();

		$data['edit'] = $this->User_model->getDataUserById($iduser);

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('role_id', 'Role', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar', $data);
			$this->load->view('template/navbar', $data);
			$this->load->view('dpd/edit_user', $data);
			$this->load->view('template/footer');
		} else {
			$dataa = [
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'role_id' => $this->input->post('role_id'),
				'dpra' => $this->input->post('select_dpra'),
				'dpc'=> $this->input->post('select_dpc'),
				'is_active' => $this->input->post('is_active')
			];
			$this->db->where('id', $iduser);
			$this->db->update('user', $dataa);
			$this->session->set_flashdata('message', '<div class="alert alert-success text-success">
				Akun user berhasil diperbaharui!
				</div>');
			redirect('dpd/user_management');
		}
	}

	public function hapus_user($iduser=null){
		$_id = $this->db->get_where('user', ['id' => $iduser])->row_array();
        $query = $this->db->delete('user', ['id' =>$iduser]);
        if ($query) {
            if($_id['image'] != 'default.jpg')
                unlink(FCPATH . 'assets/images/profile/'. $_id['image']);
        }
        $this->session->set_flashdata('message', '
            <div class="alert alert-success text-success">
            Data Akun Berhasil Dihapus!
            </div>');
        redirect('dpd/user_management');
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
}

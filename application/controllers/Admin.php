<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_id();
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Dashboard';

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar');
		$this->load->view('template/navbar');
		$this->load->view('admin/index');
		$this->load->view('template/footer');
	}


	public function role()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Role';

		$data['role'] = $this->db->get('user_role')->result_array();

		$this->form_validation->set_rules('role', 'Role', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar');
			$this->load->view('template/navbar');
			$this->load->view('admin/role');
			$this->load->view('template/footer');      
		}else{
			$this->db->insert('user_role', ['role' => $this->input->post('role')]);
			$this->session->set_flashdata('message', '
				<div class="alert alert-success text-success">
				New Role added!
				</div>');
			redirect('admin/role');
		}
	}

	public function roleAccess($role_id)
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Role Access';

		$data['role'] = $this->db->get_where('user_role',['id_role' =>$role_id])->row_array();
		$this->db->where('id !=', 1);
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/navbar', $data);
		$this->load->view('admin/roleaccess', $data);
		$this->load->view('template/footer');
	}

	public function changeAccess(){

		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');

		$data = [
			'role_id' =>$role_id,
			'menu_id' =>$menu_id
		];

		$result = $this->db->get_where('user_access_menu', $data);

		if($result->num_rows()<1){
			$this->db->insert('user_access_menu', $data);
		}else{
			$this->db->delete('user_access_menu', $data);

		}
		$this->session->set_flashdata('message', '
			<div class="alert alert-success text-success">
			Access Change!
			</div>');
	}

	public function delete_role($id)
	{
		$this->db->delete('user_role', ['id_role' => $id]);
		$this->session->set_flashdata('message', '
			<div class="alert alert-success text-success">
			Successfully Deleted!
			</div>');
		redirect('admin/role');
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
		$this->load->view('admin/manage', $data);
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
			redirect('admin/user_management');
		} else {
			$data = [
				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => htmlspecialchars($this->input->post('role_id', true)),
				'dpra' => htmlspecialchars($this->input->post('dpra_id', true)),
				'dpc'=> htmlspecialchars($this->input->post('dpc_id', true)),
				'is_active' => 1,
				'date_created' => time()
			];
			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success text-success">
				Akun berhasil dibuat!
				</div>');
			redirect('admin/user_management');
		}
	}
}

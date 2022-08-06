<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

	public function __construct() {
		parent::__construct();
		is_logged_id();
		$this->load->model('Menu_model');
		$this->load->model('EditMenu_model');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['title'] = 'Menu Management';

		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('menu', 'Menu', 'required');

		if ($this->form_validation->run()==false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar');
			$this->load->view('template/navbar');
			$this->load->view('menu/index');
			$this->load->view('template/footer');
		}else{
			$this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
			$this->session->set_flashdata('message', '
				<div class="alert alert-success text-success">
				New Menu added!
				</div>');
			redirect('menu');
		}
	}

	public function submenu(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Submenu Management';

		$data['subMenu'] = $this->Menu_model->getSubMenu();
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar');
			$this->load->view('template/navbar');
			$this->load->view('menu/submenu');
			$this->load->view('template/footer');

		}else{
			$active = $this->input->post('is_active');
			if ($active== null) {
				$active = 0;
			}
			$data = [
				'title' => $this->input->post('title'),
				'menu_id' => $this->input->post('menu_id'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),	
				'is_active' => $active
			];

			$this->db->insert('user_sub_menu', $data);
			$this->session->set_flashdata('message', '
				<div class="alert alert-success text-success">
				New Sub Menu added!
				</div>');
			redirect('menu/submenu');
		}
	}

	public function edit($id=null) {

		$data['title'] = 'Edit Submenu';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['edit'] = $this->Menu_model->getById($id);

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('menu_id', 'menu_id', 'required');
		$this->form_validation->set_rules('url', 'url', 'required');
		$this->form_validation->set_rules('icon', 'icon', 'required');

		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('message', '
				<div class="alert alert-danger text-danger">
				Something wrong!
				</div>');
			redirect('menu/submenu');
		}
		else
		{
			$title = $this->input->post('title');
			$menu_id = $this->input->post('menu_id');
			$url = $this->input->post('url');
			$icon = $this->input->post('icon');
			$is_active = $this->input->post('is_active');

			$this->db->set('title', $title);
			$this->db->set('menu_id', $menu_id);
			$this->db->set('url', $url);
			$this->db->set('icon', $icon);
			$this->db->set('is_active', $is_active);
			$this->db->where('id', $id);
			$this->db->update('user_sub_menu');

			$this->session->set_flashdata('message', '
				<div class="alert alert-success text-success">
				Successfully changed!
				</div>');
			redirect('menu/submenu');
		}
	}

	public function edit_menu($id) {

		$data['title'] = 'Edit Menu';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$data['edit'] = $this->EditMenu_model->getById2($id);

		$this->form_validation->set_rules('menu', 'Menu', 'required');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('Menu/edit_menu', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$this->EditMenu_model->update_menu();
			$this->session->set_flashdata('message', '
				<div class="alert alert-success text-success">
				<div class = "icon text-white">
				<i class="fas fa-fw fa-check"></i>
				</div>
				Successfully changed!
				</div>');
			redirect('menu');
		}
	}

	public function hapus_menu($id){
		$this->db->delete('user_menu', ['id' => $id]);
		$this->session->set_flashdata('message', '
			<div class="alert alert-success text-success">
			Delete success!
			</div>');
		redirect('menu');
	}

	public function hapus_subMenu($id){
		$this->db->delete('user_sub_menu', ['id' => $id]);
		$this->session->set_flashdata('message', '
			<div class="alert alert-success text-success">
			Delete success!
			</div>');
		redirect('menu/submenu');
	}
}
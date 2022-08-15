<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_id();
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'User Profile';

		$this->form_validation->set_rules('name', 'Full Name', 'required|trim');
		if($this->form_validation->run()==false){
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar');
			$this->load->view('template/navbar');
			$this->load->view('settings/index');
			$this->load->view('template/footer');
		}else{
			$name = $this->input->post('name');
			$email = $this->input->post('email');

			$upload_image = $_FILES['image']['name'];

			if($upload_image){
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '2048';
				$config['upload_path'] = './assets/images/profile/';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('image'))
				{
					$old_image = $data['user']['image'];
					if($old_image != 'default.jpg'){
						unlink(FCPATH . 'assets/images/profile/'. $old_image);
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('image', $new_image);
				}
				else
				{
					echo $this->upload->display_errors();
				}
			}

			$this->db->set('name', $name);
			$this->db->where('email', $email);
			$this->db->update('user');

			$this->session->set_flashdata('message', '
				<div class="alert alert-success text-success">
				Data user profile berhasil diperbaharui!
				</div>');
			redirect('settings');
		}
	}

	public function ubah_password(){
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$id = $data['user']['id'];

		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
			'required'=> 'Password tidak boleh kosong!',
			'matches' => 'Password tidak sama!',
			'min_length' => 'Password terlalu pendek. Min 8 char!'
		]);
		$this->form_validation->set_rules('password2', 'Passoword', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Ubah Password';
			$this->load->view('template/header', $data);
			$this->load->view('template/sidebar');
			$this->load->view('template/navbar');
			$this->load->view('settings/ubah_password');
			$this->load->view('template/footer');
		}else{
			$pwbaru = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$this->db->set('password', $pwbaru);
			$this->db->where('id', $id);
			$this->db->update('user');
			$this->session->set_flashdata('message', '<div class="alert alert-success">
				Password berhasil diubah!</div>');
			redirect('settings/ubah_password');
		}
	}
}
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EditMenu_model extends CI_Model
{
	private $_table = "user_menu";

	public $id;
	public $menu;

	public function getById2($id_user) {
		return $this->db->get_where($this->_table, ["id" => $id_user])->row();
	}

	public function update_menu() {
		$post = $this->input->post();

		$this->id = $post["id"];
		$this->menu = $post["menu"];

		$this->db->update($this->_table, $this, array('id' => $post['id']));

	}
}

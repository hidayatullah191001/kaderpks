<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
	public function getDataUser($email){
		$query = "SELECT user.*, user_role.*, dpra.*, dpc.* FROM user 
		INNER JOIN user_role on user.role_id = user_role.id_role 
		INNER JOIN dpra ON user.dpra = dpra.id INNER JOIN dpc on user.dpc = dpc.id WHERE user.email = '$email'";
		return $this->db->query($query)->row_array();
	}
}
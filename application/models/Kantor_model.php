<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kantor_model extends CI_Model
{

	public function getAllDataDPC(){
		$query = "SELECT * FROM dpc";
		return $this->db->query($query)->result_array();
	}

	public function getAllDataDPRa(){
		$query = "SELECT dpc.id, dpc.nama_dpc, dpra.* FROM dpra 
		INNER JOIN dpc on dpra.dpc_id = dpc.id";
		return $this->db->query($query)->result_array();
	}
}
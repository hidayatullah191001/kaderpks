<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kader_model extends CI_Model
{

	public function getAllDataKader($dpra, $dpc){
		$query = "SELECT `kader`.*, `dpc`.`nama_dpc`, `dpra`.`nama_dpra` 
		FROM `kader` 
		INNER JOIN `dpra` on `dpra`.`id` = `kader`.`dpra_id` 
		INNER JOIN `dpc` on `dpc`.`id` = `kader`.`dpc_id`
		WHERE `kader`.`dpra_id` = $dpra AND `kader`.`dpc_id` = $dpc";
		return $this->db->query($query)->result_array();
	}

	public function getDataKaderById($idkader){
		$this->db->select('*');
		$this->db->from('kader');
		$this->db->where('id', $idkader);
		return $this->db->get()->row_array();
	}

	public function updateKader($idkader){
		$data = array(
			'no_anggota' => $this->input->post('no_anggota'),
			'nama' => $this->input->post('nama_kader'),
			'nik' => $this->input->post('nik_kader'),
			'no_hp' => $this->input->post('no_hp_kader'),
			'email' => $this->input->post('email'),
			'alamat' => $this->input->post('alamat'),
			'pembina' => $this->input->post('pembina'),
			'pendidikan' => $this->input->post('pendidikan'),
			'catatan' => $this->input->post('catatan'),
		);

		$this->db->where('id', $idkader);
		$this->db->update('kader', $data);
	}

	public function jumlahKader($dpra, $dpc)
	{   
		$this->db->select('*');
		$this->db->from('kader');
		$this->db->where('dpra_id', $dpra);
		$this->db->where('dpc_id', $dpc);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			return $query->num_rows();
		}
		else
		{
			return 0;
		}
	}
}

// $no_anggota = $this->input->post('no_anggota'),
// 		$nama_kader = $this->input->post('nama_kader'),
// 		$nik_kader = $this->input->post('nik_kader'),
// 		$no_hp_kader = $this->input->post('no_hp_kader'),
// 		$email = $this->input->post('email'),
// 		$alamat = $this->input->post('alamat'),
// 		$pendidikan = $this->input->post('pendidikan'),
// 		$catatan = $this->input->post('catatan'),

//     	$query = "UPDATE kader SET no_anggota = $no_anggota, nama = $nama_kader, nik = $nik_kader, no_hp = $no_hp_kader, email = $email, alamat = $alamat, pendidikan = $pendidikan, catatan = $catatan WHERE id = $idkader";
//     	return $this->db->query($query)->result_array();
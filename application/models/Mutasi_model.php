<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mutasi_model extends CI_Model
{

	public function getAllDataMutasi(){
		$query = "SELECT mutasi.*, kader.id, kader.nama, dpc.id, dpc.nama_dpc, dpra.id, dpra.nama_dpra FROM mutasi 
		INNER JOIN kader on kader.id = mutasi.id_kader
		INNER JOIN dpra on dpra.id = mutasi.dpra
		INNER JOIN dpc on dpc.id = mutasi.dpc";
		return $this->db->query($query)->result_array();
	}

	public function getAllDataMutasiByDpc($dpc){
		$query = "SELECT mutasi.*, kader.id, kader.nama, dpc.id, dpc.nama_dpc, dpra.id, dpra.nama_dpra FROM mutasi 
		INNER JOIN kader on kader.id = mutasi.id_kader
		INNER JOIN dpra on dpra.id = mutasi.dpra
		INNER JOIN dpc on dpc.id = mutasi.dpc WHERE mutasi.dpc = '$dpc'";
		return $this->db->query($query)->result_array();
	}

	public function getDataMutasiById($id){
		$query = "SELECT mutasi.*, kader.*, dpc.id, dpc.nama_dpc, dpra.id, dpra.nama_dpra FROM mutasi 
		INNER JOIN kader on kader.id = mutasi.id_kader
		INNER JOIN dpra on dpra.id = mutasi.dpra
		INNER JOIN dpc on dpc.id = mutasi.dpc WHERE mutasi.id_mutasi = '$id'";
		return $this->db->query($query)->row_array();
	}

	public function getDataMutasi($id){
		$query = "SELECT mutasi.*, dpc.id, dpc.nama_dpc, dpra.id, dpra.nama_dpra FROM mutasi 
		INNER JOIN dpra on dpra.id = mutasi.dpra
		INNER JOIN dpc on dpc.id = mutasi.dpc WHERE mutasi.id_mutasi = '$id'";
		return $this->db->query($query)->row_array();
	}

	public function updateMutasi($idmutasi){
		$dataa = array(
			'id_kader' => $idkader,
			'jenis_mutasi' => $jenis,
			'dpc' => $inputdpc,
			'dpra' => $inputdpra,
			'catatan' => $catatan,
			'file' => $this->fungsiUploadFile('file'),
			'persetujuan' => 0,
			'tanggal_mutasi' => date('Y-m-d H:i:s'),
		);

		$this->db->where('id_mutasi', $idmutasi);
		$this->db->update('mutasi', $data);
	}

	public function getdpc($searchTerm = "")
	{        
		$this->db->select('id, nama_dpc');
		$this->db->where("nama_dpc like '%" . $searchTerm . "%' ");
		$this->db->order_by('id', 'asc');
		$fetched_records = $this->db->get('dpc');
		$dpc = $fetched_records->result_array();
		$data = array();
		foreach ($dpc as $dc) {
			$data[] = array("id" => $dc['id'], "text" => $dc['nama_dpc']);
		}
		return $data;
	}

	public function getdpra($iddpc, $searchTerm = "")
	{        
		$this->db->select('id, nama_dpra');
		$this->db->where('dpc_id', $iddpc);
		$this->db->where("nama_dpra like '%" . $searchTerm . "%' ");    
		$this->db->order_by('id', 'asc');
		$fetched_records = $this->db->get('dpra');
		$dpra = $fetched_records->result_array();

		$data = array();
		foreach ($dpra as $da) {
			$data[] = array("id" => $da['id'], "text" => $da['nama_dpra']);
		}
		return $data;
	}
}
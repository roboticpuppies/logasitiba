<?php

Class Db_query extends CI_Model {
	public function getData($tabel){
		$query = $this->db->get($tabel);
		return $query->result_array();
	}
	public function insertData($tabel, $data){
		return $this->db->insert($tabel, $data);
	}
}
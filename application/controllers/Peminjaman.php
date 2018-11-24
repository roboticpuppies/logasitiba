<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {
	public function index(){
		$this->db->select('
			member.id,
			member.nama,
			barang.nama_barang,
			peminjaman.quantity,
			peminjaman.tgl_pinjam
			');
		$this->db->from('peminjaman');
		$this->db->join('barang', 'peminjaman.id_barang = barang.id');
		$this->db->join('member', 'peminjaman.id_member = member.id');
		
		$query = $this->db->get();
		$data['page_title'] = "Daftar Peminjaman";
		$data['inventory'] = $query->result_array();
		
		$this->load->view('peminjaman/header', $data);
		$this->load->view('peminjaman/index');
		$this->load->view('peminjaman/footer');

		// Now playing : TWICE - Don't Give Up
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {
	public function index(){
		$this->db->select('
			member.id,
			member.nama,
			barang.nama_barang,
			peminjaman.id,
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
	public function kembalikan()
	{
		$id = $this->uri->segment(3);
		// $query = $this->db->get_where('peminjaman', array('id' => $id));
		$logger = $this->db->query("INSERT INTO log_peminjaman (id,id_member,id_barang,tgl_pinjam,quantity,id_user) SELECT id,id_member,id_barang,tgl_pinjam,quantity,id_user FROM peminjaman WHERE id = $id");
		$delete_record = $this->db->delete('peminjaman', array('id' => $id));
		redirect('peminjaman','refresh');
	}
}
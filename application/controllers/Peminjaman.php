<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller {
	public function index(){
		$this->load->helper('url');
		$this->db->select('
			member.id as member_id,
			member.nama,
			barang.nama_barang,
			barang.id as barang_id,
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
		$id = $this->input->post('id_peminjaman');
		$id_member = $this->input->post('id_member');
		$id_barang = $this->input->post('id_barang');
		
		$logger = $this->db->query("INSERT INTO log_peminjaman (id,id_member,id_barang,tgl_pinjam,quantity,id_user) SELECT id,id_member,id_barang,tgl_pinjam,quantity,id_user FROM peminjaman WHERE id = $id");
		echo "Query logger = " . $this->db->last_query();
		
		$add_quantity = $this->db->query("UPDATE stock INNER JOIN peminjaman ON peminjaman.id_barang = stock.id_barang SET stock.quantity = stock.quantity + peminjaman.quantity WHERE peminjaman.id_member = $id_member AND stock.id_barang = $id_barang");
		echo "Query Add quantity = " . $this->db->last_query();
		
		$delete_record = $this->db->delete('peminjaman', array('id' => $id));
		echo "Delete Record = " . $this->db->last_query();
	}

	public function log()
	{
		$this->db->select('
			member.id,
			member.nama,
			barang.nama_barang,
			log_peminjaman.id,
			log_peminjaman.quantity,
			log_peminjaman.tgl_pinjam,
			log_peminjaman.tgl_kembali
			');
		$this->db->from('log_peminjaman');
		$this->db->join('barang', 'log_peminjaman.id_barang = barang.id');
		$this->db->join('member', 'log_peminjaman.id_member = member.id');
		
		$query = $this->db->get();
		$data['page_title'] = "Daftar Log Peminjaman";
		$data['inventory'] = $query->result_array();
		
		$this->load->view('peminjaman/header', $data);
		$this->load->view('peminjaman/log');
		$this->load->view('peminjaman/footer');
	}
}
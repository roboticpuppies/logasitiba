<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
	public function index(){
		$data['page_title'] = 'Peminjaman';
		$this->db->select('
			barang.id,
			barang.kode_barang,
			barang.nama_barang,
			stock.initial_quantity,
			stock.quantity,
			tipe_barang.tipe_barang,
			kondisi_barang.kondisi_barang
			');
		$this->db->from('barang');
		$this->db->join('stock', 'barang.id = stock.id_barang');
		$this->db->join('tipe_barang', 'barang.tipe_barang = tipe_barang.id');
		$this->db->join('kondisi_barang', 'barang.kondisi_barang = kondisi_barang.id');
		$query = $this->db->get();
		$data['inventory'] = $query->result_array();
		// var_dump($data);

		$this->load->view('member/index', $data);
	}

	public function pinjam()
	{
		$data['id_member'] = $this->session->userdata['user_id'];
		$data['id_barang'] = $this->input->post('id');
		$data['quantity'] = $this->input->post('jml-brg');

		$this->db->insert('peminjaman', $data);

		$this->db->set('quantity', 'quantity - ' . $data['quantity'] , FALSE);
		$this->db->where('id_barang', $data['id_barang']);
		$this->db->update('stock');
		echo $this->db->last_query();
	}
}
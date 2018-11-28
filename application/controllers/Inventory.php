<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {
	public function check_privilege()
	{
		if($this->session->userdata('logged_in')) {
			if($this->session->userdata['role'] == 1 || $this->session->userdata['role'] == 2){
				return true;
			}
			else {
				redirect('/','refresh');
			}
		}
		else {
			redirect('auth/','refresh');
		}
	}
	public function index(){
		if ($this->check_privilege() == true) {
			$data['page_title'] = 'Manajemen Barang';
			$this->db->select('
				barang.id,
				barang.kode_barang,
				barang.nama_barang,
				barang.keterangan_barang,
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

			$this->load->view('admin/header', $data);
			$this->load->view('inventory/index');
			$this->load->view('inventory/footer');
		}
	}

	public function add()
	{
		if ($this->check_privilege() == true) {
			$data['page_title'] = 'Tambah Barang';
			$data['users'] = $this->db_query->getData('users');

			$this->load->view('admin/header', $data);
			$this->load->view('inventory/TambahBarang');
			$this->load->view('inventory/footer');
		}
	}
	public function submitbrg()
	{
		if ($this->check_privilege() == true) {
			$barang['kode_barang'] = $this->input->post('kode-brg');
			$barang['nama_barang'] = $this->input->post('nama-brg');
			$barang['tipe_barang'] = $this->input->post('tipe-brg');
			$barang['jumlah_barang'] = $this->input->post('jml-brg');
			$barang['kondisi_barang'] = $this->input->post('kondisi-brg');

			$id_barang = $this->db_query->insertData('barang', $barang);

			$stock['id_barang'] = $id_barang;
			$stock['initial_quantity'] = $this->input->post('jml-brg');
			$stock['quantity'] = $this->input->post('jml-brg');
			$this->db_query->insertData('stock', $stock);
			redirect('inventory/','refresh');
		}
	}

	public function deletebrg(){
		if ($this->check_privilege() == true) {
			$param = $this->uri->segment(3);

			$this->db->query('DELETE barang,stock FROM barang,stock WHERE barang.id=stock.id_barang AND barang.id=' . $param);
		}
	}

	public function editbrg()
	{
		if ($this->check_privilege() == true) {
			$this->load->view('admin/header');
			$this->load->view('inventory/EditBarang');
			$this->load->view('inventory/footer');
		}
	}


	public function subeditbrg()
	{
		if ($this->check_privilege() == true) {
			$param = $this->input->post('id');
			$barang['kode_barang'] = $this->input->post('kode-brg');
			$barang['nama_barang'] = $this->input->post('nama-brg');
			$barang['tipe_barang'] = $this->input->post('tipe-brg');
			$barang['jumlah_barang'] = $this->input->post('jml-brg');
			$barang['kondisi_barang'] = $this->input->post('kondisi-brg');

			$this->db->update('barang', $barang, array('id' => $param));
			redirect('inventory/','refresh');
		}
	}

}
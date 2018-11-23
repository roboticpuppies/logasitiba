<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {
	public function check_privilege()
	{
		if($this->session->userdata('logged_in')) {
			if($this->session->userdata['role'] == 1){
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

			$this->load->view('inventory/header', $data);
			$this->load->view('inventory/index');
			$this->load->view('inventory/footer');
		}
	}

	public function add()
	{
		if ($this->check_privilege() == true) {
			$data['page_title'] = 'Manajemen User';
			$data['users'] = $this->db_query->getData('users');

			$this->load->view('inventory/header', $data);
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
			$this->db_query->insertData('stock', $stock);

			// $data['user_rname'] = $this->input->post('nama');
			// $data['user_login'] = $this->input->post('username');
			// $data['user_email'] = $this->input->post('email');
			// $data['user_pass'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			// $data['user_role'] = '2';
			// $this->db_query->insertData('users', $data);
			// redirect('admin/users','refresh');
		}
	}

	public function deleteUser(){
		if ($this->check_privilege() == true) {
			$param = $this->uri->segment(3);
			$tabel = 'users';
			$where = 'ID';
			$this->db_query->delete($tabel, $where, $param);
		}
	}

	public function preview()
	{
		if ($this->check_privilege() == true) {
			$param = $_GET['id'];
			$query = $this->db->get_where('users', array('ID' => $param));
			$response = $query->result_array();
			echo json_encode($response);
		}
	}

	public function edituser(){
		if ($this->check_privilege() == true) {
			$param = $this->input->post('user_id2');
			if ($this->input->post('password2') == '') {
				$data['user_rname'] = $this->input->post('nama2');
				$data['user_login'] = $this->input->post('username2');
				$data['user_email'] = $this->input->post('email2');
			}
			else {
				$data['user_rname'] = $this->input->post('nama2');
				$data['user_login'] = $this->input->post('username2');
				$data['user_email'] = $this->input->post('email2');
				$data['user_pass'] = $this->input->post('password2');
			}

			$this->db->update('users', $data, array('ID' => $param));

			redirect('admin/users/' ,'refresh');
		}
	}

}
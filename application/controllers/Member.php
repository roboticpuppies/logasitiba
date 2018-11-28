<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
	public function check_privilege()
	{
		if($this->session->userdata('logged_in')) {
			if($this->session->userdata['role'] == 3){
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

			$this->load->view('member/header', $data);
			$this->load->view('member/index');
			$this->load->view('member/footer');
		}
	}

	public function pinjam()
	{
		if ($this->check_privilege() == true) {
			$data['id_member'] = $this->session->userdata['user_id'];
			$data['id_barang'] = $this->input->post('id');
			$data['quantity'] = $this->input->post('jml_brg');

			$this->db->insert('peminjaman', $data);

			$this->db->set('quantity', 'quantity - ' . $data['quantity'] , FALSE);
			$this->db->where('id_barang', $data['id_barang']);
			$this->db->update('stock');
		}
	}

	public function waiting()
	{
		if ($this->check_privilege() == true) {
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
			$this->db->where('approved', 0);
			$this->db->where('id_member', $this->session->userdata['user_id']);

			$query = $this->db->get();
			$data['page_title'] = "Daftar Waiting Approval";
			$data['subtitle'] = "Daftar barang yang menunggu disetujui untuk dipinjam.";
			$data['inventory'] = $query->result_array();

			$this->load->view('member/header', $data);
			$this->load->view('member/approval');
			$this->load->view('member/footer');
		}
	}
	public function listbrg()
	{
		if ($this->check_privilege() == true) {
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
			$this->db->where('approved', 1);
			$this->db->where('id_member', $this->session->userdata['user_id']);

			$query = $this->db->get();
			$data['page_title'] = "Daftar Barang yang Dipinjam";
			$data['subtitle'] = "Daftar semua barang yang saat ini sedang dipinjam.";
			$data['inventory'] = $query->result_array();

			$this->load->view('member/header', $data);
			$this->load->view('member/approval');
			$this->load->view('member/footer');
		}
	}

	public function rejected()
	{
		if ($this->check_privilege() == true) {
			$id_member = $this->session->userdata['user_id'];
			$this->db->select('
				member.id,
				member.nama,
				barang.nama_barang,
				log_reject.id,
				log_reject.quantity,
				log_reject.tgl_pinjam,
				log_reject.tgl_kembali
				');
			$this->db->from('log_reject');
			$this->db->join('barang', 'log_reject.id_barang = barang.id');
			$this->db->join('member', 'log_reject.id_member = member.id');
			$this->db->where('log_reject.id_member', $id_member);		

			$query = $this->db->get();
			$data['page_title'] = "Daftar Peminjaman yang Ditolak";
			$data['subtitle'] = "Daftar peminjaman yang tidak disetujui.";
			$data['inventory'] = $query->result_array();

			$this->load->view('member/header', $data);
			$this->load->view('member/approval');
			$this->load->view('member/footer');
		}
	}
}
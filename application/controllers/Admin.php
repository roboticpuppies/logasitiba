<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
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
			$data['page_title'] = 'Dashboard';
			$this->load->view('admin/header', $data);
			$this->load->view('admin/index');
			$this->load->view('admin/footer');
		}
	}

	public function users()
	{
		if ($this->check_privilege() == true) {
			$data['page_title'] = 'Manajemen User';
			$data['users'] = $this->db_query->getData('users');

			$this->load->view('admin/header', $data);
			$this->load->view('admin/users');
			$this->load->view('admin/footer');
		}
	}
	public function adduser()
	{
		if ($this->check_privilege() == true) {
			$data['user_rname'] = $this->input->post('nama');
			$data['user_login'] = $this->input->post('username');
			$data['user_email'] = $this->input->post('email');
			$data['user_pass'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			$data['user_role'] = '2';
			$this->db_query->insertData('users', $data);
			redirect('admin/users','refresh');
		}
	}

	public function deleteUser(){
		$param = $this->uri->segment(3);
		$tabel = 'users';
		$where = 'ID';
		$this->db_query->delete($tabel, $where, $param);
	}

	public function preview()
	{
		$param = $_GET['id'];
		$query = $this->db->get_where('users', array('ID' => $param));
		$response = $query->result_array();
		echo json_encode($response);
	}

	public function edituser(){
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
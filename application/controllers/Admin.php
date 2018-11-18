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
		}
	}
}
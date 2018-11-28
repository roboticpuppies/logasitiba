<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laboran extends CI_Controller {
	public function check_privilege()
	{
		if($this->session->userdata('logged_in')) {
			if($this->session->userdata['role'] == 2){
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

	public function index()
	{
		if ($this->check_privilege() == true) {
			$data['page_title'] = 'Dashboard';
			$this->load->view('admin/header', $data);
			$this->load->view('admin/footer');
		}
	}
}
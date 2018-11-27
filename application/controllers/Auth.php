<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function index(){
		if($this->session->userdata('logged_in')) {
			switch ($this->session->userdata('role')) {
				case '1':
				redirect('admin/','refresh');
				break;

				case '2':
				redirect('laboran/','refresh');
				break;

				case '3':
				redirect('member/','refresh');
				break;

				default:
				echo "Error";
				break;
			}
		}
		else{
			$this->load->view('login/login');
		}
	}

	public function login_adm()
	{
		$user_login = $this->input->post('username');
		$user_pass = $this->input->post('password');

		$this->db->from('users');
		$this->db->where('user_login', $user_login);
		$result = $this->db->get()->row();

		if (count($result) < 1) {
			$this->session->set_flashdata( 'message', 'Username tidak terdaftar.' );
			redirect('auth/','refresh');
		}
		else {
			if (password_verify($user_pass,$result->user_pass)) {
				$sess_data = array(
					'logged_in' => TRUE,
					'user_id'	=> $result->ID,
					'username' 	=> $result->user_login,
					'role'		=> $result->user_role
				);
				$this->session->set_userdata($sess_data);

				switch ($result->user_role) {
					case '1':
					redirect('admin/','refresh');
					break;

					case '2':
					redirect('laboran/','refresh');
					break;

					default:
					echo "Error";
					break;
				}
			}
			else {
				$this->session->set_flashdata( 'message', 'Password salah.' );
				redirect('auth/','refresh');
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/','refresh');
	}

	public function login_member()
	{
		$user_login = $this->input->post('username_member');
		$user_pass = $this->input->post('password_member');

		$this->db->from('member');
		$this->db->where('username', $user_login);
		$result = $this->db->get()->row();

		if (count($result) < 1) {
			$this->session->set_flashdata( 'message', 'Username tidak terdaftar.' );
			redirect('auth/','refresh');
		}
		else {
			if (password_verify($user_pass,$result->password)) {
				$sess_data = array(
					'logged_in' => TRUE,
					'user_id'	=> $result->id,
					'username' 	=> $result->username,
					'role'		=> '3'
				);
				$this->session->set_userdata($sess_data);
				redirect('member/','refresh');
			}
			else {
				$this->session->set_flashdata( 'message', 'Password salah.' );
				redirect('auth/','refresh');
			}
		}
	}
}
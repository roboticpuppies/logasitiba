<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laboran extends CI_Controller {
	public function index(){
		print_r($this->session->userdata());
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {


	public function __construct() { 
		parent::__construct();
		if($this->session->userdata('username') == null) { 
			redirect('home');
		}     

	}

	public function index() {   


		$data['main_content'] = 'admin_view';
		$this->load->view('admin_template/admin_content', $data);        
	}      


}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('Useful.php'); 
class Process extends CI_Controller {

	public $useful;
	
	public function __construct() {
		parent::__construct();  
		$this->useful = new Useful();  
	}

	public function process_login() {
		
		$data = array();

		$username = trim($this->input->post('username'));     
		$password = trim(md5($this->input->post('password')));  
		$role = trim(strtolower($this->input->post('role')));      


		$check_user= $this->auth_model->check_user($username, $password, $role);  
		if($check_user != null) { 
			
			$account_data = $check_user[0];
			$this->session->set_userdata($account_data);        
			$data['status'] = true;  
			$data['redirect'] = base_url() . "index.php/admin";

		} else { 
			$data['status'] = false; 
		}   

		echo json_encode($data);
	}      


	public function logout() { 
		$this->session->sess_destroy();    
		redirect('home');
	}

}

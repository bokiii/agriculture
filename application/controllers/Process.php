<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('Useful.php'); 
class Process extends CI_Controller {

	public $useful;
	
	public function __construct() {
		parent::__construct();  
		$this->useful = new Useful();  
	} // end 

	public function process_login() {
		$data = array();
		
		$username = trim($this->input->post('username'));     
		$password = trim(md5($this->input->post('password')));  
		$role = trim(strtolower($this->input->post('role')));        

		if($role == "admin") { 
			$check_user= $this->auth_model->check_user($username, $password, $role);  
			if($check_user != null) { 
				$account_data = $check_user[0];
				$this->session->set_userdata($account_data);            
				$data['status'] = true;  
				$data['redirect'] = base_url() . "index.php/admin";

			} else { 
				$data['status'] = false; 
			}   
		} else { 
			$check_user= $this->auth_model->check_user($username, $password, $role);  
			if($check_user != null) { 
				$account_data = $check_user[0];   
  
				$get_user_priveleges = $this->auth_model->get_user_priveleges($account_data['id']);  
				$account_data['user_priveleges'] = $get_user_priveleges[0];  
				 
				$this->session->set_userdata($account_data);            
				$data['status'] = true;  
				$data['redirect'] = base_url() . "index.php/admin";

			} else { 
				$data['status'] = false; 
			}   
		}

		echo json_encode($data);
	} // end       

	public function logout() { 
		$this->session->sess_destroy();    
		redirect('home');
	} // end     
   
	public function view_session() { 
		$this->useful->debug($this->session->userdata);
	} //   

}

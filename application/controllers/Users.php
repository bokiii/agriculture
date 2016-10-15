<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('Useful.php');
class Users extends CI_Controller {    

	public $useful;
	
	public function __construct() {
		parent::__construct();  
		$this->useful = new Useful();  
		if($this->session->userdata('username') == null) { 
			redirect('home');
		}     

	}

	public function index() {
		$data['main_content'] = 'user_view';
		$this->load->view('admin_template/admin_content', $data);          
	}          

	public function add_user() { 

		$data = array();
		
		$userData = array( 
			"username" => trim($this->input->post('username')), 
			"password" => trim(md5($this->input->post("password"))), 
			"role" => "user"
		);           

		$insert_user = $this->user_model->insert_user($userData);  

		if($insert_user) { 
			$inserted_id = $this->db->insert_id();
		
			if(!$this->input->post('can_add')) { 
				$can_add = 0;
			} else { 
				$can_add = 1;
			}    

			if(!$this->input->post('can_edit')) { 
				$can_edit = 0;
			} else { 
				$can_edit = 1;
			}     

			if(!$this->input->post('can_delete')) { 
				$can_delete = 0;
			} else { 
				$can_delete = 1;
			}     

			$userPrivelegesData = array( 
				"can_add" => $can_add, 
				"can_edit" => $can_edit, 
				"can_delete" => $can_delete, 
				"user_id" => $inserted_id
			);           

			$add_user_priveleges = $this->user_model->add_user_priveleges($userPrivelegesData);   
			
			if($add_user_priveleges) { 
				$data['status'] = true;  
				$data['message'] = "Added Successfully";
			} else { 
				$data['status'] = false;  
				$data['message'] = "Sucess adding user but failed adding priveleges.";
			}

		} else { 
			$data['status'] = false;   
			$data['message'] = "Username already exists"; 
		}    

		echo json_encode($data);   


	}  // end add user 



} // end main class
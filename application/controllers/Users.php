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
	} // end 

	public function index() {
		$data['main_content'] = 'user_view';
		$this->load->view('admin_template/admin_content', $data);     
	} // end           

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

	public function get_users() { 
		$data = array();

		$get_users = $this->user_model->get_users();  
		$data['users'] = $get_users;   

		echo json_encode($data);
	}  // end  

	public function get_user_by_id() { 
		$data = array();

		$id = $this->input->get('id');  
		$get_user_by_id = $this->user_model->get_user_by_id($id);

		$data['user'] = $get_user_by_id; 

		echo json_encode($data);
	} // end 

	public function delete_user() {   
		$data = array();    
		$ids = $this->input->post('user_id');

		$delete_users = $this->user_model->delete_users($ids);   

		if($delete_users) { 
			$data['status'] = true;
		} else { 
			$data['status'] = false;
		}  

		echo json_encode($data);
	} // end   

	public function update_user() { 

		$data = array();

		$userData = array(  
			"username" => $this->input->post('username')
		);   

		// below for password
		if($this->input->post('password') == "") { 
			$userData["password"] = "";
		} else { 
			$userData["password"] = trim(md5($this->input->post("password")));
		}   

		// below for can add 
		if($this->input->post("can_add")) { 
			$userData["can_add"] = 1;
		} else { 
			$userData["can_add"] = 0;
		}     

		// below for can edit
		if($this->input->post("can_edit")) { 
			$userData["can_edit"] = 1;
		} else { 
			$userData["can_edit"] = 0;
		}    

		// below for can delete  
		if($this->input->post("can_delete")) { 
			$userData["can_delete"] = 1;
		} else { 
			$userData["can_delete"] = 0;
		}        

		$userData['id'] = $this->input->post('user_update_id');

		$update_user_by_id = $this->user_model->update_user_by_id($userData);    

		if($update_user_by_id) { 
			$data['status'] = true;  
			$data['message'] = "Updated";
		} else { 
			$data['status'] = false;  
			$data['message'] = "Username Already Exists";
		}  

		echo json_encode($data);    


	} // end 



} // end main class
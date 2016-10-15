<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {      

	function __construct() {
		parent::__construct();
	}      
	
	function insert_user($data) {
	
		$username = $data['username']; 

		$check_user = $this->check_user($username);   

		if($check_user == 0) { 
			$query = $this->db->insert("users", $data);   
		
			if($query) { 
				return true;
			} else { 
				return false;
			}
		} else { 
			return false;
		}

	}      

	function check_user($username) { 
		$this->db->select("*");    
		$this->db->where('username', $username);  
		$this->db->from('users');  
		
		return $this->db->count_all_results();   
	}   

	function add_user_priveleges($data) { 
		$query = $this->db->insert('user_priveleges', $data);     
		if($query) { 
			return true;
		} else { 
			return false;
		}
	}


} // end class 
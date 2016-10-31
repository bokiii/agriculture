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
	} // end      

	function check_user($username) { 
		$this->db->select("*");    
		$this->db->where('username', $username);  
		$this->db->from('users');  
		
		return $this->db->count_all_results();   
	} // end    

	function add_user_priveleges($data) { 
		$query = $this->db->insert('user_priveleges', $data);     
		if($query) { 
			return true;
		} else { 
			return false;
		}
	} // end     

	function get_users() {    
		$this->db->select('users.id, users.username, users.password, users.role, user_priveleges.can_add, user_priveleges.can_edit, user_priveleges.can_delete');                                                                         
		$this->db->from('users');  
		$this->db->join('user_priveleges', 'user_priveleges.user_id = users.id', 'left');     
		$this->db->where("users.role", "user");  
		$query = $this->db->get();     

		return $query->result();
	} // end      

	function get_user_by_id($id) {    
		$this->db->select('users.id, users.username, users.password, users.role, user_priveleges.can_add, user_priveleges.can_edit, user_priveleges.can_delete');                                                                         
		$this->db->from('users');  
		$this->db->join('user_priveleges', 'user_priveleges.user_id = users.id', 'left');     
		$this->db->where("users.id", $id);  
		$query = $this->db->get();     

		return $query->result();
	} // end  

	function delete_users($ids) { 

		$this->db->where_in('id', $ids);
		$query = $this->db->delete('users');  

		if($query) { 
			return true;
		} else { 
			return false;
		}
	} // end        

	function check_user_for_update($username, $id) { 

		$this->db->select("*");      
		
		$this->db->where('username', $username);    
		$this->db->from('users');    
		$query = $this->db->get();    
		$query_result = $query->result();  

		if($query_result != null) { 
			foreach($query_result as $row) { 
				if($row->id == $id) { 
					return 0;
				} else { 
					return 1;
				}
			}
		} else { 
			return 0;
		}
	
		
		
	} //

	function update_user_by_id($data) { 

		$query;

		if($data['password'] == "") { 
			
			

			$check_user_for_update = $this->check_user_for_update($data['username'], $data['id']);  

			if($check_user_for_update == 0) {     
				$this->db->set('username', $data['username']);    
				$this->db->where('id', $data['id']);     
				$this->db->update('users');  
				$query = true;
			} else { 
				$query = false;
			}
			
		} else {   
			
			$check_user_for_update = $this->check_user_for_update($data['username'], $data['id']);  

			if($check_user_for_update == 0) {     
				$this->db->set('username', $data['username']);      
				$this->db->set('password', $data['password']); 
				$this->db->where('id', $data['id']);     
				$this->db->update('users');   
				
				$query = true;
			} else { 
				$query = false;
			}

		} // end sub if else     

		if($query) {  
			$this->db->set('can_add', $data['can_add']);    
			$this->db->set('can_edit', $data['can_edit']);   
			$this->db->set('can_delete', $data['can_delete']);   
			$this->db->where('user_id', $data['id']);    
			$this->db->update('user_priveleges');       

			return true;  

		} else { 
			return false;
		}       
		
	} // end 


} // end class 
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model {      

	function __construct() {
		parent::__construct();
	}      
	
	function check_user($username, $password, $role) {
	
		$this->db->where("username", $username);   
		$this->db->where("password", $password);     
		$this->db->where("role", $role);    
		
		$query = $this->db->get("users");   
		return $query->result_array();
	}      

	function get_user_priveleges($user_id) {
		$this->db->select("can_add, can_edit, can_delete");
		$this->db->where("user_id", $user_id);  
		$query = $this->db->get("user_priveleges");

		return $query->result_array();
	}
	
}
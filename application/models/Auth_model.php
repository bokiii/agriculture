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
	
	
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_inventory_model extends CI_Model {   

	function __construct() {
		parent::__construct();
	}      
	
	function insert_data_personal_detail($data) {
	
		$query = $this->db->insert("data_personal_details", $data);   
	
		if($query) { 
			return true;
		} else { 
			return false;
		}
		
	} // end         

	public function insert_data_assets($data) { 

		$query = $this->db->insert("data_assets", $data);      
		if($query) { 
			return true;
		} else { 
			return false;
		}	
	}


} // end class 
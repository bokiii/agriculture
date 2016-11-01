<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_inventory_model extends CI_Model {   

	function __construct() {
		parent::__construct();
	} // end      
	
	function insert_data_personal_detail($data) {
	
		$query = $this->db->insert("data_personal_details", $data);   
	
		if($query) { 
			return true;
		} else { 
			return false;
		}
	} // end         

	function insert_data_assets($data) { 

		$query = $this->db->insert("data_assets", $data);      
		if($query) { 
			return true;
		} else { 
			return false;
		}	
	} // end    

	function get_data() { 
		$this->db->select("*");  
		$this->db->from("data_personal_details");    

		$query = $this->db->get();  
		return $query->result_array();
	} // end            

	function get_data_by_id($id) { 
		$this->db->where("id", $id);  
		$query = $this->db->get("data_personal_details");   

		return $query->result_array();
	} // end 

	function get_data_assets_by_data_personal_detail_id($id) { 
		$this->db->where("data_personal_detail_id", $id);   
		$query = $this->db->get("data_assets");   
		return $query->result_array();
	} // end        

	function get_data_asset_by_id($id) { 
		$this->db->where("id", $id);   
		$query = $this->db->get("data_assets");   
		return $query->result_array();
	} // end 

	function delete_data_by_ids($ids) { 
		$this->db->where_in('id', $ids);  
		$query = $this->db->delete("data_personal_details");       
		if($query) { 
			return true;
		} else { 
			return false;
		}
	} // end    

	function add_data_asset($data) {
		$query = $this->db->insert("data_assets", $data);  
		if($query) { 
			return true;
		} else { 
			return false;
		}  
	} // end 

	function delete_data_asset($ids) { 
		$this->db->where_in('id', $ids);  
		$query = $this->db->delete("data_assets");  
		if($query) { 
			return true;
		} else { 
			return false; 
		}
	} // end    

	function update_data_asset($data) { 
		$this->db->set("asset", $data["asset"]);  
		$this->db->set("asset_description", $data["asset_description"]);    
		$this->db->where("id", $data["asset_id"]);   
		$query = $this->db->update("data_assets");      
		
		if($query) { 
			return true;
		} else { 
			return false;
		}

	} // end 


} // end class 
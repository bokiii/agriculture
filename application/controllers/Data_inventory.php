<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('Useful.php');
class Data_Inventory extends CI_Controller {    

	public $useful;     
	public function __construct() {
		parent::__construct();  
		$this->useful = new Useful();  
		if($this->session->userdata('username') == null) { 
			redirect('home');
		}     
	} // end   

	public function index() { 
		$data['main_content'] = 'data_inventory_view';
		$this->load->view('admin_template/admin_content', $data);     
	} // end   

	public function add_data() { 
		
		$data = array();
		
		$data_personal_details = array ( 
			"first_name" => trim($this->input->post("first_name")), 
			"middle_name" => trim($this->input->post("middle_name")),   
			"last_name" => trim($this->input->post("last_name")), 
			"address" => trim($this->input->post("address")), 
			"civil_status" => trim($this->input->post("civil_status")),   
			"gender" => trim($this->input->post("gender"))
		);    

		$insert_data_personal_detail = $this->data_inventory_model->insert_data_personal_detail($data_personal_details);                                               
		if($insert_data_personal_detail) { 
			$inserted_id = $this->db->insert_id();  
			$posted_assets = $this->input->post("asset");  
			$posted_asset_descriptions = $this->input->post("asset_description");

			for($i = 0; $i < count($posted_assets); $i++) { 
				$data_assets = array( 
					"asset" => $posted_assets[$i], 
					"asset_description" => $posted_asset_descriptions[$i],  
					"data_personal_detail_id" => $inserted_id
				);   

				$insert_data_assets = $this->data_inventory_model->insert_data_assets($data_assets);

			} // end for loop   

			$data["status"] = true;  
			$data["message"] = "Added";


		} else { 
			$data["status"] = false;  
			$data["message"] = "Add Failed";
		}  

		echo json_encode($data);
	} // end          

	public function get_data() { 
		$get_data = $this->data_inventory_model->get_data();    
		echo json_encode($get_data);
   	} // end    

   	public function get_data_by_id() { 

   		$id = $this->input->get("id");    
   		$get_data_by_id = $this->data_inventory_model->get_data_by_id($id);    
   		if($get_data_by_id != null) { 
   			$data['main_content'] = 'data_individual_inventory_view';
			$this->load->view('admin_template/admin_content', $data);  
   		}
   	} // end    

   	public function get_data_by_id_angular() { 
   		$id = $this->input->get("id");   

   		$get_data_by_id = $this->data_inventory_model->get_data_by_id($id);     

		$get_data_assets_by_data_personal_detail_id = $this->data_inventory_model->get_data_assets_by_data_personal_detail_id($get_data_by_id[0]["id"]);              	
		$get_data_by_id[0]["data_assets"] = $get_data_assets_by_data_personal_detail_id;
	
   		echo json_encode($get_data_by_id);   
   	} // end    

   	public function get_data_by_id_no_view() { 
   		$id = $this->input->get("id");   
   		$get_data_by_id = $this->data_inventory_model->get_data_by_id($id);      

   		echo json_encode($get_data_by_id);
   	} // end 

	public function delete_data() { 
	
		$data = array();

		$ids = $this->input->post("data_id");  

		$delete_data_by_ids = $this->data_inventory_model->delete_data_by_ids($ids);   

		if($delete_data_by_ids) { 
			$data["status"] = true;
		} else { 
			$data["status"] = false;
		}   

		echo json_encode($data);
	} // end    

	public function add_data_asset() { 
		$data = array();
		$asset_data =$this->input->post();        

		$add_data_asset = $this->data_inventory_model->add_data_asset($asset_data);   
		if($add_data_asset) { 
			$data['status'] = true;  
			$data['message'] = "Added";
		} else { 
			$data['status'] = false;  
			$data['message'] = "Failed";
		}   

		echo json_encode($data);
	} // end    

	public function delete_data_asset() { 
		
		$data = array();

		$ids = $this->input->post("asset_id");    
		$delete_data_asset = $this->data_inventory_model->delete_data_asset($ids);   
		
		if($delete_data_asset) { 
			$data["status"] = true;
		} else { 
			$data["status"] = false;
		}    

		echo json_encode($data);
	} // end         

	public function get_data_asset_by_id() { 
		$id = $this->input->get("id");      
		$get_data_asset_by_id = $this->data_inventory_model->get_data_asset_by_id($id);     
		
		echo json_encode($get_data_asset_by_id);
	} // end    

	public function update_data_asset() {   

		$data = array();

		$update_data = $this->input->post();  

		$update_data_asset = $this->data_inventory_model->update_data_asset($update_data);   

		if($update_data_asset) { 
			$data["status"] = true;
		} else { 
			$data["status"] = false;
		}   

		echo json_encode($data);
	} // end   

	public function update_data_personal_detail() { 

		$data = array();
		$update_data = $this->input->post();       

		$update_detail_personal_data = $this->data_inventory_model->update_detail_personal_data($update_data);  		

		if($update_detail_personal_data) { 
			$data['status'] = true;
		} else { 
			$data['status'] = false;
		}  

		echo json_encode($data);

	} // end 



} // end class    






























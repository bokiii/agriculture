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
		//$this->useful->debug($this->input->post());  

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


	}      





} // end class    






























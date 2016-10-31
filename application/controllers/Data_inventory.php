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

}
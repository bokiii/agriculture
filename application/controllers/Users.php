<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('Useful.php');
class Users extends CI_Controller {    

	public $useful;
	
	public function __construct() {
		parent::__construct();
		if($this->session->userdata('username') == null) { 
			redirect('home');
		}     

	}

	public function index() {
		$data['main_content'] = 'user_view';
		$this->load->view('admin_template/admin_content', $data);          


		
	}       

}
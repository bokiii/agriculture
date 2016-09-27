<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('Useful.php');
class Home extends CI_Controller {

	public $useful;
	
	public function __construct() {
		parent::__construct();  
		$this->useful = new Useful();  
		if($this->session->userdata('username') != null) { 
			redirect('admin');
		}     

	}

	public function index() {
		$data['main_content'] = 'login';
		$this->load->view('template/content', $data);      
	}       




}

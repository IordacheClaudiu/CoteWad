<?php
class Collab extends CI_Controller{
	 function __construct(){	
		parent::__construct();
		$this->is_loggedin();
	 }
	function editor_area(){
		$this->load->view('editor_area');
	}
	function is_loggedin(){
		$log_status=$this->session->userdata('is_logged_in');
		if(!isset($log_status) || $log_status!=TRUE){
			redirect('login');
		}
	}
}
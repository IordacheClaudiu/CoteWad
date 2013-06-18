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
	function createNewDocument(){
		$data['main_content_collab']='load_form';
		$this->load->view('includes/template_collab',$data);
	}
	function noLoad(){
		$data['main_content_collab']='no_load_form';
		$this->load->view('includes/template_collab',$data);
	}
	function signout(){
		$this->session->sess_destroy();
		redirect('login');
	}
	function addDocument(){
		$this->load->model('user_model');
		$insert= $this->user_model->insertIntoCouch($this->input->post('newDocument'));
		//redirect($this->input->post('newDocument'));
	}
}
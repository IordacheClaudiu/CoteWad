<?php
class Contact extends CI_Controller {
	public function index(){
		$data['main_content']='contact';
		$this->load->view('includes/template_welcome',$data);
	}
}
<?php
class Welcome extends CI_Controller {
	public function index(){
		$data['main_content']='welcome';
		$this->load->view('includes/template_welcome',$data);
	}
}
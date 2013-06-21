<?php
class Register extends CI_Controller {
	public function index(){
		$data['main_content']='signup_form';
		$this->load->view('includes/template_welcome',$data);
	}
	
	public function create_member(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','trim|required|min_length[6]');
		$this->form_validation->set_rules('email_adress','Email Adress','trim|required|valid_email');		
		$this->form_validation->set_rules('password','Password','trim|required|min_length[6]|max_length[32]');
	    $this->form_validation->set_rules('password2','Password','trim|required|matches[password]');
		if($this->form_validation->run() == FALSE){
				$this->index();
		}else{
			$this->load->model('user_model');
			if($query=$this->user_model->create_member()){
				$data['main_content']='signup_succesful';
				$this->load->view('includes/template_welcome',$data);
			}
			else{
				$this->index();
			}
		}
	}
	public function exists_email(){
		$this->load->model('user_model');
		echo $this->user_model->exists_email($this->input->post('email'));
	}
}
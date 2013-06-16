<?php
class Login extends CI_Controller{
	public function index()
	{
		
		$data['main_content']='login_form';
		$this->load->view('includes/template',$data);
	}
	public function validate_credentials(){
		
		$this->load->model('user_model');
		$query= $this->user_model->validate();
		
		//if this user exists in database
		if($query){
			$data= array(
				'username'=>$this->input->post('username'),
				'is_logged_in'=> TRUE
			);
			$this->session->set_userdata($data);
			redirect('collab/editor_area');
		}
		else{
			$this->index();
		}
	}
	
	public function signup(){
		$data['main_content']='signup_form';
		$this->load->view('includes/template',$data);
	}
	public function create_member(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name','First Name','trim|required');
		$this->form_validation->set_rules('last_name','Last Name','trim|required');
		$this->form_validation->set_rules('email_adress','Email Adress','trim|required|valid_email');
		
		$this->form_validation->set_rules('username','Username','trim|required|min_length[6]');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[6]|max_length[32]');
	    $this->form_validation->set_rules('password2','Password','trim|required|matches[password]');
		if($this->form_validation->run() == FALSE){
				$this->signup();
		}else{
			$this->load->model('user_model');
			if($query=$this->user_model->create_member()){
				$data['main_content']='signup_succesful';
				$this->load->view('includes/template',$data);
			}
			else{
				$this->signup();
			}
		}
	}
}

<?php
class Login extends CI_Controller{
	public function index()
	{
		$log_status=$this->session->userdata('is_logged_in');
		if($log_status == TRUE){
			redirect('index.php/collab/noLoad');
		}else{
		$data['main_content']='login_form';
		$this->load->view('includes/template_welcome',$data);
		}
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
			//$this->session->sess_expire_on_close = TRUE;
			redirect('index.php/collab/noLoad');
		}
		else{
			$this->index();
		}
	}
}

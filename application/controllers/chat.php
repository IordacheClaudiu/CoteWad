<?php

class Chat extends CI_Controller {

	function Chat() {
		parent::__construct();
	}

	function index() {
		$this -> view_data['page_title'] = 'Tutorial - Creating a web based chat app';
		$this -> view_data['page_content'] = 'view_chat';
		$this -> load -> view('view_main', $this -> view_data);
	}

}

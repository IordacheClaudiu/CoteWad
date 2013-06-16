<?php

class Chat extends CI_Controller {

	function Chat() {
		parent::__construct();
		$this -> load -> model('chat_model');
	}

	function index() {
		/* send in chat id user id
		 */

		$this -> view_data['chat_id'] = 'chat_id1';

		//check they are logged in

		if (!$this -> session -> userdata('is_logged_in')) {
			redirect('login');
		}

		$this -> view_data['user_id'] = $this -> session -> userdata('username');

		$this -> view_data['page_title'] = 'Tutorial - Creating a web based chat app';
		$this -> view_data['page_content'] = 'view_chat';
		$this -> load -> view('view_main', $this -> view_data);
	}

	function ajax_add_chat_message() {
		/*Things that needs to be POST'ed to this function
		 *
		 * chat_id
		 * user_id
		 * chat_message_content
		 *
		 */
		$chat_id = $this -> input -> post('chat_id');
		$user_id = $this -> input -> post('user_id');
		$chat_message_content = $this -> input -> post('chat_message_content', TRUE);

		$this -> chat_model -> add_chat_message($chat_id, $user_id, $chat_message_content);

		//grab and return all messages
	}

}

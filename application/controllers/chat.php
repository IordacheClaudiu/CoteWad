<?php

class Chat extends CI_Controller {

	function Chat() {
		parent::__construct();
		$this -> load -> database();
		$this -> load -> model('chat_model');
	}

	function index() {
		/* send in chat id user id
		 */
		$this -> view_data['chat_id'] = 1;

		//check they are logged in
		if (!$this -> session -> userdata('is_logged_in')) {
			redirect('login');
		}

		$query_str = "SELECT * FROM users where firstName=?";
		$result = $this -> db -> query($query_str, $this -> session -> userdata('username'));
		if ($result -> num_rows() == 1) {
			foreach ($result->result() as $user) {
				$this -> view_data['user_id'] = $user -> user_id;
			}
		}

		$this -> session -> set_userdata('last_chat_message_id_' . $this -> view_data['chat_id'], 0);

		$this -> view_data['page_title'] = 'Tutorial - Creating a web based chat app';
		$this -> view_data['page_content'] = 'view_chat';
		$this -> load -> view('view_main', $this -> view_data);
	}

	function ajax_add_chat_message() {
		$chat_id = $this -> input -> post('chat_id');
		$user_id = $this -> input -> post('user_id');
		$chat_message_content = $this -> input -> post('chat_message_content', TRUE);

		$this -> chat_model -> add_chat_message($chat_id, $user_id, $chat_message_content);
		echo $this -> _get_chat_messages($chat_id);
	}

	function ajax_get_chat_messages() {

		$chat_id = $this -> input -> post('chat_id');
		echo $this -> _get_chat_messages($chat_id);
	}

	function _get_chat_messages($chat_id) {
		$last_chat_message_id = (int)$this -> session -> userdata('last_chat_message_id_' . $chat_id);

		$chat_messages = $this -> chat_model -> get_chat_message($chat_id, $last_chat_message_id);
		if ($chat_messages -> num_rows() > 0) {

			$last_chat_message_id = $chat_messages -> row($chat_messages -> num_rows() - 1) -> chat_message_id;
			$this -> session -> set_userdata('last_chat_message_id_' . $chat_id, $last_chat_message_id);

			$chat_messages_html = '<ul>';
			foreach ($chat_messages->result() as $chat_message) {
				$query_str = "SELECT * FROM users where firstName=?";
				$result = $this -> db -> query($query_str, $this -> session -> userdata('username'));
				if ($result -> num_rows() == 1) {
					foreach ($result->result() as $user) {
						$li_class = ($user -> user_id == $chat_message -> user_id) ? 'class="by_current_user"' : '';
					}
				}

				$chat_messages_html .= '<li class="' . $li_class . '"><span class="chat_message_header">' . $chat_message -> chat_message_timestamp . ' by ' . $chat_message -> firstName . '</span><p class="message_content">' . $chat_message -> chat_message_content . '</p></li>';
			}

			$chat_messages_html .= '</ul>';

			$result = array('status' => 'ok', 'content' => $chat_messages_html);
			return json_encode($result);
			exit();
		} else {

			$result = array('status' => 'ok', 'content' => $chat_messages_html);
			return json_encode($result);
			exit();
		}
	}

}

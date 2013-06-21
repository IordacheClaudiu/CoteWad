<?php
class Collab extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this -> is_loggedin();
		$this -> load -> model('chat_model');
		$this -> load -> model('document_model');
		$this -> view_data['chat_id'] = 1;
		$this -> view_data['user_id'] = $this -> getUserID();
		$this -> session -> set_userdata('last_chat_message_id_' . $this -> view_data['chat_id'], 0);
	}

	function is_loggedin() {
		$log_status = $this -> session -> userdata('is_logged_in');
		if (!isset($log_status) || $log_status != TRUE) {
			redirect('index.php/login');
		}
	}

	function createNewDocument() {
		$this -> view_data['main_content_collab'] = 'load_form';
		$this -> view_data['page_content'] = 'view_chat';
		$this -> load -> view('includes/template_collab', $this -> view_data);
	}

	function noLoad() {
		$this -> view_data['main_content_collab'] = 'no_load_form';
		$this -> view_data['page_content'] = 'view_chat';
		$this -> load -> view('includes/template_collab', $this -> view_data);
	}

	function signout() {
		$this -> session -> sess_destroy();
		redirect('index.php/login');
	}

	function addDocument() {
		$this -> load -> model('user_model');
		$insert = $this -> user_model -> insertIntoCouch($this -> input -> post('newDocument'));
		//redirect($this->input->post('newDocument'));
	}

	function storeURL() {
		$this -> document_model -> insert($this -> input -> post('url'), $this -> input -> post('date'), $this -> input -> post('name'));
	}

	function ajax_get_documents() {
		$user_id = $this -> getUserID();
		$documents = $this -> document_model -> get_documents($user_id);
		if ($documents == 'Empty') {
			echo '<p> No documents created.</p>';
		} else if ($documents == 'Error') {
			echo '<p> No documents created.</p>';
		} else if (count($documents) > 0) {
			$documents_html = '<ul>';
			foreach ($documents as $document) {
				$documents_html .= '<li><a href="' . $document['id'] . '">' . $document['title'] . '--' . $document['date'] . '</a></li>';
			}

			$documents_html .= '</ul>';
			echo $documents_html;
		} else {
			echo '0';
		}
	}

	public function getUserID() {

		$query_str = "SELECT * FROM users where username=?";
		$result = $this -> db -> query($query_str, $this -> session -> userdata('username'));
		if ($result -> num_rows() == 1) {
			foreach ($result->result() as $user) {
				return $user -> user_id;
			}
		}
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
				$query_str = "SELECT * FROM users where username=?";
				$result = $this -> db -> query($query_str, $this -> session -> userdata('username'));
				if ($result -> num_rows() == 1) {
					foreach ($result->result() as $user) {
						$li_class = ($user -> user_id == $chat_message -> user_id) ? 'class="by_current_user"' : '';
					}
				}

				$chat_messages_html .= '<li ' . $li_class . '><span class="chat_message_header">' . $chat_message -> chat_message_timestamp . ' by ' . $chat_message -> username . '</span><p class="message_content">' . $chat_message -> chat_message_content . '</p></li>';
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

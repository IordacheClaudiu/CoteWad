<?php
require_once (APPPATH . 'libraries/couch.php');
require_once (APPPATH . 'libraries/couchClient.php');
require_once (APPPATH . 'libraries/couchDocument.php');
require_once (APPPATH . 'libraries/couchReplicator.php');
class Chat_model extends CI_Model {

	function Chat_model() {
		parent::__construct();
	}

	function add_chat_message($chat_id, $user_id, $chat_message_content) {
		$client = new couchClient("http://127.0.0.1:5984/", "chat_messages");

		$doc = new stdClass();
		$doc -> _id = 'soid';
		$doc -> create_date = 'azi';
		$doc -> chat_id = $chat_id;
		$doc -> user_id = $user_id;
		$doc -> chat_message_content = $chat_message_content;
		try {
			$client -> storeDoc($doc);
			return TRUE;
		} catch (Exception $e) {
			return FALSE;
		}

	}

}

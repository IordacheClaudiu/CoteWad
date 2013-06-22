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
		$query_str = "INSERT INTO chat_messages (chat_id,user_id,chat_message_content) VALUES (?,?,?)";
		$this -> db -> query($query_str, array($chat_id, $user_id, $chat_message_content));
	}

	function get_chat_message($chat_id, $last_chat_message_id = 0) {
		$query_str = " 	SELECT tab.chat_message_id, tab.user_id, tab.chat_message_content, tab.chat_message_timestamp, tab.username
						FROM 	(SELECT cm.chat_message_id, cm.user_id, cm.chat_message_content, DATE_FORMAT(cm.create_date, '%D of %M %Y at %H:%i:%s') AS chat_message_timestamp, u.username
								FROM chat_messages cm
								JOIN users u ON cm.user_id=u.user_id
								WHERE cm.chat_id = ? AND cm.chat_message_id > ?
								ORDER BY cm.chat_message_id DESC
								LIMIT 40) tab
						ORDER BY tab.chat_message_id ASC";
		$result = $this -> db -> query($query_str, array($chat_id,$last_chat_message_id));
		return $result;
	}

}

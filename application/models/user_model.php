<?php
require_once (APPPATH . 'libraries/couch.php');
require_once (APPPATH . 'libraries/couchClient.php');
require_once (APPPATH . 'libraries/couchDocument.php');
require_once (APPPATH . 'libraries/couchReplicator.php');
class User_model extends CI_Model {
	public function User_model() {
		parent::__construct();
	}

	public function getUserByUserName() {
		$query_str = "SELECT * FROM users where username=?";
		$result = $this -> db -> query($query_str, $this -> input -> post('username'));
		if ($result -> num_rows() == 1) {
			foreach ($result->result() as $user) {
				$this -> view_data['user_id'] = $user -> user_id;
			}
		}
	}

	public function exists($user) {
		$query = $this -> db -> get_where('users', array('username' => $user));
		foreach ($query->result() as $row) {
			return "TRUE";
		}
		return "FALSE";
	}

	public function exists_email($email) {
		$query = $this -> db -> get_where('users', array('email' => $email));
		foreach ($query->result() as $row) {
			return "TRUE";
		}
		return "FALSE";
	}

	public function validate() {
		$result = $this -> db -> get_where('users', array('username' => $this -> input -> post('username')));
		if ($result -> num_rows() == 1) {
			foreach ($result->result() as $user) {
				if (md5($this -> input -> post('password')) == $user -> password) {
					return TRUE;
				} else {
					return FALSE;
				}
			}
		} else {
			return FALSE;
		}
	}

	public function create_member() {
		$firstname = $this -> input -> post('username');
		$lastname = $this -> input -> post('last_name');
		$email = $this -> input -> post('email_adress');
		$password = md5($this -> input -> post('password'));
		$query_str = "INSERT INTO users (firstName,lastName,email,password) VALUES (?,?,?,?)";
		return $this -> db -> query($query_str, array($firstname, $lastname, $email, $password));
	}

	public function insertIntoCouch($document) {
		echo $document;
	}

}
?>
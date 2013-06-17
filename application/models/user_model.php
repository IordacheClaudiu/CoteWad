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
		$query_str = "SELECT * FROM users where firstName=?";
		$result = $this -> db -> query($query_str, $this -> input -> post('username'));
		if ($result -> num_rows() == 1) {
			foreach ($result->result() as $user) {
				$this -> view_data['user_id'] = $user->user_id;	
			}
		}
	}

	public function validate() {
		$query_str = "SELECT password FROM users where firstName=?";
		$result = $this -> db -> query($query_str, $this -> input -> post('username'));
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
		$this -> db -> query($query_str, array($firstname, $lastname, $email, $password));
	}

}
?>
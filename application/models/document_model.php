<?php
require_once (APPPATH . 'libraries/couch.php');
require_once (APPPATH . 'libraries/couchClient.php');
require_once (APPPATH . 'libraries/couchDocument.php');
require_once (APPPATH . 'libraries/couchReplicator.php');
class Document_model extends CI_Model {
	public function Document_model() {
		parent::__construct();
	}

	public function insert($url, $date, $name) {
		$client = new couchClient("http://localhost:5984/", "documents");
		$doc = new stdClass();
		$doc -> _id = $url;
		$doc -> date = $date;
		$doc -> name = $name;
		try {
			$client -> storeDoc($doc);
		} catch (Exception $e) {
			die("Unable to store the document : " . $e -> getMessage());
		}

		$client = new couchClient("http://localhost:5984/", "users");
		$query_str = "SELECT * FROM users where firstName=?";
		$result = $this -> db -> query($query_str, $this -> session -> userdata('username'));
		if ($result -> num_rows() == 1) {
			foreach ($result->result() as $user) {
				$userID = $user -> user_id;
				try {
					$doc = $client -> getDoc($userID);
					$var = $doc -> docs;
					array_push($var, $url);
					$doc -> docs = $var;
					try {
						$client -> storeDoc($doc);
					} catch (Exception $e) {
						die("Unable to store the document : " . $e -> getMessage());
					}
				} catch (Exception $e) {
					if ($e -> getCode() == 404) {
						$doc = new stdClass();
						$doc -> _id = $userID;
						$doc -> docs = array($url);
						try {
							$client -> storeDoc($doc);
						} catch (Exception $e) {
							die("Unable to store the document : " . $e -> getMessage());
						}
					} else {
						die("Unable to get document10 : " . $e -> getMessage());
					}
				}
			}
		}
	}

	public function get_documents($user_id) {
		$client_documents = new couchClient("http://localhost:5984/", "documents");
		$client_users = new couchClient("http://localhost:5984/", "users");
		try {
			$doc_users = $client_users -> getDoc($user_id);
			$documents_of_user = $doc_users -> docs;

			$documents = array();
			if (empty($documents_of_user))
				return 'Empty';
			else {
				foreach ($documents_of_user as $document_of_user) {
					$doc_documents = $client_documents -> getDoc($document_of_user);
					$document = array("id" => $doc_documents -> _id, "date" => $doc_documents -> date, "title" => $doc_documents -> name);
					array_push($documents, $document);
				}

				return $documents;
			}
		} catch(Exception $e) {
			return 'Error';
		}
	}

}

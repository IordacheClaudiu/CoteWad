<?php
require_once (APPPATH . 'libraries/couch.php');
require_once (APPPATH . 'libraries/couchClient.php');
require_once (APPPATH . 'libraries/couchDocument.php');
require_once (APPPATH . 'libraries/couchReplicator.php');
class Document_model extends CI_Model {
	public function Document_model() {
		parent::__construct();
	}
	public function insert($url){
		$client = new couchClient("http://localhost:5984/","documents");
		$doc = new stdClass();
	    $doc->_id = $url; 
	try {
		$client->storeDoc($doc);
		} catch ( Exception $e ) {
			die("Unable to store the document : ".$e->getMessage());
		}
	}
}
	
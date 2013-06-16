<?php
require_once(APPPATH.'libraries/couch.php'); 
require_once(APPPATH.'libraries/couchClient.php'); 
require_once(APPPATH.'libraries/couchDocument.php'); 
require_once(APPPATH.'libraries/couchReplicator.php'); 
class User_model extends CI_Model
{
    public function validate()
    {
    	$client = new couchClient("http://localhost:5984/","users");
		try{$doc=$client->getDoc($this->input->post('username'));
		if(md5($this->input->post('password'))==$doc->password){
			return TRUE;
		}
		return FALSE;
		}catch(Exception $e){
			return FALSE;
		}
    }
	public function create_member(){
		$client = new couchClient("http://localhost:5984/","users");
		try{
			$doc=$client->getDoc($this->input->post('username'));
		}
		catch(Exception $e){
			if($e->getCode()==404){
				 $doc = new stdClass();
				 $doc->_id=$this->input->post('username');
				 $doc->email=$this->input->post('email_adress');
				 $doc->password=md5($this->input->post('password'));
				 $doc->lastName=$this->input->post('last_name');
				 $doc->firstName=$this->input->post('first_name');
				 try {
       			 $client->storeDoc($doc);
        			return TRUE;
   				 } catch (Exception $e) {
     				   return FALSE;
   					 }
			}
			else return FALSE;
		}
	}
}
?>
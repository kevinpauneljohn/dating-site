<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function check_access($uname,$pword){
		$this->db->where(array('ds_uname' => $uname, 'ds_pword' => md5($pword)));
		$query = $this->db->get('ds_useraccount');
		
		if($query->num_rows() == 1){
			return true;
		}else{
			return false;
		}
	}
	
	public function make_online($uname,$value,$last_activity){
		$this->db->set(array('login'=>$value , 'last_activity' => $last_activity));
		$this->db->where('ds_uname',$uname);
		$this->db->update('ds_useraccount');
	}
}
?>
<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Registration extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
	public function temp_register($key){
		$bday = (explode('/',$this->input->post('bday')));
        $date_of_birth = $bday[2]."-".$bday[0]."-".$bday[1];
		$temp_registration = array(
			'temp_uname'			=>	$this->input->post('uname'),
			'temp_pword'			=>	md5($this->input->post('pword')),
			'temp_email'			=>	$this->input->post('email'),
			'temp_gender'			=>	$this->input->post('gender'),
			'temp_interest'			=>	$this->input->post('interest'),
			'temp_bday'				=>	$date_of_birth,
			'userKey'				=>	$key
		);
		$temp_register = $this->db->insert('temp_user_tbl',$temp_registration);
		return $temp_register;
	}
	
    public function register($uname){
        $date_today = date("Y-m-d");
		
		$this->db->where('temp_uname',$uname);
		$temp_tbl = $this->db->get('temp_user_tbl');
		
		$row = $temp_tbl->row();
        
        $newmemberregistration = array(
            'ds_uname'      => $row->temp_uname,
            'ds_pword'      => $row->temp_pword,
            'ds_email'      => $row->temp_email,
            'ds_gender'     => $row->temp_gender,
            'ds_dateReg'    => $date_today,
            'ds_accttype'   => 1,
            'ds_bday'       => $row->temp_bday,
			'ds_interest'	=> $row->temp_interest
        );

        $register = $this->db->insert('ds_useraccount',$newmemberregistration);
        return $register;
    }
	
	///check email from primary table
    public function checkEmail($email){
        $this->db->where('ds_email',$email);
        $query = $this->db->get('ds_useraccount');

        if($query->num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
	//////check email from temporary table
	public function check_temp_email($email){
		$this->db->where('temp_email',$email);
		$query = $this->db->get('temp_user_tbl');
		
		if($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	///check username from primary table
    public function checkUname($uname){
        $this->db->where('ds_uname',$uname);
        $query = $this->db->get('ds_useraccount');

        if($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }
	
	///check username from temporary table
    public function check_temp_uname($uname){
        $this->db->where('temp_uname',$uname);
        $query = $this->db->get('temp_user_tbl');

        if($query->num_rows() > 0){
            return true;
        }
        else{
            return false;
        }
    }

    public function get_userId($uname,$email){
        $array = array('ds_uname' => $uname, 'ds_email' => $email);
        $this->db->where($array);
        $query = $this->db->get('ds_useraccount');

        $row = $query->row();
        return $row->ds_userId;
    }
	
	public function is_valid_key($key,$uname){
		$this->db->where(array('userKey' => $key, 'temp_uname' => $uname));
		$query = $this->db->get('temp_user_tbl');
		
		if($query->num_rows() == 1){
			return true;
		}else{
			return false;
		}
	}
}
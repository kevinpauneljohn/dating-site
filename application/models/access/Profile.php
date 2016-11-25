<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function profile_details(){
        $insertDetails = array(
            'ds_userId'             =>  $this->session->userId,
            'ds_motto'              =>  $this->input->post('motto'),
            'ds_about'              =>  $this->input->post('about'),
            'ds_hobby'              =>  $this->input->post('hobby'),
            'ds_bodytype'          	=>  $this->input->post('body_type'),
            'ds_height'             =>  $this->input->post('height'),
            'ds_weight'             =>  $this->input->post('weight'),
            'ds_forrelationship'    =>  $this->input->post('relationship'),
            'ds_ethnicity'          =>  $this->input->post('ethnicity'),
            'ds_educ'               =>  $this->input->post('educ'),
            'ds_job'                =>  $this->input->post('job'),
            'ds_salary'             =>  $this->input->post('salary'),
            'ds_religion'           =>  $this->input->post('religion')
        );

        $insertProfile = $this->db->insert('ds_useracctmeta',$insertDetails);
        return $insertProfile;
    }
	
	public function update_profile($userId){
		$array = array(
            'ds_motto'              =>  $this->input->post('motto'),
            'ds_about'              =>  $this->input->post('about'),
            'ds_hobby'              =>  $this->input->post('hobby'),
            'ds_bodytype'          	=>  $this->input->post('body_type'),
            'ds_height'             =>  $this->input->post('height'),
            'ds_weight'             =>  $this->input->post('weight'),
            'ds_forrelationship'    =>  $this->input->post('relationship'),
            'ds_ethnicity'          =>  $this->input->post('ethnicity'),
            'ds_educ'               =>  $this->input->post('educ'),
            'ds_job'                =>  $this->input->post('job'),
            'ds_salary'             =>  $this->input->post('salary'),
            'ds_religion'           =>  $this->input->post('religion')
		);

		$this->db->where('ds_userId', $userId);
		$this->db->update('ds_useracctmeta', $array);
		
	}
	
	public function get_userId($uname){
		$this->db->where('ds_uname',$uname);
		$query = $this->db->get('ds_useraccount');
		
		$row = $query->row();
		return $row->ds_userId;
	}
	public function checkUserIdMeta($userId){
		$this->db->where('ds_userId',$userId);
		$query = $this->db->get('ds_useracctmeta');
		
		if($query->num_rows() > 0){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function get_profile_data($userId){
		$this->db->where('ds_userId',$userId);
		$query = $this->db->get('ds_useracctmeta');
		
		
		foreach($query->result() as $row){
			$val = array(
				'motto'				=> $row->ds_motto,
				'about'				=> $row->ds_about,
				'hobby'				=> $row->ds_hobby,
				'body_type'			=> $row->ds_bodytype,
				'height'			=> $row->ds_height,
				'weight'			=> $row->ds_weight,
				'relationship'		=> $row->ds_forrelationship,
				'ethnicity'			=> $row->ds_ethnicity,
				'education'			=> $row->ds_educ,
				'job'				=> $row->ds_job,
				'salary'			=> $row->ds_salary,
				'religion'			=> $row->ds_religion
			);
			  
		}
		return $val;
	}
	
	public function check_online_user(){
		$this->db->where('login',1);
		$users = $this->db->get('ds_useraccount');
		return $users->result();
	}
	public function update_online_status($userid){
		$this->db->set('login',0);
		$this->db->where('ds_userId',$userid);
		$this->db->update('ds_useraccount');
	}
	public function userlist(){
		return $this->db->get('ds_useraccount')->result();
	}
			
}
